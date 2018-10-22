<?php

class File  {

    private $url;

    public function __construct($url)
    {
        echo "Object created";
        $this->url = __DIR__."/../.data/".$url;   
    }

    public function read()
    {
        $fileContent = file_get_contents($this->url);
        $fileContent = json_decode($fileContent);
        return $fileContent;
    }

    public function write($obj)
    {
        $fileContent = $this->read();
        //  $fileContent[] = $obj;
        array_push($fileContent,$obj);
        $fileContent = json_encode($fileContent, JSON_PRETTY_PRINT);
        file_put_contents($this->url, $fileContent);
    }

    public function delete_obj_in_file($id)
    {
       
        $fileContent = $this->read();
        $delKey = "";
       
        foreach($fileContent as $key=>$val)
        {
            if($id == $val->id)
            {
                $delKey = $key;
                break;
            }
        }
     
        if($delKey != "")
        {
            array_splice($fileContent, $delKey, 1);
            $fileContent = json_encode($fileContent, JSON_PRETTY_PRINT);
            file_put_contents($this->url, $fileContent);
            echo "object deleted";
        }
    }






}