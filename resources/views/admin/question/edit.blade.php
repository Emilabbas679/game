@extends('admin.layout')
@section('title', __($item->question))

@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
            <h6 class="m-0 font-weight-bold text-primary">{{$item->question}}</h6>
        </div>
        <div class="card-body">
            <div class="col-md-6 offset-md-3">
                <form class="user" method="POST" action="{{ route('question.update', $item->id) }}"  enctype="multipart/form-data">
                    @csrf
                    @method('PUT')


                    <div class="form-group row">
                        <div class="col-md-2">
                            <label for="question">Question</label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" id="question" name="question" class="form-control @error('question') is-invalid @enderror" value="{{$item->question}}">
                            @error('question')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-2">
                            <label for="question_own">Question Own</label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" id="question_own" name="question_own" class="form-control @error('question_own') is-invalid @enderror" value="{{$item->question_own}}">
                            @error('question_own')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    @for($i=1; $i<5; $i++)
                        <div class="form-group row">
                            <div class="col-md-2">
                                <label for="answer_{{$i}}">Answer-{{$i}}</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" id="answer_{{$i}}" name="answer_{{$i}}" class="form-control @error('answer_'.$i) is-invalid @enderror" value="{{$answers[$i-1]['answer']}}">
                                @error('answer_'.$i)
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>
                    @endfor



                    <div class="form-group row">
                        <div class="col-md-2">
                            <label for="status">Status</label>
                        </div>
                        <div class="col-md-10">
                            <select name="status" id="status" class="form-control">
                                <option value="active" @if($item->status == 'active') selected @endif>active</option>
                                <option value="inactive" @if($item->status == 'inactive') selected @endif>inactive</option>
                            </select>
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary btn-block">
                        {{ __('Edit') }}
                    </button>
                </form>
            </div>
        </div>
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
