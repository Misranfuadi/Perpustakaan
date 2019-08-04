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
        if ($request->ajax())
            return view('master/kelas/table', compact('kelas_list'));
        else
            return view('master/kelas/index', compact('kelas_list'));
    }

    public function create(Kelas $kelas, Request $request)
    {
        if ($request->isMethod('get'))
            return view('master/kelas/form');
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
            $kelas->nama_kelas = $request->nama_kelas;
            $kelas->save();
            return response()->json([
                'fail' => false,
                'redirect_url' => url('master/kelas')
            ]);
        }
    }

    public function delete($id)
    {
        Kelas::destroy($id);
        return redirect('master/kelas');
    }

    public function update(Request $request, $id)
    {
        if ($request->isMethod('get'))
            return view('master/kelas/form', ['kelas' => Kelas::find($id)]);
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
                'redirect_url' => url('master/kelas')
            ]);
        }
    }
}
