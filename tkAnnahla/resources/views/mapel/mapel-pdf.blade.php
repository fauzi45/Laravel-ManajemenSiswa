<div class="table-responsive">
    <table id="datatables" class="table table-striped table-hover table-bordered">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Kode</th>
                <th scope="col">Nama</th>
                <th scope="col">Semester</th>
                <th scope="col">Nama Guru</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data as $key => $items)
            <tr>
                <th scope="row">{{$key+1}}</th>
                <td>{{$items->kode}}</td>
                <td>{{$items->nama}}</td>
                <td>{{$items->semester}}</td>
                <td>{{$items->guru->nama}}</td>
            </tr>
            @empty
            <p>No Data</p>
            @endforelse

        </tbody>
    </table>
</div>