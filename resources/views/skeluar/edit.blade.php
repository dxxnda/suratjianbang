@extends('template.master')
@section('title', 'Edit Surat Keluar')

@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title">Edit <strong>Surat Keluar</strong></h1>
                <br>

                <form action="{{ url('/skeluar/' . $skeluar->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <form class="forms-sample">
                        <div class="form-group">
                            <label for="nokeluar">Nomor Surat</label>
                            <input type="text" name="nokeluar" class="form-control @error('nokeluar') is-invalid @enderror"
                                id="nokeluar" placeholder="Masukkan Nomor Baru" value=" {{ $skeluar->nokeluar }} ">
                            @error('nokeluar')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="perihal">Perihal</label>
                            <textarea type="text" name="perihal"
                                class="form-control @error('perihal') is-invalid @enderror" id="perihal"
                                placeholder="Input Perihal Baru"> {{ $skeluar->perihal }} </textarea>
                            @error('perihal')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="dituju">Bagian yang Dituju</label>
                            <input type="text" name="dituju" class="form-control @error('dituju') is-invalid @enderror"
                                id="dituju" placeholder="Input Bagian yang Dituju Baru" value=" {{ $skeluar->dituju }} ">
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
                                id="ket" placeholder="Masukkan Keterangan Baru" value=" {{ $skeluar->ket }} ">
                            @error('ket')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- <div class="form-group">
                            <label>File upload</label>
                            <input type="file" name="img[]" class="file-upload-default">
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled
                                    placeholder="Upload Image">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-gradient-primary"
                                        type="button">Upload</button>
                                </span>
                            </div>
                        </div> --}}
                        <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                    </form>
                </form>
            </div>
        </div>
    </div>

@endsection
