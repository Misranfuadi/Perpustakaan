<?php

namespace App\Http\Controllers;

use App\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KelasController extends Controller
{
    public function index(Request $request)
    {
        $kelas_list = Kelas::orderBy('nama_kelas', 'asc')->get();
        $i = 1;
        if ($request->ajax())
            return view('kelas.table', compact('kelas_list', 'i'));
        else
            return view('kelas.index', compact('kelas_list', 'i'));
    }

    public function create(Request $request)
    {
        if ($request->isMethod('get'))
            return view('kelas.form');
        else {
            $rules = [
                'nama_kelas' => 'required',
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails())
                return response()->json([
                    'fail' => true,
                    'errors' => $validator->errors()
                ]);
            $kelas = new Kelas();
            $kelas->nama_kelas = $request->nama_kelas;
            $kelas->save();
            return response()->json([
                'fail' => false,
                'redirect_url' => url('kelas')
            ]);
        }
    }

    public function delete($id)
    {
        Kelas::destroy($id);
        return redirect('kelas');
    }

    public function update(Request $request, $id)
    {
        if ($request->isMethod('get'))
            return view('kelas.form', ['kelas' => Kelas::find($id)]);
        else {
            $rules = [
                'nama_kelas' => 'required',
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails())
                return response()->json([
                    'fail' => true,
                    'errors' => $validator->errors()
                ]);
            $kelas = Kelas::find($id);
            $kelas->nama_kelas = $request->nama_kelas;
            $kelas->save();
            return response()->json([
                'fail' => false,
                'redirect_url' => url('kelas')
            ]);
        }
    }
}
