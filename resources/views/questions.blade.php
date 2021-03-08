@extends('layouts.app')
@section('title', 'Suallar')
@section('content')

    <div class="test-part clearfix">
        @if ($type == 'create')
        <form action="{{route('create_competition')}}" method="post"  id="scroll-div">
            @else
       <form action="{{route('competitionResult', $slug)}}" method="post"  id="scroll-div">
       @endif
           @csrf
           <input type="hidden" name="name" value="{{$name}}">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    @foreach($questions as $q)
                        <input type="hidden" name="questions[]" value="{{$q->id}}">
                        <div id="tst_{{$loop->iteration}}" class="swiper-slide @if($loop->iteration == 1) test_count @endif">
                            <div class="test-rows  clearfix">
                                <div class="row-frm clearfix">
                                    <h2 class="frm_questn">{{$loop->iteration}}. @if($type == 'create') {{$q->question_own}} @else {{$q->question}} @endif</h2>
                                    @foreach($q->answers as $a)
                                    <div class="row_in clearfix">
                                        <input type="radio" id="{{$q->id}}-{{$loop->iteration}}" name="answer[{{$q->id}}]" value="{{$a->id}}">
                                        <label for="{{$q->id}}-{{$loop->iteration}}" class="test_label">
                                            <span class="test_variant">@if($loop->iteration == 1) A @elseif($loop->iteration == 2) B @elseif($loop->iteration == 3) C @else D @endif </span>
                                            <span class="test_info">{{$a->answer}} </span>
                                            <span class="test_icn"></span>
                                        </label>
                                    </div>
                                        @endforeach
                                    @if($loop->iteration == 10)
                                        <div class="row_in clearfix">
                                            <button type="submit" class="result_send">Göndər </button>
                                        </div>
                                        @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </form>
    </div>

    <div class="scrl_btn clearfix">
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>

@endsection
