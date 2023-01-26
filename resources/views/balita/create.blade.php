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
                        <div class="card-shadow">
                            <div class="card-body">
                                <form action="/dashboard/balita" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="nama_balita">Nama Balita</label>
                                        <input type="text" class="form-control @error('nama_balita') is-invalid @enderror"" name="nama_balita" placeholder="nama_balita" value="{{ old('nama_balita') }}">
                                        @error('nama_balita')
                                            <div class="invalid-feedback">
                                            {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_ibu">Nama Ibu</label>
                                        <input type="text" class="form-control @error('nama_ibu') is-invalid @enderror"" name="nama_ibu" placeholder="nama_ibu" value="{{ old('nama_ibu') }}">
                                        @error('nama_ibu')
                                            <div class="invalid-feedback">
                                            {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="umur">Umur</label>
                                        <input type="text" class="form-control @error('umur') is-invalid @enderror"" name="umur" placeholder="Umur" value="{{ old('umur') }}">
                                        @error('umur')
                                            <div class="invalid-feedback">
                                            {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <label for="jenis_kelamin">Jenis Kelamin</label><br>
                                    <input type="radio" id="html" name="jenis_kelamin" value="Laki-laki">
                                    <label for="html">Laki-laki</label><br>
                                    <input type="radio" id="css" name="jenis_kelamin" value="Perempuan">
                                    <label for="css" class="mb-3">Perempuan</label><br>
                                        @error('jenis_kelamin')
                                            <div class="invalid-feedback">
                                            {{ $message }}
                                            </div>
                                        @enderror
                                    
                                    <div class="form-group">
                                        <label for="tgl_lahir">Tanggal Lahir</label>
                                        <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror"" name="tgl_lahir" placeholder="tgl_lahir" value="{{ old('tgl_lahir') }}">
                                        @error('tgl_lahir')
                                            <div class="invalid-feedback">
                                            {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <textarea name="alamat" id="alamat" cols="20" rows="5" class="form-control @error('alamat') is-invalid @enderror"">{{ old('alamat') }}</textarea>
                                        @error('alamat')
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