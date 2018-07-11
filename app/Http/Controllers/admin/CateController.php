<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use App\Http\Requests\CateAddRequest;

use App\Http\Requests\CateEditRequest;

use App\Models\Cate;

use DateTime;

class CateController extends Controller
{
    public function getCateAdd(){
        $data = Cate::select('id','name','parent_id')->get()->toArray();
        return view('admin.category.add',['datacate' => $data]);
    }

    //thêm danh mục
    public function postCateAdd (CateAddRequest $request){
        $cate               = new Cate;
        $cate->name         = $request->txtCateName;
        $cate->slug         = str_slug($request->txtCateName, "-");
        $cate->parent_id    = $request->sltCate;
        $cate->created_at   = new DateTime();
        $cate->save();
        return redirect()->route('getCateList')->with(['flash-level' => 'result_msg','flash_message' => 'Bạn đã thêm danh mục thành công']);
    }

    //hiển thị
    public function getCateList (){
        $data = Cate::select('id','name','parent_id')->get()->toArray();
        return view('admin.category.list',['cate' => $data]);
    }

    //xoá catelogy
    public function getCateDel($id){
        $parent = Cate::where('parent_id',$id)->count();
        if($parent == 0){
            $cate = Cate::find($id);
            $cate->delete($id);
            return redirect()->route('getCateList')->with(['flash-level' => 'result_msg',
                'flash_message' => 'Xoá danh mục thành công']);
        }
        else{
            echo '<script type="text/javascript">
                alert("Xin lỗi! Bạn không được xoá danh mục này");
                window.location = "';
                echo route('getCateList');
            echo'"
            </script>';
        }
    }

    //sửa danh mục
    public function getCateEdit($id){
        $data = Cate::findOrFail($id)->toArray();
        $parent = Cate::select('id','name','parent_id')->get()->toArray();
        return view('admin.category.edit',['data'=>$data, 'parent'=>$parent]);
    }

    public function postCateEdit(CateEditRequest $request, $id){
        $cate = Cate::find($id);
        $cate->name         = $request->txtCateName;
        $cate->slug         = str_slug($request->txtCateName, "-");
        $cate->parent_id    = $request->sltCate;
        $cate->updated_at   = new DateTime();
        $cate->save();
        return redirect()->route('getCateList')->with(['flash-level' => 'result_msg',
            'flash_message' => 'Bạn đã cập nhật danh mục thành công']);
    }
}
