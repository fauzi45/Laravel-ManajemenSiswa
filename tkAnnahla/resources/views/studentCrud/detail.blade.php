@extends('layouts.master')
@section('title')
Detail Siswa
@endsection
@push('css')
<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap-editable/css/bootstrap-editable.css"
   rel="stylesheet" />
@endpush
@section('content')
<div class="swalsukses" data-swal="{{ session('success') }}"></div>

<a href="{{ url('/studentCrud/tampil') }}" class="btn btn-primary mb-2">Kembali</a>
<section style="background-color: #eee;">
   <div class="container py-5">
      <div class="row">
         <div class="col-lg-4">
            <div class="card mb-4">
               <div class="card-body text-center">
                  <img src="{{ $students->getAvatar() }}" alt="avatar" class="img-circle"
                     style="width: 150px; height: 150px; object-fit: cover;">
                  <h5 class="my-3">{{ $students->nama_depan }}</h5>
               </div>
            </div>
         </div>
         <div class="col-lg-8">
            <div class="card mb-4">
               <div class="card-body">
                  <div class="row">
                     <div class="col-sm-3">
                        <p class="mb-0">Full Name</p>
                     </div>
                     <div class="col-sm-9">
                        <p class="text-muted mb-0">{{ $students->nama_depan }} {{ $students->nama_belakang }}</p>
                     </div>
                  </div>
                  <hr>
                  <div class="row">
                     <div class="col-sm-3">
                        <p class="mb-0">Tanggal Lahir</p>
                     </div>
                     <div class="col-sm-9">
                        <p class="text-muted mb-0">{{ \Carbon\Carbon::parse($students->tanggal_lahir)->format('D, d M
                           Y') }}</p>
                     </div>
                  </div>
                  <hr>
                  <div class="row">
                     <div class="col-sm-3">
                        <p class="mb-0">Jenis Kelamin</p>
                     </div>
                     <div class="col-sm-9">
                        <p class="text-muted mb-0">{{ $students->kelamin }}</p>
                     </div>
                  </div>
                  <hr>
                  <div class="row">
                     <div class="col-sm-3">
                        <p class="mb-0">Usia</p>
                     </div>
                     <div class="col-sm-9">
                        <p class="text-muted mb-0">{{ $students->usia }}</p>
                     </div>
                  </div>
                  <hr>
                  <div class="row">
                     <div class="col-sm-3">
                        <p class="mb-0">Alamat</p>
                     </div>
                     <div class="col-sm-9">
                        <p class="text-muted mb-0">{{ $students->alamat }}</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="card">
            <div class="panel">
               <div class="panel-heading">
                  <h3 class="panel-title mt-3">Mata Pelajaran</h3>
               </div>
               <button type="button" class="btn btn-primary float-right mb-3" data-toggle="modal"
                  data-target="#exampleModal">
                  Tambah Nilai
               </button>
               <div class="panel-body">
                  <table class="table">
                     <thead>
                        <tr>
                           <th>Kode</th>
                           <th>Nama</th>
                           <th>Semester</th>
                           <th>Nilai</th>
                           <th>Guru</th>
                           <th>Aksi</th>
                        </tr>
                     </thead>
                     <tbody>
                        @forelse ($students->mapel as $mapel)
                        <tr>
                           <td>{{ $mapel->kode }}</td>
                           <td>{{ $mapel->nama }}</td>
                           <td>{{ $mapel->semester }}</td>
                           <td><a href="#" class="editable" data-type="text" data-pk="{{ $mapel->id }}"
                                 data-url="/api/studentCrud/{{ $students->id }}/editnilai"
                                 data-title="Masukkan Nilai">{{ $mapel->pivot->nilai }}</a></td>
                           <td>{{ $mapel->guru->nama }}</td>
                           <td>
                              <a href="{{ url('/studentCrud/'. $students->id .'/'. $mapel->id .'/deletenilai')}}"
                                 class="btn btn-outline-danger">Delete</a>
                           </td>
                        </tr>
                        @empty
                        <tr>
                           <td colspan="6">
                              <center><h4>Belum ada Data </h4><center>
                           </td>
                        </tr>
                        @endforelse
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
         <div class="card">
            <div class="card-body">
               <div id="chartnilai">
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Modal -->
   <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Tambah Nilai</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <form action="/studentCrud/{{ $students->id }}/tambahnilai" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                     <label for="mapel">Mata Pelajaran</label>
                     <select name="mapel" class="form-control" id="mapel">
                        @foreach ($matapelajaran as $map)
                        <option value="{{ $map->id }}">{{ $map->nama }}</option>
                        @endforeach
                     </select>
                  </div>
                  <div class="form-group @error('nilai') is-invalid @enderror">
                     <label for="exampleInputEmail1" class="form-label">Nilai</label>
                     <input type="text" name="nilai" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" value="{{ old('nilai') }}">
                     @error('nilai')
                     <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                     </span>
                     @enderror
                  </div>
            </div>
            <div class="modal-footer">
               <button type="submit" class="btn btn-primary">Simpan</button>
               </form>
            </div>
         </div>
      </div>
   </div>
</section>
@endsection

@push('js')
<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js">
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
   @if (session('status'))
   Swal.fire({
         'title': '{{ session('status') }}',
         'icon': '{{ session('statuscode') }}',
         'button': 'OK'
   })
   @endif
   Highcharts.chart('chartnilai', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Laporan Nilai Siswa',
    },
    xAxis: {
        categories: {!! json_encode($categories) !!},
        crosshair: true,
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Nilai'
        }
    },
    tooltip: {
        headerFormat: '<span class="font-size:10px;">{point.key}</span><table>',
         footerFormat: '</table>',
         shared: true,
         useHTML: true,
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [
        {
            name: 'Nilai',
            data: {!! json_encode($data) !!},
        }
    ]
});
$.fn.editable.defaults.mode = 'inline';

$(document).ready(function() {
    $('.editable').editable();
});
</script>
@endpush