@extends('layouts.master')
@section('title')
Data Mata Pelajaran
@endsection
@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
@endpush
@section('content')
<div class="swal" data-swal="{{ session('success') }}"></div>
<a href="{{ url('/matapelajaran/create') }}" class="btn btn-primary mb-2">Tambah</a>
<a href="{{ url('/matapelajaran/pdf-mapel/view') }}" target="_blank">
    <button class="btn btn-success mb-2 float-right">Download PDF</button>
</a>
<table class="table" id="myTable">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Kode</th>
            <th scope="col">Nama</th>
            <th scope="col">Semester</th>
            <th scope="col">Nama Guru</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($mapel as $key => $items)
        <tr>
            <th scope="row">{{$key+1}}</th>
            <td>{{$items->kode}}</td>
            <td>{{$items->nama}}</td>
            <td>{{$items->semester}}</td>
            <td>{{$items->guru->nama}}</td>
            <td>
                <form action="/matapelajaran/{{$items->id}}" method="POST">
                    @csrf
                    @method('delete')
                    <a href="/matapelajaran/{{ $items->id }}" class="btn btn-outline-info">Detail</a>
                    <a href="/matapelajaran/{{ $items->id }}/edit" class="btn btn-outline-warning">Edit</a>
                    <input type="submit" value="Delete" class="btn btn-outline-danger">
                </form>
            </td>
        </tr>
        @empty
        <p>No Data</p>
        @endforelse

    </tbody>
</table>

@endsection
@push('js')
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    let table = new DataTable('#myTable', {
    // config options...
});
const swal = $('.swal').data('swal');
        if (swal) {
            Swal.fire({
                'title': 'success',
                'text': swal,
                'icon': 'success'
            })
        }
</script>
@endpush