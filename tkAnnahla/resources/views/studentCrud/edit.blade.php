@extends('layouts.master')
@section('title')
Edit Data {{$students->nama_depan}} {{$students->nama_belakang}}
@endsection

@section('content')

@if ($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif
<a href="{{ url('/studentCrud/tampil') }}" class="btn btn-primary mb-2">Kembali</a>
<form action="{{ url('/studentCrud/'.$students->id) }}" method='POST' enctype="multipart/form-data">
  @csrf
  @method('PUT')
  <input type="hidden" name="oldavatar" value="{{ $students->avatar }}">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nama Depan</label>
    <input type="text" value="{{ $students->nama_depan }}" name="nama_depan" class="form-control"
      id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nama Belakang</label>
    <input type="text" value="{{ $students->nama_belakang }}" name="nama_belakang" class="form-control"
      id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Tanggal Lahir</label>
    <input type="date" value="{{ $students->tanggal_lahir }}" name="tanggal_lahir" class="form-control"
      id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
    <select name="kelamin" class="form-control" id="jenis_kelamin">
      <option value="Laki - Laki" @if($students->kelamin == 'Laki - Laki') selected @endif>Laki - Laki</option>
      <option value="Perempuan" @if($students->kelamin == 'Perempuan') selected @endif>Perempuan</option>
    </select>
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Usia</label>
    <div class="input-group">
      <input type="number" value="{{ $students->usia }}" name="usia" class="form-control" id="exampleInputEmail1"
        aria-describedby="emailHelp">
      <span class="input-group-text">Tahun</span>
    </div>
  </div>

  <div class="form-group">
    <label>Gambar</label>
    <input type="file" name="avatar" id="avatar" class="form-control">
  </div>

  <div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
    <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1"
      rows="3">{{ $students->alamat }}</textarea>
  </div>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection