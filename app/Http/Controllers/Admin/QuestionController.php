<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Question;
use Carbon\Carbon;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Question::orderBy('id', 'desc')->get();
        return view('admin.question.index', compact('items' ) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.question.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'question' => ['required', 'string'],
            'question_own' => ['required', 'string'],
            'answer_1' => ['required', 'string'],
            'answer_2' => ['required', 'string'],
            'answer_3' => ['required', 'string'],
            'answer_4' => ['required', 'string'],

        ],
            [
                'question.required' => __('Sual boş qala bilməz.'),
                'question_own.required' => __('Sual boş qala bilməz.'),
                'answer_1.required' => __('Cavab boş qala bilməz.'),
                'answer_2.required' => __('Cavab boş qala bilməz.'),
                'answer_3.required' => __('Cavab boş qala bilməz.'),
                'answer_4.required' => __('Cavab boş qala bilməz.'),

            ]
        );
        $question = new Question();
        $question->question = $request->question;
        $question->question_own = $request->question_own;
        $question->status = $request->status;
        $question->save();
        $data = [];
        for($i=1; $i<5; $i++){
            $data[] = [
              'question_id' => $question->id,
              'answer' => $request->get('answer_'.$i),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }
        Answer::insert($data);
        return redirect()->route('question.index')->with('success', 'Sual müvəffəqiyyətlə əlavə edildi.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Question::find($id);
        $answers = Answer::where('question_id', $id)->get()->toArray();
        return view('admin.question.edit', compact('item', 'answers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'question' => ['required', 'string'],
            'question_own' => ['required', 'string'],
            'answer_1' => ['required', 'string'],
            'answer_2' => ['required', 'string'],
            'answer_3' => ['required', 'string'],
            'answer_4' => ['required', 'string'],

        ],
            [
                'question.required' => __('Sual boş qala bilməz.'),
                'question_own.required' => __('Sual boş qala bilməz.'),
                'answer_1.required' => __('Cavab boş qala bilməz.'),
                'answer_2.required' => __('Cavab boş qala bilməz.'),
                'answer_3.required' => __('Cavab boş qala bilməz.'),
                'answer_4.required' => __('Cavab boş qala bilməz.'),

            ]
        );
        $question = Question::find($id);
        $question->question = $request->question;
        $question->question_own = $request->question_own;
        $question->status = $request->status;
        $question->save();
        Answer::where('question_id',$id)->delete();
        $data = [];
        for($i=1; $i<5; $i++){
            $data[] = [
                'question_id' => $question->id,
                'answer' => $request->get('answer_'.$i),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }
        Answer::insert($data);
        return redirect()->route('question.index')->with('success', 'Sual müvəffəqiyyətlə yeniləndi.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Question::where('id',$id)->delete();
        Answer::where('question_id',$id)->delete();
        return redirect()->route('question.index')->with('success', 'Sual müvəffəqiyyətlə silindi.');
    }
}
