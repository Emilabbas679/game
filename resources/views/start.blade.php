@extends('layouts.app')
@section('title', 'Başla')
@section('meta')
    <meta property="og:url" content="{{url()->current()}}" />
    <meta property="og:type" content="website" />

    @if($type == "create")
        <meta name="og:title" content="Suallara başla">
        <meta name="og:description" content="Salam. Suallara cavab verin və sizi nə qədər tanıdıqlarını öyrənin.">
    @else
        <meta name="og:title" content="Suallara başla">
        <meta name="og:description" content="Salam. Suallara cavab verin, görün {{$history->name}}'i nə qədər tanıyırsınız?">
    @endif

@section('content')
    <div class="full_body clearfix">
        <div class="start-part clearfix">
            <div class="start-text">
                <h1>
                    @if ($type == 'create')
                    Salam. Suallara cavab verin və sizi nə qədər tanıdıqlarını öyrənin.
                    @else
                        Salam. Suallara cavab verin, görün {{$history->name}}'i nə qədər tanıyırsınız?
                    @endif
                </h1>
            </div>
            <div class="start-click clearfix">
                <form @if($type == 'create') action="{{route('start_post')}}" @else action="{{route('startCompetitionPost', $slug)}}" @endif method="post">
                    @csrf
                    <input type="text" name="name" value="" placeholder="Adınız... ">
                    @if ($type == 'create')
                    <input type="hidden" name="type" value="create">
                    @else
                        <input type="hidden" name="type" value="competition">
                    @endif
                    <button type="submit" class="str-btn">Başlayaq </button>
                </form>

            </div>
        </div>
    </div>
@endsection
