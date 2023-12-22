<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guru = Guru::get();
        return view('guru.tampil', ['guru' => $guru]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('guru.addData');
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
            'nama'            => 'required|max:20',
            'telpon'          => 'required|max:15',
            'alamat'          => 'required|max:100',
        ]);
        Guru::create($data);
        return redirect('/guru')->with('success', 'Data Guru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $guru = Guru::with('mapel')->find($id);

        return view('guru.detail',['guru' => $guru]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $guru = Guru::find($id);

        return view('guru.edit',['guru' => $guru]);
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
            'nama'            => 'required|max:20',
            'telpon'          => 'required|max:15',
            'alamat'          => 'required|max:100',
        ]);
        $update = Guru::find($id);
        $update->update($data);

        return redirect('/guru')->with('success', 'Data Guru berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $guru = Guru::find($id);
        
        $guru->delete();
        return redirect('/guru')->with('success', 'Data guru berhasil dihapus');
    }

    public function download(){
        $guru = Guru::limit(20)->get();
        $pdf = PDF::loadView('guru.guru-pdf',compact('guru'));
        $pdf->setPaper('A4','portrait');
        return $pdf->stream('guru-pdf.pdf');
    }
}
