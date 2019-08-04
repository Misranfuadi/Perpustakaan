<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buku;
use Validator;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            return datatables()->of(Buku::latest()->get())
                ->addColumn('aksi', function ($data) {
                    $button = '<button type="button" name="edit" id="' . $data->id . '" class="edit btn btn-info btn-sm">Edit</button>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="delete" id="' . $data->id . '" class="delete btn btn-danger btn-sm">Delete</button>';
                    return $button;
                })
                ->rawColumns(['aksi'])
                ->make(true);
        }
        return view('master/buku/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Buku $buku, Request $request)
    {
        $rules = array(
            'isbn'          =>  'required|numeric|unique:buku,isbn',
            'judul'         =>  'required',
            'penulis'       =>  'required',
            'penerbit'      =>  'required',
            'foto'          =>  'nullable|image|max:2048'
        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        //$image = $request->file('foto');

        //$new_name = rand() . '.' . $image->getClientOriginalExtension();

        //$image->move(public_path('foto_cover'), $new_name);

        $form_data = array(
            'isbn'            =>  $request->isbn,
            'judul'           =>  $request->judul,
            'penulis'         =>  $request->penulis,
            'penerbit'        =>  $request->penerbit,
            //'foto'            =>  $new_name
        );

        Buku::create($form_data);

        return response()->json(['success' => 'Data Added successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (request()->ajax()) {
            $data = Buku::findOrFail($id);
            return response()->json(['data' => $data]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $image_name = $request->hidden_image;
        $image = $request->file('foto');
        if ($image != '') {
            $rules = array(
                'isbn'         =>  'required|numeric|unique:buku,isbn,' . $request->input('id'),
                'judul'        =>  'required',
                'penulis'      =>  'required',
                'penerbit'     =>  'required',
                'foto'         =>  'required|image|max:2048'
            );
            $error = Validator::make($request->all(), $rules);
            if ($error->fails()) {
                return response()->json(['errors' => $error->errors()->all()]);
            }

            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
        } else {
            $rules = array(
                'isbn'         =>  'required|numeric|unique:buku,isbn,' . $request->input('id'),
                'judul'        =>  'required',
                'penulis'      =>  'required',
                'penerbit'     =>  'required',
            );

            $error = Validator::make($request->all(), $rules);

            if ($error->fails()) {
                return response()->json(['errors' => $error->errors()->all()]);
            }
        }

        $form_data = array(
            'isbn'             =>  $request->isbn,
            'judul'            =>  $request->judul,
            'penulis'          =>  $request->penulis,
            'penerbit'         =>  $request->penerbit,
            'foto'             =>  $image_name
        );
        Buku::whereId($request->id)->update($form_data);

        return response()->json(['success' => 'Data is successfully updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Buku::findOrFail($id);
        $data->delete();
    }
}
