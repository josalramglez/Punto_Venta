<?php

namespace App\Http\Requests\Provider;

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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
                'name'=>'required|string|max:255',

                'email'=>'required|email|string|unique:providers,email,'. $this->route
                ('provider')->id.'|max:200',

                'ruc_number'=>'required|string|min:11|unique:providers,ruc_number,'. 
                $this->route('provider')->id.'|max:200',

                'address'=>'nullable|string|max:255',
                'phone'=>'required|string|min:10|unique:providers,phone,'. $this->route
                ('provider')->id.'|max:10',
            ];
        }
    
        public function messages(){
            return[
                'name.required'=>'Este campo es requerido.',
                'name.string'=>'El valor no es correcto.',
                'name.max'=>'Solo se permiten 255 caracteres.',
    
                'email.required'=>'Este campo es requerido.',
                'email.email'=>'No es un correo electrónico.',
                'email.string'=>'El valor no es correcto.',
                'email.max'=>'Solo se permiten 200 caracteres.',
                'email.unique'=>'Ya se encuentra registrado.',
    
                'ruc_number.required'=>'Este campo es requerido.',
                'ruc_number.string'=>'El valor no es correcto.',
                'ruc_number.max'=>'Solo se permiten 11 caracteres.',
                'ruc_number.min'=>'Se requiere de 11 caracteres.',
                'ruc_number.unique'=>'Ya se encuentra registrado.',
    
                'address.string'=>'El valor no es correcto.',
                'address.max'=>'Solo se permite 255 caracteres.',
    
                'phone.required'=>'Este campo es requerido.',
                'phone.string'=>'El valor no es correcto.',
                'phone.max'=>'Solo se permiten 10 caracteres.',
                'phone.min'=>'Se requiere de 10 caracteres.',
                'phone.unique'=>'Ya se encuentra registrado.',
    
            ];
        }
}
