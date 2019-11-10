<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiswaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ($this->method() == 'PATCH') {
            $nis_rules     =   'required|string|size:4|unique:siswa,nis,' . $this->get('id');
        } else {
            $nis_rules     = 'required|string|size:4|unique:siswa,nis';
        }

        return [
            'nis' => $nis_rules,
            'nama_siswa'    => 'required|string|max:50',
            'jenis_kelamin' => 'required|in:p,w',
            'id_kelas'      => 'required',

        ];
    }
}
