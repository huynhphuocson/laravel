<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserAddRequest extends Request
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
            'txtUser'       => 'required|unique:qt64_users,username',
            'txtPass'       => 'required',
            'txtRepass'     => 'required|same:txtPass'
        ];
    }

    public function messages () {
        return [
            'txtUser.required'    => 'Vui lòng nhập username',
            'txtUser.unique'      => 'Tên user đã có!!! vui lòng nhập username khác',
            'txtPass.required'    => 'Vui lòng nhập password',
            'txtRepass.required'  => 'Vui lòng nhập Repassword',
            'txtRepass.same'      => 'Vui lòng nhập giống trường  password',
        ];
    }
}
