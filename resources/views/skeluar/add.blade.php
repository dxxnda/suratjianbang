@extends('template.master')
@section('title', 'Add Surat Keluar')

@section('content')
<div class="page-header">
    <h3 class="page-title"> Tambah Surat Keluar </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/skeluar') }}">Surat Keluar</a></li>
            <li class="breadcrumb-item active" aria-current="page"> Tambah Surat Keluar</li>
        </ol>
    </nav>
</div>
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title">Tambah Surat Keluar</h1>
                <br>
                <form action="{{ url('skeluar') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <form class="forms-sample">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="file">Lampiran</label>
                                <input type="file" class="file-upload-browse btn btn-gradient-primary" name="file" id="file">
                            </div>
                            <label for="nokeluar">Nomor Surat</label>
                            <input type="text" name="nokeluar" class="form-control @error('nokeluar') is-invalid @enderror"
                                id="nokeluar" value="{{ old('nokeluar') }}" placeholder="Input Nomor Surat">
                            @error('nokeluar')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="perihal">Perihal</label>
                            <textarea type="text" name="perihal" class="form-control @error('perihal') is-invalid @enderror"
                                id="perihal" placeholder="Input Perihal" value="">{{ old('perihal') }}</textarea>
                            @error('perihal')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="dituju">Bagian yang Dituju</label>
                            <input type="text" name="dituju" class="form-control @error('dituju') is-invalid @enderror"
                                id="dituju" value="{{ old('dituju') }}" placeholder="Input bagian yang dituju">
                            @error('dituju')
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
                                id="ket" value="{{ old('ket') }}" placeholder="Input ket Surat">
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
