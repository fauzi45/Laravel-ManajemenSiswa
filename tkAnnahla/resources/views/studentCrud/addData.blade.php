@extends('layouts.master')
@section('title')
Register Siswa
@endsection

@section('content')

<form action="{{ url('/studentCrud') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nama Depan</label>
    <input type="text" name="nama_depan" class="form-control @error('nama_depan') is-invalid @enderror"
      id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ old('nama_depan') }}">
    @error('nama_depan')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nama Belakang</label>
    <input type="text" name="nama_belakang" class="form-control @error('nama_belakang') is-invalid @enderror"
      id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ old('nama_belakang') }}">
    @error('nama_belakang')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email</label>
    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email  "
      aria-describedby="emailHelp" value="{{ old('email') }}">
    @error('email')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Tanggal Lahir</label>
    <input type="date" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror"
      id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ old('tanggal_lahir') }}">
    @error('tanggal_lahir')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>

  <div class="mb-3">
    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
    <select name="kelamin" class="form-control" id="jenis_kelamin">
      <option value="Laki - Laki">Laki - Laki</option>
      <option value="Perempuan">Perempuan</option>
    </select>
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Usia</label>
    <div class="input-group">
      <input type="number" name="usia" class="form-control @error('usia') is-invalid @enderror" id="exampleInputEmail1"
        aria-describedby="emailHelp" value="{{ old('usia') }}>
      <span class=" input-group-text">Tahun</span>
      @error('usia')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
  </div>

  <div class="form-group">
    <label>Gambar</label>
    <input type="file" name="avatar" id="avatar" class="form-control @error('avatar') is-invalid @enderror">
    @error('avatar')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>

  <div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
    <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror"
      id="exampleFormControlTextarea1" rows="3">{{ old('alamat') }}</textarea>
    @error('alamat')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection