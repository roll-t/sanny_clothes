<?php

class CategoryModel extends Model{

    function add($value,$parent=''){
        if(!empty($value)){
            if(empty($parent)){
                $sql="INSERT INTO `nhom_danhmuc` (`NDM_ID`, `NDM_TEN`) VALUES (NULL, '".$value."')";
            }else{
                $sql="INSERT INTO `danhmuc` (`dm_id`, `dm_ten`, `ndm_id`) VALUES (NULL, '".$value."', ".$parent.")";
            }
            $result= $this->db->query($sql);
            if($result){
                return $result;
            }else{
                return false;
            }
        }
    }

    function delete($id,$child=false){
        if(!empty($id)){
            if(!$child){
                $sql="DELETE FROM NHOM_DANHMUC WHERE `NHOM_DANHMUC`.`NDM_id` ='".$id."'";
                $sql_2="SELECT * FROM DANHMUC WHERE ndm_id = $id";
            }else{
                $sql="DELETE FROM danhmuc WHERE `danhmuc`.`dm_id` ='".$id."'";
                $sql_2="SELECT * FROM sanpham WHERE dm_id = $id";
            }
            $arr = $this->db->query($sql_2)->fetch_all();
            if(count($arr)==0){
                $result= $this->db->query($sql);
                if($result){
                    return $result;
                }else{
                    return false;
                }
            }else {
                return false;
            }
        }
    }

    function change($value,$id,$child=false){
        if(!empty($value)){
            if(!$child){
                $sql = "UPDATE `NHOM_DANHMUC` SET `NDM_TEN` ='".$value."'  WHERE `nhom_danhmuc`.`NDM_ID` = '".$id."'";
            }else{
                $sql= "UPDATE `danhmuc` SET `dm_ten` ='".$value."'  WHERE `danhmuc`.`dm_id` = '".$id."'";
            }
            $result = $this->db->query($sql);
            if($result){
                return $result;
            }else{
                return false;
            }
        }
    }
}