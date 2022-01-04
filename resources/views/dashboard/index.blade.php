@extends('template.master')
@section('title', 'Home')

@section('content')
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-home"></i>
            </span> Dashboard
        </h3>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                </li>
            </ul>
        </nav>
    </div>
    <div class="row text-center">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row mt-3">
                        <h4 class="card-title">Halo, Selamat Datang</h4>
                    </div>
                    <div class="d-flex mt-3 align-items-top">
                        <div class="mb-0 flex-grow">
                            <h5 class="me-2 mb-2">Selamat Datang di Sistem Informasi Surat Masuk dan Surat Keluar
                                Jianbang BPPD PALEMBANG</h5>
                            <p class="mb-0 font-weight-light">Sistem ini digunakan untuk mempermudah segala proses yang
                                dilakukan pada penginputan surat masuk dan keluar.</p>
                        </div>
                        <div class="ms-auto">
                            <i class="mdi mdi-heart-outline text-muted"></i>
                        </div>
                    </div>
                    <br>
                    <div class="d-flex">
                        <div class="d-flex align-items-center me-4 text-muted font-weight-light">
                            <i class="mdi mdi-account-outline icon-sm me-2"></i>
                            <span>AdindaC</span>
                        </div>
                        <div class="d-flex align-items-center text-muted font-weight-light">
                            <i class="mdi mdi-clock icon-sm me-2"></i>
                            <span>Desember 24th, 2021</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
