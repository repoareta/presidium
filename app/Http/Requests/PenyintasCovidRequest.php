<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PenyintasCovidRequest extends FormRequest
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
            'nama' => 'required',
            'kelas_id' => 'required',
            'jenkel' => 'required',
            'province_id' => 'required',
            'regency_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'province_id.required' => 'Provinsi wajib diisi',
            'regency_id.required' => 'Kabupaten wajib diisi',
        ];
    }
}
