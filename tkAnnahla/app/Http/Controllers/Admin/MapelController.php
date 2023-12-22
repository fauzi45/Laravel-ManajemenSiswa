<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Mapel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mapel = Mapel::with('guru')->get();
        return view('mapel.tampil', ['mapel' => $mapel]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gurus = Guru::all();
        return view('mapel.addData', ['gurus' => $gurus]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'kode'          => 'required|max:10',
            'nama'          => 'required|max:30',
            'semester'      => 'required|integer',
            'guru_id'       => 'required',
        ]);
        Mapel::create($data);
        return redirect('/matapelajaran')->with('success', 'Data mata pelajaran berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mapel = Mapel::find($id);

        return view('mapel.detail',['mapel' => $mapel]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mapel = Mapel::find($id);
        $gurus = Guru::all();
        return view('mapel.edit',['mapel' => $mapel,'gurus' => $gurus]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'kode'          => 'required|max:10',
            'nama'          => 'required|max:30',
            'semester'      => 'required|integer',
            'guru_id'       => 'required',
        ]);
        $update = Mapel::find($id);
        $update->update($data);

        return redirect('/matapelajaran')->with('success', 'Data Mata Pelajaran berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mapel = Mapel::find($id);
        
        $mapel->delete();
        return redirect('/matapelajaran')->with('success', 'Data siswa berhasil dihapus');
    }

    public function download(){
        $data = Mapel::limit(20)->get();
        $pdf = PDF::loadView('mapel.mapel-pdf',compact('data'));
        $pdf->setPaper('A4','portrait');
        return $pdf->stream('mapel-pdf.pdf');
    }
}
