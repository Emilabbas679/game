<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\QuestionHistory;
use App\Models\QuestionHistoryAnswer;
use Illuminate\Http\Request;

class QuestionHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = QuestionHistory::where('referral_id', 0)->orderby('id','desc')->get();
        return view('admin.history.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = QuestionHistory::where('id', $id)->with('history')->first();
        $results = QuestionHistory::where('referral_id', $id)->get();
        return view('admin.history.show', compact('item', 'results'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $referrals = QuestionHistory::where('referral_id', $id)->select('id')->pluck('id')->toArray();
        QuestionHistoryAnswer::wherein('question_history_id', $referrals)->orwhere('question_history_id', $id)->delete();
        QuestionHistory::wherein('id', $referrals)->orwhere('id', $id)->delete();
        return redirect()->route('history.index')->with('success', 'Müvəffəqiyyətlə silindi');
    }
}
