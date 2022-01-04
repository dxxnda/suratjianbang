@extends('template.master')
@section('title', 'Smasuk')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <form action="{{ url('/smasuk/cari') }}" method="POST">
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
                <h4 class="card-title">Surat Masuk</h4>
                <br>
                <a href="{{ url('/smasuk/create') }}" type="button" class="btn btn-gradient-primary btn-rounded btn-fw"
                    role="button">Add</a>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th> No. </th>
                            <th> Nomor Surat </th>
                            <th> Perihal </th>
                            <th> Asal Surat </th>
                            <th> Tanggal </th>
                            <th> Keterangan </th>
                            <th> Pilihan </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($smasuk as $key => $item)
                            <tr>
                                <td>{{ $smasuk->firstItem() + $key }}</td>
                                <td>{{ $item->nomasuk }} </td>
                                <td>{{ $item->perihal }} </td>
                                <td>{{ $item->asal }} </td>
                                <td>{{ $item->tanggal }} </td>
                                <td>{{ $item->ket }} </td>
                                <td>
                                    <a href="{{ url('/smasuk/' . $item->id . '/edit') }}">
                                        <button type="submit" class="btn btn-inverse-info btn-rounded btn-icon">
                                            <i class="mdi mdi-table-edit" role="button"></i>
                                        </button>
                                    </a>

                                    <button type="button" class="btn btn-inverse-success btn-rounded btn-icon">
                                        <i class="mdi mdi-printer"></i>
                                    </button>
                                    <form action=" {{ url('/smasuk/' . $item->id) }}" method='POST' class='d-inline'>
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
                    <button type="button" class="btn btn-outline-info btn-icon-text"> Print PDF <i class="mdi mdi-printer btn-icon-append"></i>
                    </button>
                </a>
            </div>
                <div class="mt-3 pull-left">
                    Showing
                    {{$smasuk->firstItem()}}
                    to 
                    {{$smasuk->lastItem()}}
                    of 
                    {{$smasuk->total()}}
                    entries

                </div>
                <div class="d-flex justify-content-end mt-3">
                    {{ $smasuk->links() }}
                </div>

            </div>

        </div>
    </div>
    {{-- @else
    <p class="text-center fs-4"> No Post Found.</p>
    @endif --}}
@endsection
