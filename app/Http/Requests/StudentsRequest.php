<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        if( request()->routeIs('student.login') ) {
            return [
                'email'     => 'required|string|email|max:255',
                'password'  => 'required|min:8',
            ];
        }
        else if( request()->routeIs('student.store') ) {
            return [
                'firstname'             => 'required|string|max:255',
                'lastname'              => 'required|string|max:255',
                'middlename'            => 'required|string|max:255',
                'email'                 => 'required|string|email|unique:App\Models\Students,email|max:255',
                'password'              => 'required|min:8',
            ];
        }
        else if( request()->routeIs('student.update') ){
            return [
                'firstname'             => 'required|string|max:255',
                'lastname'              => 'required|string|max:255',
                'middlename'            => 'required|string|max:255'
            ];
        }
        else if( request()->routeIs('student.email') ){
            return [
                'email'     => 'required|string|email|max:255',
            ];
        }
        else if( request()->routeIs('student.password') ){
            return [
                'password'  => 'required|confirmed|min:8',
            ];
        }
        // else if( request()->routeIs('user.image') || request()->routeIs('profile.image') ){
        //     return [
        //         'image'     => 'required|image|mimes:jpg,bmp,png|max:2048',
        //     ];
        // }
    }
}