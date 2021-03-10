@extends('layouts.app')
@section('title', 'Paylaş')
@section('content')
    <div class="full_body clearfix">
        <div class="share-part clearfix">
            <div class="row-sh clearfix">
                <div class="col-sh clearfix">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{route('startCompetition', $history->slug)}}" target="_blank" class="fb"></a>
                </div>
                <div class="col-sh clearfix">
                    <a href="https://twitter.com/intent/tweet?text={{route('startCompetition', $history->slug)}}" target="_blank" class="twt"></a>
                </div>
                <div class="col-sh clearfix">
                    <a href="https://t.me/share/url?url={{route('startCompetition', $history->slug)}}" target="_blank" class="tg"></a>
                </div>
                <div class="col-sh clearfix">
                    <a href="whatsapp://send?text={{route('startCompetition', $history->slug)}}" target="_blank" class="wp"></a>
                </div>
                <div class="col-sh clearfix">
                    <button onclick="copyFunction()" class="cp_lnk"></button>
                    <input type="text" value="{{route('startCompetition', $history->slug)}}" id="link_inpt" class="cp_inpt" readonly>
                </div>

            </div>
            <div class="row-sh clearfix">
                <a href="{{$restart_link}}" class="reload_btn">Təkrar</a>
            </div>
            <div class="row-sh clearfix">
                <a href="{{route('start')}}" class="reload_btn">YENİSİNİ yarat</a>
            </div>
            <div class="row-sh clearfix">
                <a href="{{route('result', $history->slug)}}" class="reload_btn">Nətİcələr</a>
            </div>
        </div>
    </div>
@endsection
