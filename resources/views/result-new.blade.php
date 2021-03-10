@extends('layouts.app')
@section('title', 'Nəticələr')
@section('head_css')
<script src="{{env('APP_URL')}}/site/js/snowflake.min.js"></script>
@endsection
@section('content')
    <div class="full_body clearfix">
        <div class="share-part clearfix">
            <h1 class="partnyor_result">SİZİN UYĞUNLUQ NƏTİCƏNİZ</h1>
            <div class="result_table clearfix">
                <div class="result_range clearfix">
                    <div class="result_range_in clearfix" style="width: {{$result->same_answers*10}}%;">
                        <div class="result_heart">{{$result->same_answers*10}}% </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        const snowflake = new SnowflakeJs(250,250,800,7,25);
        snowflake.init();
    </script>
@endsection
