@extends('layouts.master')
@section('title')
Detail Mata Pelajaran
@endsection
@section('content')

<a href="{{ url('/matapelajaran') }}" class="btn btn-primary mb-2">Kembali</a>
<section style="background-color: #eee;">
   <div class="container py-5">
      <div class="row">
         <div class="col-lg-12">
            <div class="card mb-4">
               <div class="card-body">
                  <div class="row">
                     <div class="col-sm-3">
                        <p class="mb-0">Kode</p>
                     </div>
                     <div class="col-sm-9">
                        <p class="text-muted mb-0">{{ $mapel->kode }}</p>
                     </div>
                  </div>
                  <hr>
                  <div class="row">
                     <div class="col-sm-3">
                        <p class="mb-0">Nama Mata Pelajaran</p>
                     </div>
                     <div class="col-sm-9">
                        <p class="text-muted mb-0">{{ $mapel->nama }}</p>
                     </div>
                  </div>
                  <hr>
                  <div class="row">
                     <div class="col-sm-3">
                        <p class="mb-0">Semester</p>
                     </div>
                     <div class="col-sm-9">
                        <p class="text-muted mb-0">{{ $mapel->semester }}</p>
                     </div>
                  </div>
                  <hr>
                  <div class="row">
                     <div class="col-sm-3">
                        <p class="mb-0">Nama Guru</p>
                     </div>
                     <div class="col-sm-9">
                        <p class="text-muted mb-0">{{ $mapel->guru->nama }}</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
@endsection