<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\QuestionHistory;
use App\Models\QuestionHistoryAnswer;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function start()
    {
        $type = 'create';
        return view('start', compact('type'));
    }

    public function startCompetition($slug)
    {
        $history = QuestionHistory::where('slug', $slug)->first();
        if (!$history)
            abort(404);
        $type = 'competition';
        return view('start', compact('history', 'type', 'slug'));
    }

    public function result($slug)
    {
        $history = QuestionHistory::where('slug', $slug)->where('referral_id', 0)->first();
        if (!$history)
            abort(404);
        $results = QuestionHistory::where('referral_id', $history->id)->get();

        return view('result', compact('history', 'results'));
    }

    public function resultCompose($slug, $new_slug)
    {
        $history = QuestionHistory::where('slug', $slug)->where('referral_id', 0)->first();
        if (!$history)
            abort(404);
        $result = QuestionHistory::where('referral_id', $history->id)->where('slug', $new_slug)->first();
        return view('result-new', compact('history', 'result'));
    }

    public function share($slug, $type=null)
    {
        $history = QuestionHistory::where('slug', $slug)->first();
        if (!$history)
            abort(404);
        if ($type && $type == 'create')
            $restart_link = route('start');
        else
            $restart_link = route('startCompetition', $slug);

        return view('share', compact('history', 'restart_link'));
    }

    public function startPost(Request $request)
    {
        $type = $request->type;
        $name = $request->name;
        $questions = Question::where('status', 'active')->inRandomOrder()->with('answers')->take(10)->get();
        return view('questions', compact('type', 'name', 'questions'));
    }

    public function startCompetitionPost(Request $request, $slug)
    {
        $history = QuestionHistory::where('slug', $slug)->first();
        if (!$history)
            abort(404);
        $question_ids = QuestionHistoryAnswer::select('question_id')->where('question_history_id', $history->id)->pluck('question_id')->toArray();
        $questions = Question::wherein('id', $question_ids)->with('answers')->get();
        $type = $request->type;
        $name = $request->name;
        return view('questions', compact('type', 'name', 'questions', 'slug'));
    }

    public function competitionResult(Request $request, $slug)
    {
        $history = QuestionHistory::where('slug', $slug)->first();
        if (!$history)
            abort(404);
        $origins = QuestionHistoryAnswer::select('question_id','answer_id')->where('question_history_id', $history->id)->get();
        $origin_answers = [];
        foreach ($origins as $o){
            $origin_answers[$o->question_id] = $o->answer_id;
        }
        $questions = $request->questions;
        $answers = $request->answer;
        $user_answers = [];
        foreach ($questions as $q){
            $a = 0;
            if(isset($answers[$q])){
                $a = $answers[$q];
            }
            $user_answers[$q] = $a;
        }
        $same_answer_count = 0;
        $same_answers = [];
        foreach ($origin_answers as $key=>$value){
            if(isset($user_answers[$key]) && $user_answers[$key] == $value){
                $same_answer_count = $same_answer_count + 1;
                $same_answers[$key] = 1;
            }
            else{
                $same_answers[$key] = 0;
            }
        }

        $name = $request->name;
        $slug_user = strtolower($name).'-'.random_int(100000, 10000000);
        $new_history = new QuestionHistory();
        $new_history->name = $name;
        $new_history->slug = $slug_user;
        $new_history->referral_id = $history->id;
        $new_history->same_answers = $same_answer_count;
        $new_history->save();
        $data = [];
        foreach ($questions as $q){
            $a = 0;
            if(isset($answers[$q])){
                $a = $answers[$q];
            }

            $data[] =[
                'question_id' => $q,
                'answer_id' => $a,
                'question_history_id' => $new_history->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'is_same' => $same_answers[$q]
            ];
        }
        QuestionHistoryAnswer::insert($data);
        return redirect()->route('result_compose',['slug'=>$slug,'new_slug'=>$slug_user]);
    }

    public function createCompetition(Request $request)
    {
        $name = $request->name;
        $slug = strtolower($name).'-'.random_int(100000, 10000000);
        $history = new QuestionHistory();
        $history->name = $name;
        $history->slug = $slug;
        $history->same_answers = 10;
        $history->save();
        $questions = $request->questions;
        $answers = $request->answer;
        $data = [];
        foreach ($questions as $q){
            $a = 0;
            if(isset($answers[$q])){
                $a = $answers[$q];
            }
            $data[] =[
              'question_id' => $q,
               'answer_id' => $a,
              'question_history_id' => $history->id,
              'created_at' => Carbon::now(),
              'updated_at' => Carbon::now(),
                'is_same' => 1
            ];
        }
        QuestionHistoryAnswer::insert($data);
        return redirect()->route('share',['type'=>'create', 'slug'=>$slug]);

    }
}
