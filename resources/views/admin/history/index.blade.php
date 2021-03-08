@extends("admin.layout")
@section('title', 'History')
@section('content')
    <div class="card shadow mb-4">

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Created</th>
                        <th>Operations</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Created</th>
                        <th>Operations</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach ($items as $i)
                        <tr>
                            <td>{{$i->id}}</td>
                            <td>{{$i->name}}</td>
                            <td>{{$i->created_at->format('d.m.Y')}}</td>
                            <td>

                                <form id="delete-form" action="{{ route('history.destroy', $i->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <a href="{{route('history.show',$i->id)}}" class="btn btn-primary btn-circle btn-sm">
                                        <i class="far fa-eye"></i>
                                    </a>
                                    <button class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
