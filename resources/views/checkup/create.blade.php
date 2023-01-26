@extends('app-layouts.admin.index')

@section('content')
    <div class="content-fluid">
        <section>
          <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card my-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h5>Tambah Balita</h5>
                            </div>
                        </div>
                        @if(session()->has('error'))
                        <div class="alert alert-danger col-lg-12" role="alert">
                          {{ session('error') }}
                        </div>
                        @endif
                        <div class="card-shadow">
                            <div class="card-body">
                                <form action="/dashboard/checkup" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="balita_id">Pilih Balita</label>
                                        <select name="balita_id" required class="form-control">
                                            <option value="">Pilih Nama Balita</option>
                                            @foreach ($balita as $item)
                                                <option value="{{ $item->id }}">
                                                    {{ $item->nama_balita }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="berat_badan">Berat Badan</label>
                                        <input type="text" class="form-control @error('berat_badan') is-invalid @enderror"" name="berat_badan" placeholder="Berat Badan" value="{{ old('berat_badan') }}">
                                        @error('berat_badan')
                                            <div class="invalid-feedback">
                                            {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="vitamin_id">Pilih Vitamin</label>
                                        <select name="vitamin_id" required class="form-control">
                                            <option value="">Pilih Jenis Vitamin</option>
                                            @foreach ($vitamin as $item)
                                                <option value="{{ $item->id }}">
                                                    {{ $item->jenis_vitamin }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('vitamin_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="imunisasi_id">Pilih Imunisasi</label>
                                        <select name="imunisasi_id" required class="form-control">
                                            <option value="">Pilih Jenis Imunisasi</option>
                                            @foreach ($imunisasi as $item)
                                                <option value="{{ $item->id }}">
                                                    {{ $item->jenis_imunisasi }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="status_gizi">Status Gizi</label>
                                        <input type="text" class="form-control @error('status_gizi') is-invalid @enderror" name="status_gizi" placeholder="Berat Badan" value="{{ old('status_gizi') }}">
                                        @error('status_gizi')
                                            <div class="invalid-feedback">
                                            {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="checkup_ke">Checkup Ke</label>
                                        <input type="text" class="form-control @error('checkup_ke') is-invalid @enderror"" name="checkup_ke" placeholder="Checkup Ke" value="{{ old('checkup_ke') }}">
                                        @error('checkup_ke')
                                            <div class="invalid-feedback">
                                            {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <button class="btn btn-primary btn-block" type="submit">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </section>
    </div>
@endsection