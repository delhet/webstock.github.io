<?php

namespace App\Http\Requests\Trx;

use Illuminate\Foundation\Http\FormRequest;

class TransferBarangDetailRequest extends FormRequest
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
            'id_barang' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'id_barang.unique' => 'Barang sudah tersedia!'
        ];
    }

    /**
    * Configure the validator instance.
    *
    * @param  \Illuminate\Validation\Validator  $validator
    * @return void
    */
    // public function withValidator($validator)
    // {
    //     $validator->after(function ($validator) {
    //         $validator->errors()->add('method', $this->method());
    //     });
    // }
}
