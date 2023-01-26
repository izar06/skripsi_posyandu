@extends('app-layouts.admin.index')

@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Selamat Datang {{ auth()->user()->name }}</h1>
        </div><!-- /.col -->
       
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
<div class="container">
  <div class="row">
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-primary">
        <div class="inner">
          <h3>{{ $kader }}</h3>
  
          <p>Total Kader</p>
        </div>
        <div class="icon">
          <i class="fa-solid fa-user-nurse"></i>
        </div>
        <a href="/dashboard/kader" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-primary">
        <div class="inner">
          <h3>{{ $balita }}</h3>
  
          <p>Total Balita</p>
        </div>
        <div class="icon">
          <i class="fa-solid fa-baby"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-primary">
        <div class="inner">
          <h3>{{ $vitamin }}</h3>
  
          <p>Total Vitamin</p>
        </div>
        <div class="icon">
          <i class="fa-solid fa-syringe"></i>
        </div>
        <a href="/dashboard/vitamin" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-primary">
        <div class="inner">
          <h3>{{ $imunisasi }}</h3>
  
          <p>Total Imunisasi</p>
        </div>
        <div class="icon">
          <i class="fa-solid fa-syringe"></i>
        </div>
        <a href="/dashboard/imunisasi" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-4">
      <!-- small box -->
      <div class="small-box bg-primary">
        <div class="inner">
          <h3>{{ $vaksinasi }}</h3>
  
          <p>Total Vaksinasi</p>
        </div>
        <div class="icon">
          <i class="fa-solid fa-syringe"></i>
        </div>
        <a href="/dashboard/vaksinasi" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-4">
      <!-- small box -->
      <div class="small-box bg-primary">
        <div class="inner">
          <h3>{{ $checkup }}</h3>
  
          <p>Total Cehckup</p>
        </div>
        <div class="icon">
          <i class="fa-solid fa-notes-medical"></i>
        </div>
        <a href="/dashboard/checkup" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
  </div>
</div>
@endsection

