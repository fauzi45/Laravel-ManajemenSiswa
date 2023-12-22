@extends('layouts.master')
@section('title')
Data Guru
@endsection
@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
@endpush
@section('content')
<div class="swal" data-swal="{{ session('success') }}"></div>
<a href="{{ url('/guru/create') }}" class="btn btn-primary mb-2">Tambah</a>
<a href="{{ url('/guru/pdf-guru/view') }}" target="_blank">
    <button class="btn btn-success mb-2 float-right">Download PDF</button>
</a>
<table class="table" id="myTable">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Telepon</th>
            <th scope="col">Alamat</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($guru as $key => $items)
        <tr>
            <th scope="row">{{$key+1}}</th>
            <td>{{$items->nama}}</td>
            <td>{{$items->telpon}}</td>
            <td>{{$items->alamat}}</td>
            <td>
                <form action="/guru/{{$items->id}}" method="POST">
                    @csrf
                    @method('delete')
                    <a href="/guru/{{ $items->id }}" class="btn btn-outline-info">Detail</a>
                    <a href="/guru/{{ $items->id }}/edit" class="btn btn-outline-warning">Edit</a>
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