@extends('admin.master')
@section('title','Thành viên')
@section('content')

<table class="list_table">
    <tr class="list_heading">
        <td class="id_col">STT</td>
        <td>Username</td>
        <td>Level</td>
        <td class="action_col">Quản lý?</td>
    </tr>
    @foreach($user as $item)
    <tr class="list_data">
        <td class="aligncenter">{!! $item["id"] !!}</td>
        <td class="list_td aligncenter">{!! $item["username"] !!}</td>
        <td class="list_td aligncenter">
            @if($item["id"] == 2)
                <span style="color: red; font-weight: bold;">Super Admin</span>
            @elseif($item["level"] == 1)
                <span style="color: blue; font-weight: bold;">Admin</span>
            @else
                Member
            @endif
        </td>
        <td class="list_td aligncenter">
            <a href="{!! route('getUserEdit', ['id' => $item["id"]]) !!}"><img src="../../public/qt64_admin/templates/images/edit.png" /></a>&nbsp;&nbsp;&nbsp;
            <a href="{!! route('getUserDel', ['id' => $item["id"]]) !!}"onclick="return xacnhanxoa('Bạn có chắc xoá danh mục này')"><img src="../../public/qt64_admin/templates/images/delete.png" /></a>
        </td>
    </tr>
    @endforeach
</table>
@endsection