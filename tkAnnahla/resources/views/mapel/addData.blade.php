@extends('layouts.master')
@section('title')
Register Mata Pelajaran
@endsection

@section('content')

<form action="{{ url('/matapelajaran') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="mb-3">
    <label for="kode" class="form-label">Kode</label>
    <input type="text" name="kode" class="form-control @error('kode') is-invalid @enderror" id="exampleInputEmail1"
      aria-describedby="emailHelp" value="{{ old('kode') }}">
    @error('kode')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>
  <div class="mb-3">
    <label for="nama" class="form-label">Nama Mata Pelajaran</label>
    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama"
      aria-describedby="emailHelp" value="{{ old('nama') }}">
    @error('nama')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>
  <div class="mb-3">
    <label for="semester" class="form-label">Semester</label>
    <input type="number" name="semester" class="form-control @error('semester') is-invalid @enderror" id="email  "
      aria-describedby="emailHelp" value="{{ old('semester') }}">
    @error('semester')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>
  <div class="mb-3">
    <label for="nama_guru" class="form-label">Nama Guru</label>
    <select name="guru_id" class="form-control" id="nama_guru">
      @foreach ($gurus as $guru)
      <option value="{{ $guru->id }}">{{ $guru->nama }}</option>
      @endforeach
    </select>
  </div>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection