<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasienCovidRequest extends FormRequest
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
            'province_id' => 'required',
            'regency_id' => 'required',
            'jenkel' => 'required',
            'kondisi' => 'required',
            'support' => 'required',
            'kondisi_sendiri' => 'required_if:kondisi,T',
            'support_sendiri' => 'required_if:support,T',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'kondisi_sendiri.required_if' => 'Kondisi jawaban anda wajib diisi',
            'support_sendiri.required_if' => 'Support jawaban anda wajib diisi',
            'province_id.required' => 'Provinsi wajib diisi',
            'regency_id.required' => 'Kabupaten wajib diisi',
        ];
    }
}
