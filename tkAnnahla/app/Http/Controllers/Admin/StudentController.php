<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mapel;
use App\Models\Student;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session as FacadesSession;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function store(Request $request)
    {

        // Validasi data 
        $data = $request->validate([
            'nama_depan'         => 'required|max:30',
            'nama_belakang'      => 'required|max:30',
            'tanggal_lahir'      => 'required',
            'kelamin'            => 'required',
            'usia'               => 'required|min:1',
            'alamat'             => 'required|max:100',
            'avatar'             => 'required|image|file|mimes:png,jpg,jpeg,webp'
        ]);

        //insert data ke user
        $user = new User();
        $user->name = $request->nama_depan;
        $user->email = $request->email;
        $user->role = 'siswa';
        $user->password = bcrypt('rahasia');
        $user->save();

        //upload gambar
        $file = $request->file('avatar');
        $filename = uniqid() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/students/img', $filename);
        $data['avatar'] = $filename;
        $data['user_id'] = $user->id;
        //insert data ke student
        Student::create($data);
        return redirect('/studentCrud/tampil')->with('success', 'Data siswa berhasil ditambahkan');
    }

    //Function Simpan Data
    public function create()
    {
        return view('studentCrud.addData');
    }

    //Function Read Data
    public function index()
    {
        $students = Student::get();

        return view('studentCrud.tampil', ['students' => $students]);
        // dd($student);
    }

    //Function Read Data {id}
    public function show($id)
    {
        $students = Student::find($id);
        $matapelajaran = Mapel::all();
        $categories = [];
        $data = [];

        foreach ($matapelajaran as $mp) {
            if ($students->mapel()->wherePivot('mapel_id', $mp->id)->first()) {
                $categories[] = $mp->nama;
                $data[] = $students->mapel()->wherePivot('mapel_id', $mp->id)->first()->pivot->nilai;
            }
        }
        return view('studentCrud.detail', [
            'students' => $students,
            'matapelajaran' => $matapelajaran, 'categories' => $categories,
            'data' => $data
        ]);
    }

    public function tambahnilai(Request $request, $id)
    {
        $students = Student::find($id);
        if ($students->mapel()->where('mapel_id', $request->mapel)->exists()) {
            FacadesSession::flash('statuscode', 'warning');
            return redirect('studentCrud/' . $id)->with('status', 'Data mata pelajaran sudah ada');
        }
        $students->mapel()->attach($request->mapel, ['nilai' => $request->nilai]);
        FacadesSession::flash('statuscode', 'success');
        return redirect('studentCrud/' . $id)->with('status', 'Nilai berhasil ditambahkan');
    }

    public function deletenilai($idstudent, $idmapel){
        $student = Student::find($idstudent);
        $student->mapel()->detach($idmapel);
        FacadesSession::flash('statuscode', 'success');
        return redirect()->back()->with('status','Data nilai berhasil dihapus');
    }
    //Function Edit to form Edit Data{id}
    public function edit($id)
    {
        $students = Student::find($id);

        return view('studentCrud.edit', ['students' => $students]);
    }

    //Function Update - Simpan Hasil Update
    public function update($id, Request $request)
    {
        $data = $request->validate([
            'nama_depan'         => 'required|max:30',
            'nama_belakang'      => 'required|max:30',
            'tanggal_lahir'      => 'required',
            'kelamin'            => 'required',
            'usia'               => 'required|min:1',
            'alamat'             => 'required|max:150',
            'avatar'             => 'image|file|mimes:png,jpg,jpeg,webp'
        ]);

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/students/img/', $filename);

            Storage::delete('public/students/img/' . $request->oldavatar);
            $data['avatar'] = $filename;
        } else {
            $data['avatar'] = $request->oldavatar;
        }
        $update = Student::find($id);
        $update->update($data);

        return redirect('/studentCrud/tampil')->with('success', 'Data siswa berhasil diubah');
    }

    //function destroy data ke database per - id
    public function destroy($id)
    {
        $student = Student::find($id);
        Storage::delete('public/students/img/' . $student->avatar);
        $student->delete();
        return redirect('/studentCrud/tampil')->with('success', 'Data siswa berhasil dihapus');
    }
}
