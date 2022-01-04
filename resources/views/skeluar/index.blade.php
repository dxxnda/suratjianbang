@extends('template.master')
@section('title', 'Skeluar')

@section('content')

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Surat Keluar</h4>
                <br>
                <a href="{{ url('/skeluar/create') }}" type="button" class="btn btn-gradient-primary btn-rounded btn-fw"
                    role="button">Add</a>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th> No. </th>
                            <th> Nomor Surat </th>
                            <th> Perihal </th>
                            <th> Bagian yang Dituju </th>
                            <th> Tanggal </th>
                            <th> Keterangan </th>
                            <th> Pilihan </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($skeluar as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nokeluar }} </td>
                                <td>{{ $item->perihal }} </td>
                                <td>{{ $item->dituju }} </td>
                                <td>{{ $item->tanggal }} </td>
                                <td>{{ $item->ket }} </td>
                                <td>
                                    <a href="{{ url('/skeluar/' . $item->id . '/edit') }}">
                                        <button type="submit" class="btn btn-inverse-info btn-rounded btn-icon">
                                            <i class="mdi mdi-table-edit" role="button"></i>
                                        </button>
                                    </a>

                                    <button type="button" class="btn btn-inverse-success btn-rounded btn-icon">
                                        <i class="mdi mdi-printer"></i>
                                    </button>
                                    <form action=" {{ url('/skeluar/' . $item->id) }}" method='POST' class='d-inline'>
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
                <div class="mt-3 text-center">
                    <a href="{{ url('/smasuk/cetak') }}" target="_blank">
                        <button type="button" class="btn btn-outline-info btn-icon-text"> Print PDF <i class="mdi mdi-printer btn-icon-append" 
                            role="button"></i>
                        </button>
                    </a>
            </div>
        </div>
    </div>
@endsection
