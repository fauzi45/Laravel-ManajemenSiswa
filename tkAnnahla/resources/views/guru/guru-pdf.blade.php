<table class="table" id="myTable">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Telepon</th>
            <th scope="col">Alamat</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($guru as $key => $items)
        <tr>
            <th scope="row">{{$key+1}}</th>
            <td>{{$items->nama}}</td>
            <td>{{$items->telpon}}</td>
            <td>{{$items->alamat}}</td>
            
        </tr>
        @empty
        <p>No Data</p>
        @endforelse
    </tbody>
</table>