<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'nik' => 'required',
            'nip' => 'required',
            'no_kk' => 'required',
            'nama' => 'required',
            'email' => 'required',
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
