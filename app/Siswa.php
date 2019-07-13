<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    //
    protected $table = 'siswa';

    protected $fillable = ['nis', 'nama_siswa', 'jenis_kelamin', 'id_kelas'];



    public function kelas()
    {
        return $this->belongsTo('App\kelas', 'id_kelas');
    }
}
