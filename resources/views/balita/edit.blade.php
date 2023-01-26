@extends('app-layouts.admin.index')

@section('content')
    <div class="content-fluid">
        <section>
            <div class="row">
               <div class="container">
                <div class="col-lg-12">
                    <div class="card my-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h5>Ubah Data Balita</h5>
                            </div>
                        </div>
                        @if(session()->has('success'))
                        <div class="alert alert-success col-lg-12" role="alert">
                          {{ session('success') }}
                        </div>
                        @endif
                        <div class="card-shadow">
                            <div class="card-body">
                                <form action="/dashboard/balita/{{ $data->id }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-group">
                                        <label for="nama_balita">Nama Balita</label>
                                        <input type="text" class="form-control @error('nama_balita') is-invalid @enderror"" name="nama_balita" placeholder="nama_balita" value="{{ $data->nama_balita }}">
                                        @error('nama_balita')
                                            <div class="invalid-feedback">
                                            {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_ibu">Nama Ibu</label>
                                        <input type="text" class="form-control @error('nama_ibu') is-invalid @enderror"" name="nama_ibu" placeholder="nama_ibu" value="{{ $data->nama_ibu }}">
                                        @error('nama_ibu')
                                            <div class="invalid-feedback">
                                            {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="umur">Umur</label>
                                        <input type="text" class="form-control @error('umur') is-invalid @enderror"" name="umur" placeholder="Umur" value="{{ $data->umur }}">
                                        @error('umur')
                                            <div class="invalid-feedback">
                                            {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Jenis Kelamin</label>
                                       <select name="jenis_kelamin" class="form-control" aria-label="Default select example">
                                            <option value="Laki-laki" @if ($data->jenis_kelamin == 'Laki-laki') selected @endif>Laki-laki</option>
                                            <option value="Perempuan" @if ($data->jenis_kelamin == 'Perempuan') selected @endif>Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="tgl_lahir">Tanggal Lahir</label>
                                        <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror"" name="tgl_lahir" placeholder="tgl_lahir" value="{{ $data->tgl_lahir }}">
                                        @error('tgl_lahir')
                                            <div class="invalid-feedback">
                                            {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <textarea name="alamat" id="alamat" cols="20" rows="5" class="form-control @error('alamat') is-invalid @enderror"">{{ $data->alamat }}</textarea>
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