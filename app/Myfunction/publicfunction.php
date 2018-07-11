<?php
/**
 * Created by PhpStorm.
 * User: PS_HUYNH
 * Date: 10/07/2018
 * Time: 11:24 SA
 */

function menuMulti ($data,$patent_id = 0,$str="---|",$select=0){
    foreach ($data as $val){
        $id = $val["id"];
        $name = $val["name"];

        if($val["parent_id"] == $patent_id){
            if($select != 0 && $id == $select){
                echo '<option value="'.$id.'" selected>'.$str." ".$name.'</option>';
            } else {
                echo '<option value="'.$id.'">'.$str." ".$name.'</option>';
            }
            menuMulti ($data,$id,$str."---|",$select);
        }
    }
}

function listCate ($data,$parent = 0,$str=""){
    foreach($data as $val){
        $id = $val["id"];
        $name = $val["name"];
        if ($val["parent_id"] == $parent){
            echo ' 
            <tr class="list_data">
                <td class="aligncenter">'.$id.'</td>';
                if($str == ""){
                    echo'<td class="list_td alignleft">'.$str.' <b>'.$name.'</b></td>';
                } else {
                    echo'<td class="list_td alignleft">'.$str.' '.$name.'</td>';
                }
                echo '
                <td class="list_td aligncenter">
                    <a href="edit/'.$id.'"><img src="../../public/qt64_admin/templates/images/edit.png" /></a>&nbsp;&nbsp;&nbsp;
                    <a href="delete/'.$id.'" onclick="return xacnhanxoa(\'Bạn có chắc xoá danh mục này\')"><img src="../../public/qt64_admin/templates/images/delete.png" /></a>
                </td>
            </tr>';
            listCate ($data,$id,$str."---|");
        }
    }
}