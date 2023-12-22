@extends('layouts.master')
@section('title')
Detail Guru
@endsection
@section('content')

<a href="{{ url('/guru') }}" class="btn btn-primary mb-2">Kembali</a>
<section style="background-color: #eee;">
   <div class="container py-5">
      <div class="row">
         <div class="col-lg-12">
            <div class="card mb-4">
               <div class="card-body">
                  <div class="row">
                     <div class="col-sm-3">
                        <p class="mb-0">Nama</p>
                     </div>
                     <div class="col-sm-9">
                        <p class="text-muted mb-0">{{ $guru->nama }}</p>
                     </div>
                  </div>
                  <hr>
                  <div class="row">
                     <div class="col-sm-3">
                        <p class="mb-0">Nomor Telepon</p>
                     </div>
                     <div class="col-sm-9">
                        <p class="text-muted mb-0">{{ $guru->telpon }}</p>
                     </div>
                  </div>
                  <hr>
                  <div class="row">
                     <div class="col-sm-3">
                        <p class="mb-0">Alamat</p>
                     </div>
                     <div class="col-sm-9">
                        <p class="text-muted mb-0">{{ $guru->alamat }}</p>
                     </div>
                  </div>
                  <hr>
                  <div class="row">
                     <div class="col-sm-3">
                        <p class="mb-0">Mata Pelajaran</p>
                     </div>
                     <div class="col-sm-9">
                        @foreach ($guru->mapel as $mapel)
                        <p class="text-muted mb-0">{{ $mapel->nama }}</p>
                           
                        @endforeach
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
@endsection