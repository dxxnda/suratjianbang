@extends('template.master')
@section('title', 'Skeluar')

@section('content')
<div class="page-header">
    <h3 class="page-title"> Surat Keluar </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Surat Keluar</li>
        </ol>
    </nav>
</div>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <form action="{{ url('/skeluar/cari') }}" method="POST">
                @csrf
                <div class="input-group">
                    <input type="text" class="form-control" name="cari" placeholder="Cari Berdasarkan Perihal"
                        value="{{ old('cari') }}">
                    <div class="input-group-append">
                        <button class="btn btn-outline-primary btn-rounded " type="submit" value="cari">Cari</button>
                    </div>
                </div>
            </form>
            <div class="card-body">
                <h4 class="card-title">Surat Keluar</h4>
                <br>
                <a href="{{ url('/skeluar/create') }}" type="button" class="btn btn-gradient-primary btn-rounded btn-fw"
                    role="button">Add</a>
                @if (session('status'))
                    <div class="alert alert-primary mt-3">
                        {{ session('status') }}
                    </div>
                @endif
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th> No. </th>
                            <th> Lampiran </th>
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
                                <td>{{ $skeluar->firstItem() + $key }}</td>
                                <td> <img src="{{asset('dist/img/'.$item->file)}}" width="40" height="auto" alt=""> </td>
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
                    <a href="{{ url('/skeluar/cetak') }}" target="_blank">
                        <button type="button" class="btn btn-outline-info btn-icon-text"> Print PDF <i
                                class="mdi mdi-printer btn-icon-append"></i>
                        </button>
                    </a>
                </div>
                <div class="mt-3 pull-left">
                    Showing
                    {{ $skeluar->firstItem() }}
                    to
                    {{ $skeluar->lastItem() }}
                    of
                    {{ $skeluar->total() }}
                    entries
                </div>
                <div class="d-flex justify-content-end mt-3">
                    {{ $skeluar->links() }}
                </div>
            </div>

        </div>
    </div>
@endsection
