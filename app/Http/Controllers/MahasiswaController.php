<?php

namespace App\Http\Controllers;

use App\User;
use App\Mahasiswa;
use Illuminate\Http\Request;
use Alert;

class MahasiswaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $mahasiswa = Mahasiswa::with(['user'])->get();
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    public function create(){
        $user = User::all();
        return view('mahasiswa.create', compact('user'));
    }

    public function store(Request $request){
        Mahasiswa::create($request->all());
        alert('Success','Data Mahasiswa Berhasil Ditambahkan', 'success');
        return redirect()->route('mahasiswa');
    }

    public function edit($id){
        $user = User::all();
        $mahasiswa = Mahasiswa::find($id);
        return view('mahasiswa.edit', compact('mahasiswa', 'user'));
    }

    public function update(Request $request, $id){
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->update($request->all());
        toast('Yeay, Data Mahasiswa Berhasil Diedit!','success');
        return redirect()->route('mahasiswa');
    }

    public function destroy($id){
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->delete();
        alert('Success','Data Mahasiswa Berhasil Dihapus', 'success');
        return redirect()->route('mahasiswa');
    }
}
