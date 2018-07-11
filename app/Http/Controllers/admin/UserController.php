<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use App\Http\Requests\UserAddRequest;

use DateTime,Auth;

class UserController extends Controller
{
    //thêm user
    public function getUserAdd(){
        return view('admin.user.add');
    }

    public function postUserAdd(UserAddRequest $request){
        $user               = new User;
        $user->username     = $request->txtUser;
        $user->password     = bcrypt($request->txtPass);
        $user->level        = $request->rdoLevel;
        $user->created_at   = new DateTime();
        $user->save();
        return redirect()->route('getUserList')->with(['flash-level' => 'result_msg',
            'flash_message' => 'Bạn đã thêm user thành công']);
    }

    //hiển thị
    public function getUserList(){
        $data = User::select('id','username','level')->get()->toArray();
        return view('admin.user.list',['user' => $data]);
    }

    //xoa user
    public function getUserDel($id){
        $user_current_login = Auth::user()->id;

        $user_delete = User::find($id);

        if(($id == 2) || ($user_current_login != 2 && $user_delete["level"] == 1)){
            return redirect()->route('getUserList')->with(['flash-level' => 'error_msg',
                'flash_message' => 'Bạn không được phép xoá']);
        } else {
            $user_delete->delete($id);
            return redirect()->route('getUserList')->with(['flash-level' => 'result_msg',
                'flash_message' => 'Xoá user thành công']);
        }
    }

    //sửa user
    public function getUserEdit($id){
        $data = User::findOrFail($id)->toArray();
        if(Auth::user()->id != 2 && ($id == 2 || ($data["level"] == 1 && (Auth::user()->id != $id)))){
            return redirect()->route('getUserList')->with(['flash-level' => 'error_msg',
                'flash_message' => 'Bạn không được quyền sửa thành viên này']);
        }
        return view('admin.user.edit',['user' => $data]);
    }

    public function postUserEdit(Request $request, $id){
        $user = User::find($id);
        if($request->txtPass){
            $this->validate($request,
              [
                  'txtRepass'   => 'same.txtPass'
              ],
              [
                  'txtRepass.same'  => 'Trường này phải trùng với password'
              ]
            );
            $user->password = bcrypt($request->txtPass);
        }
        $user->level = $request->rdoLevel;
        $user->updated_at = new DateTime;
        $user->save;
        return redirect()->route('getUserList')->with(['flash-level' => 'result_msg',
            'flash_message' => 'Cập nhật thành viên thành công']);
    }
}
