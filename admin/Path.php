<?php

class Path{
    private $__controller,$__action;

    public function __construct()
    {
        $this->__controller = 'home';
        $this->__action ='index';
        $this->handleUrl($this->getUrl());
    }

    function getUrl(){
        $url='/';
        if(!empty($_SERVER['PATH_INFO'])){
            $url=$_SERVER['PATH_INFO'];
        }
        return $url;
    }
    function handleUrl($url){
        if(!empty($url)){
            $urlArr=explode('/',$url);
            $urlArr=array_filter($urlArr);
            $urlArr=array_values($urlArr);
            if(!empty($urlArr[1])){
                $this->__controller=ucfirst($urlArr[1]);
                if(file_exists('admin/controller/'.$this->__controller.'.php')){
                    require_once 'admin/controller/'.$this->__controller.'.php';
                    if(class_exists($this->__controller)){
                        $this->__controller=new $this->__controller();
                    }else{
                        echo 'khong ton tai class'. $this->__controller;
                    }
                }else{
                    echo 'khong co file admin/controller/'.$this->__controller.'.php';
                }
                
                if(!empty($urlArr[2])){
                    $this->__action=$urlArr[2];
                }

                if(method_exists($this->__controller,$this->__action)){
                    call_user_func_array([$this->__controller,$this->__action],[]);
                }
            }

        }
    }
}