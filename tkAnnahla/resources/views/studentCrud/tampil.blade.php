@extends('layouts.master')
@section('title')
Data Siswa
@endsection
@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
@endpush
@section('content')
<div class="swal" data-swal="{{ session('success') }}"></div>
<a href="{{ url('/studentCrud/create') }}" class="btn btn-primary mb-2">Tambah</a>
<table class="table" id="myTable">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Tanggal Lahir</th>
            <th scope="col">Kelamin</th>
            <th scope="col">Usia</th>
            <th scope="col">Alamat</th>
            <th scope="col">DiDaftarkan</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($students as $key => $items)
        <tr>
            <th scope="row">{{$key+1}}</th>
            <td>{{$items->nama_depan}} {{$items->nama_belakang}}</td>
            <td>{{ \Carbon\Carbon::parse($items->tanggal_lahir)->formatLocalized('%d %B %Y') }}</td>
            <td>{{$items->kelamin}}</td>
            <td>{{$items->usia}}</td>
            <td>
                <form action="/studentCrud/{{$items->id}}" method="POST">
                    @csrf
                    @method('delete')
                    <a href="/studentCrud/{{ $items->id }}" class="btn btn-outline-info">Detail</a>
                    <a href="/studentCrud/{{ $items->id }}/edit" class="btn btn-outline-warning">Edit</a>
                    <input type="submit" value="Delete" class="btn btn-outline-danger">
                </form>
            </td>
            <td>{{$items->created_at}}</td>
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