<?php

namespace App\Http\Controllers;

use App\Http\Requests\SiswaRequest;
use Illuminate\Http\Request;
use Session;
use App\Siswa;

class SiswaController extends Controller
{
    public function index()
    {
        $nomor = 0;
        $siswa_list = Siswa::orderBy('nis', 'asc')->get();

        return view('master/siswa/index', compact('siswa_list', 'nomor',));
    }

    public function create()
    {
        return view('master/siswa/tambah');
    }

    public function store(SiswaRequest $request)
    {
        Siswa::create($request->all());
        Session::flash('flsh_massage', 'Data Siswa baru berhasil disimpan.');
        return redirect('master/siswa');
    }

    public function edit(Siswa $siswa)
    {
        return view('master.siswa.edit', compact('siswa'));
    }

    public function update(Siswa $siswa, SiswaRequest $request)
    {
        $siswa->update($request->all());
        Session::flash('flsh_massage', 'Data siswa berhasil diupdate.');
        return redirect('master/siswa');
    }

    public function destroy(Siswa $siswa)
    {
        $siswa->delete();
        Session::flash('flsh_massage', 'Data siswa berhasil dihapus.');
        return redirect('master/siswa');
    }
}
