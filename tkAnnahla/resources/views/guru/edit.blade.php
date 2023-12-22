@extends('layouts.master')
@section('title')
Edit Data Guru
@endsection

@section('content')

<form action="{{ url('/guru',$guru->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="nama" class="form-label">Nama</label>
      <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="exampleInputEmail1"
        aria-describedby="emailHelp" value="{{ $guru->nama }}">
      @error('nama')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
    <div class="mb-3">
      <label for="telpon" class="form-label">Nomor Telepon</label>
      <input type="number" name="telpon" class="form-control @error('telpon') is-invalid @enderror" id="nama"
        aria-describedby="emailHelp" value="{{ $guru->telpon }}">
      @error('telpon')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
    <div class="mb-3">
      <label for="alamat" class="form-label">Alamat</label>
      <textarea name="alamat" name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="alamat "
        aria-describedby="emailHelp">{{ $guru->alamat }}</textarea>
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