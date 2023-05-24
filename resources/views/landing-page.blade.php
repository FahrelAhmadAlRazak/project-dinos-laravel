@extends('layouts.master')
@push('css-landing-page')
<link rel="stylesheet" type="text/css" href="css/home.css">
@section('content')
<main>

@if(session('success'))
<p class="alert alert-success"> {{ session('success') }}</p>
@endif
<div class="container">
    <div class="text-landing">
        <div class="text1">
            <h1>Sistem Informasi <br /> <b>Distribusi dan</b><br /> <b>Pencatatan Berbasis Website</b></h1>
        </div>
        <div class="text2">
            <p>
                Permudah manajemen usaha anda dengan fitur-fitur yang kami<br />
                tawarkan sekarang juga!
            </p>
        </div>
        <button class="button1">Daftar Sekarang</button>
    </div>
    <div class="landing">
        <img src="img/landing-1.png" alt="">
    </div>
</div>


<div class="text-landing2">
    <div class="text3">
        <h1>
            <b>Fitur Unggulan Dinos</b>
        </h1>
    </div>
    <div class="text4">
        <p>
            Ini dia beberapa fitur unggulan dari website kami
        </p>
    </div>
</div>

<div class="container-2">
    <div>
        <img src="imgIcon/icon-pencatatan.png" alt="">
        <h3>Pencatatan</h3>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
            industry's standard dummy text ever since the 1500s</p>
    </div>
    <div>
        <img src="imgIcon/icon-penjadwalan.png" alt="">
        <h3>Penjadwalan</h3>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
            industry's standard dummy text ever since the 1500s</p>
    </div>
    <div>
        <img src="imgIcon/icon-pengiriman.png" alt="">
        <h3>Pengiriman</h3>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
            industry's standard dummy text ever since the 1500s</p>
    </div>
    <div>
        <img src="imgIcon/icon-monitoring.png" alt="">
        <h3>Monitoring</h3>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
            industry's standard dummy text ever since the 1500s</p>
    </div>
    <div>
        <img src="imgIcon/icon-pengajuan.png" alt="">
        <h3>Pengajuan</h3>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
            industry's standard dummy text ever since the 1500s</p>
    </div>
    <div>
        <img src="imgIcon/icon-blog.png" alt="">
        <h3>Blog</h3>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
            industry's standard dummy text ever since the 1500s</p>
    </div>
</div>

</main>
@endsection
@endpush