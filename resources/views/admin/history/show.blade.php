@extends('admin.layout')
@section('title', __($item->name))

@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
            <h6 class="m-0 font-weight-bold text-primary">{{$item->name}}</h6>
        </div>
        <div class="card-body">
                <table class="table table-bordered ">
                    <tr>
                        <th>Name</th>
                        <td>{{$item->name}}</td>
                    </tr>
                    <tr>
                        <th>Slug</th>
                        <td>{{$item->slug}}</td>
                    </tr>
                    <tr>
                        <th>Created</th>
                        <td>{{$item->created_at->format('H:i:s d.m.Y')}}</td>
                    </tr>
                    <tr>
                        <th>Updated</th>
                        <td>{{$item->updated_at->format('H:i:s d.m.Y')}}</td>
                    </tr>
                </table>

                <hr>
                <h3 class="text-center">Questions</h3>
                <table class="table table-bordered ">
                    @foreach($item->history as $i)
                    <tr>
                        <th> @if(isset($i->question)) {{$i->question->question}} @endif </th>
                        <td> @if(isset($i->answer)) {{$i->answer->answer}} @endif</td>
                    </tr>
                        @endforeach
                </table>
                <hr>
                <h3 class="text-center">Results</h3>
                <table class="table table-bordered ">
                    <tr>
                        <th>Name</th>
                        <th>Percent</th>
                        <th>Created</th>
                    </tr>
                    @foreach($results as $i)
                        <tr>
                            <td>{{$i->name}}</td>
                            <td>{{$i->same_answers*10}}%</td>
                            <td>{{$i->created_at->format('H:i:s d.m.Y')}}</td>
                        </tr>
                        @endforeach
                </table>


        </div>
    </div>

@endsection


@push('js')




    <script>
        $(".select2").select2({
            tags: true,
            tokenSeparators: [',', ' ']
        })
    </script>



@endpush
