<?php

class Category extends Controller{
    public $response,$categoryModel,$dataCategory;

    function __construct()
    {
        $this->response=new Response();
        $this->categoryModel= $this->model('CategoryModel');
    }

    function index(){
        $this->dataCategory['categoryList']=[];
        $this->dataCategory['catalogList']=$this->categoryModel->getAll('nhom_danhmuc');
        foreach($this->dataCategory['catalogList'] as $key=>$value){
            $categoryItems=$this->categoryModel->getWhere('danhmuc','ndm_id','=',$value[0]);
            $this->dataCategory['categoryList']['items_'.$key]=$categoryItems;
        }
        $this->view('category/main',$this->dataCategory);
    }

    function addCategory(){
        if(isset($_POST['confirmAddCatalog'])){
            if(!empty($_POST['nameCatalog'])){
                $name=$_POST['nameCatalog'];
                $add= $this->categoryModel->add($name);
               $this->success($add);
            }
            
        }else if(isset($_POST['confirmChangeCatalog'])){
            if(!empty( $_POST['nameCatalog'])){
                $name=$_POST['nameCatalog'];
                $id=$_POST['confirmChangeCatalog'];
                $change= $this->categoryModel->change($name,$id);
                $this->success($change);
            }
        }else if(isset($_POST['confirmCategoryAdd'])){
            if($_POST['categoryAdd']){
                $value=$_POST['categoryAdd'];
                $parent=$_POST['idCatalog'];
                $add= $this->categoryModel->add($value,$parent);
                $this->success($add);
            }
        }else if(isset($_POST['confirmChangecategory'])){
            $value=$_POST['nameCategory'];
            $id=$_POST['confirmChangecategory'];
            $change= $this->categoryModel->change($value,$id,true);
            $this->success($change);
        }
    }

    function deleteCategory(){
        if(isset($_GET['idDelete'])){
            $id=$_GET['idDelete'];
            $delete= $this->categoryModel->delete($id);
            $this->success($delete);
            $this->success(!$delete);
        }else if(isset($_GET['idDeleteCategory'])){
            $id=$_GET['idDeleteCategory'];
            $delete= $this->categoryModel->delete($id,true);
            $this->success($delete);
            $this->success(!$delete);
        }
    }

    function success($value){
        if($value){
            $this->response->redirect('adm/category/');
        }
    }
}