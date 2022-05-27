<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
        return [
            'nik' => 'required|unique:penduduk,nik',
            'nip' => 'required|unique:users,nip',
            'no_kk' => 'required',
            'nama' => 'required',
            'email' => 'required|unique:users,email',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'status_perkawinan' => 'required',
            'pendidikan' => 'required',
            'alamat' => 'required',
            'agama' => 'required',
            'pekerjaan' => 'required',
            'jabatan_perangkat_desa' => 'required',
        ];
    }
}
