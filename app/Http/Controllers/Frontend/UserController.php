<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\SectionType;
use App\Models\GameQuiz;
use Illuminate\Support\Facades\Auth;


use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    public function question_list(Request $request){
        $data = SectionType::paginate(10);
        return view('frontend.question_list',['data'=>$data]);
    }
    
    public function index(Request $request){
        return view('frontend.index');
    }

    public function  choose_you_game(Request $request){
        return view('frontend.chosse_your_game');
    }

    public function  sector(Request $request){
        return view('frontend.sector');
    }

    public function  details_form(Request $request){
        return view('frontend.details_form');
    }
    public function user_add(Request $request){

        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:users|email',
            'phone' => 'required|unique:users|numeric|regex:/^[0-9]{10}$/',
            'name' => 'required|string',
            'term' => 'required',
        ]);
    
        if ($validator->fails()) {
            return $validator->errors();
        }

        $data = array(
            'name' => trim($request->post('name')),
            'email' => trim($request->post('email')),   
            'phone' => trim($request->post('phone')),   
            'section_type' => trim($request->post('section_type')),
            'term' => trim($request->post('term')),     
            'update_whatsapp' => trim($request->post('update_whatsapp'))
        );
        $user = User::create($data);

        if ($user) {
            Auth::login($user);
        } else {
            print_r('Something Went Wrong');
        }
        return response()->json(['message' => 'User created successfully',"status"=>200 ,'data'=>$user]);

    }

    public function IT(Request $request){
        $SectionType = SectionType::where('section_type','IT')->get();
        $SectionType_count = SectionType::where('section_type','IT')->count();
        $sectionTypesJson = $SectionType->toJson();

        return view('frontend.quiz',['SectionType'=>$SectionType,'SectionType_count'=>$SectionType_count,'sectionTypesJson'=>$sectionTypesJson]);
    }

    public function BFSI(Request $request){
        $SectionType = SectionType::where('section_type','BFSI')->get();
        $SectionType_count = SectionType::where('section_type','BFSI')->count();
        $sectionTypesJson = $SectionType->toJson();

        return view('frontend.quiz',['SectionType'=>$SectionType,'SectionType_count'=>$SectionType_count,'sectionTypesJson'=>$sectionTypesJson]);
    }

    public function logistics(Request $request){
        $SectionType = SectionType::where('section_type','LOGISTICS')->get();
        $SectionType_count = SectionType::where('section_type','LOGISTICS')->count();
        $sectionTypesJson = $SectionType->toJson();

        return view('frontend.quiz',['SectionType'=>$SectionType,'SectionType_count'=>$SectionType_count,'sectionTypesJson'=>$sectionTypesJson]);
    }

    public function hospitality(Request $request){
        $SectionType = SectionType::where('section_type','HOSPITALITY')->get();
        $SectionType_count = SectionType::where('section_type','HOSPITALITY')->count();
        $sectionTypesJson = $SectionType->toJson();

        return view('frontend.quiz',['SectionType'=>$SectionType,'SectionType_count'=>$SectionType_count,'sectionTypesJson'=>$sectionTypesJson]);
    }

    public function quiz_save(Request $request){
        $data = array(
            'user_id' => trim($request->user_id),
            'section_type' => trim($request->section_type),   
            'attemp_question' => trim($request->attemp_question),   
            'attemp_answer' => isset($request->attemp_answer) ? trim($request->attemp_answer) : 'No',  
            'points'=>   trim($request->pt), 
            'correct'=>   trim($request->correct), 
        );
        $quiz = GameQuiz::create($data);
        return response()->json(['message' => 'User Played',"status"=>200 ,'data'=>$data]);

    }

    function result(Request $request  ){

        $point = 0;
        $coupon_code = '';
        $length = 9;

        $id = $request->input('id');
        $name = User::where('id',$id)->first();
        $result = GameQuiz::where('user_id',$id)->sum('points');
        $correct = GameQuiz::where('user_id',$id)->where('correct',1)->count();
        $wrong = GameQuiz::where('user_id',$id)->where('correct',0)->count();

        $correct = intval($correct);
        $wrong = intval($wrong);
        $result = intval($result);
        $score = $result; 

        // Check the score range and assign the corresponding point value
        if ($score >= 1 && $score <= 4) {
            $point = '1,000';
        } elseif ($score >= 5 && $score <= 7) {
            $point = '2,500';
        } elseif ($score >= 8 && $score <= 10) {
            $point = '5,000';
        }
 
        if(isset($point) && $point != ''){
            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';

            for ($i = 0; $i < $length; $i++) {
                $coupon_code .= $characters[rand(0, strlen($characters) - 1)];
            }
        }
       
        return view('frontend.result',['correct'=>$correct,'wrong'=>$wrong,'result'=>$result,'point'=>$point,'coupon_code'=>$coupon_code,'name'=>$name]);
    }

    public function term_condition(Request $request){
        return view('frontend.terms_and_conditions');
    }

    public function add_question(Request $request){
        $title = "Add";
        return view('frontend.add_question',['title'=>$title]);
    }

    public function question_save(Request $request){
        // dd($request->all());
        $dataArray = json_decode($request->options, true);
        // Extract "value" from each object and create a new array
        $valuesArray = array_map(function ($item) {
            return $item['value'];
        }, $dataArray);

        $data = array(
            'section_type' => trim($request->section_type),
            'question' => trim($request->question),
            'answer' => trim($request->answer),   
            'options' => json_encode($valuesArray),   
            
        );
        if($request->type == "Add"){
            $question = SectionType::create($data);
        }
        elseif($request->type == "Edit"){
            $question = SectionType::find($request->id);

            if ($question) {
                $question->update($data);
                return response()->json(['status' => 'update', 'message' => 'Question updated!']);
            } else {
                return response()->json(['status' => 'error', 'message' => 'Question not found!']);
            }

        }
        
        return response()->json(['message' => 'Question Saved',"status"=>200]);
    }

    function question_edit(Request $request){
        $title = "Edit";
        $data = SectionType::where('id',$request->id)->get();
        return view('frontend.add_question',['title'=>$title,'data'=>$data]);

    }
}
