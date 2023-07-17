<?php
class Controller{

    public function title(){

        echo 'this is base controller';
    }

    public function model($modelName=''){
        $model='';
            if(file_exists(_DIR_ROOT.'/app/model/'.$modelName.'.php')){
                require_once _DIR_ROOT.'/app/model/'.$modelName.'.php';
                if(class_exists($modelName)){
                    $model= new $modelName();
                }
                    return $model;
            }else{
                return false;
            }
    }

    public function view($view='',$data=[]){
        $view=$view;
        extract($data);
        if(file_exists(_DIR_ROOT.'/admin/view/'.$view.'.php')){
            require_once _DIR_ROOT.'/admin/view/'.$view.'.php';
        }
    }
}