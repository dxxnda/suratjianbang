@extends('template.master')
@section('title', 'User')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">User</h4>
                <br>
                <a href="{{ url('/register') }}" type="button" class="btn btn-gradient-primary btn-rounded btn-fw"
                    role="button">Tambah User</a>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th> No. </th>
                            <th> Username </th>
                            <th> Email </th>
                            <th> Pilihan </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }} </td>
                                <td>{{ $item->email }} </td>
                                <td>
                                    <a href="{{ url('/user/' . $item->id . '/edit') }}">
                                        <button type="submit" class="btn btn-inverse-info btn-rounded btn-icon">
                                            <i class="mdi mdi-table-edit" role="button"></i>
                                        </button>
                                    </a>

                                    <button type="button" class="btn btn-inverse-success btn-rounded btn-icon">
                                        <i class="mdi mdi-printer"></i>
                                    </button>
                                    <form action=" {{ url('/user/' . $item->id) }}" method='POST' class='d-inline'>
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-inverse-danger btn-rounded btn-icon">
                                            <i class="mdi mdi-delete-forever"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- <div class="pagination mt-3">
                    {{ $smasuk->links() }}
                </div>
                 --}}
            </div>
            
        </div>
    </div>
@endsection
