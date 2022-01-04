@extends('template.master')
@section('title', 'Edit Surat Masuk')

@section('content')
<div class="page-header">
    <h3 class="page-title"> Edit Surat Masuk </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/smasuk') }}">Surat Masuk</a></li>
            <li class="breadcrumb-item active" aria-current="page"> Edit Surat Masuk</li>
        </ol>
    </nav>
</div>
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <form action="{{ url('/smasuk/' . $smasuk->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <form class="forms-sample">
                        <div class="form-group">
                            <label for="file">Lampiran</label>
                            <input type="file" class="file-upload-browse btn btn-gradient-primary" name="file" id="file">
                        </div>
                        <div class="form-group">
                            <label for="nomasuk">Nomor Surat</label>
                            <input type="text" name="nomasuk" class="form-control @error('nomasuk') is-invalid @enderror"
                                id="nomasuk" placeholder="Masukkan Nomor Baru" value=" {{ $smasuk->nomasuk }} ">
                            @error('nomasuk')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="perihal">Perihal</label>
                            <textarea type="text" name="perihal"
                                class="form-control @error('perihal') is-invalid @enderror" id="perihal"
                                placeholder="Masukkan Perihal Baru"> {{ $smasuk->perihal }} </textarea>
                            @error('perihal')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="asal">Asal Surat</label>
                            <input type="text" name="asal" class="form-control @error('asal') is-invalid @enderror"
                                id="asal" placeholder="Masukkan Asal Baru" value=" {{ $smasuk->asal }} ">
                            @error('asal')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" onfocus="(this.type='date')" name="tanggal" class="form-control"
                                placeholder="tanggal" @error('tanggal') is-invalid @enderror id="tanggal"
                                value="{{ old('tanggal') }}">
                            @error('tanggal')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="ket">Keterangan Surat</label>
                            <input type="text" name="ket" class="form-control @error('ket') is-invalid @enderror"
                                id="ket" placeholder="Masukkan Keterangan Baru" value=" {{ $smasuk->ket }} ">
                            @error('ket')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                    </form>
                </form>
            </div>
        </div>
    </div>

@endsection
