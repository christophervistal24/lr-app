<?php
class File
{
     private $supported_formats = [
        'image/png',
        'image/jpg',
        'image/jpeg',
        'image/gif',
    ];
    private $path = 'public/assets/uploads/';

    // For File Upload
    public function validate($file = [])
    {
        $dir  = str_replace('\app',"/",realpath(dirname(__DIR__)));
        if(is_array($file)){
            extract($file);
            if(in_array($type,$this->supported_formats)){
                move_uploaded_file($tmp_name,$dir.$this->path.$name);
                return true;
            }else{
               die('File format is not supported');
            }
        }
        return false;
    }
}