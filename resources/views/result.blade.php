@extends('layouts.app')
@section('title', 'Nəticələr')
@section('content')
    <div class="full_body clearfix">
        <div class="share-part clearfix">
            <h1 class="partnyor_result rslt_mrg">{{str_replace('i','İ', $history->name)}}'İn sorğusuna cavab verənlər. </h1>
            <div class="result_table clearfix">

                <table>
                    <tr>
                        <th>№</th>
                        <th>Ad </th>
                        <th>Xal(%)</th>
                    </tr>
                    @foreach($results as $r)
                    <tr>
                        <td>#{{$loop->iteration}}</td>
                        <td>{{$r->name}}</td>
                        <td>{{$r->same_answers*10}}%</td>
                    </tr>
                    @endforeach

                </table>
            </div>
        </div>
    </div>
    @endsection
