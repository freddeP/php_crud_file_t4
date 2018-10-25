<?php

class File  {

    private $url;

    public function __construct($url)
    {

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

    private function get_key_from_id($id)
    {
        $fileContent = $this->read();
        foreach($fileContent as $key=>$val)
        {
            if($id == $val->id)
            {
                return $key;  
            }
        }
        return false;
    }

    public function update_obj_in_file($id,$user)
    {
        $fileContent = $this->read();
        $updateKey = $this->get_key_from_id($id);

        if($updateKey !== false)
        {
            $user_info = json_decode($user);
            // validate email first
            if(filter_var($user_info -> email,FILTER_VALIDATE_EMAIL))
            {
                // updatera objekten i arrayen från filen
                $fileContent[$updateKey]->email = $user_info -> email;
                $fileContent[$updateKey]->password = $user_info -> password;
            
                $fileContent = json_encode($fileContent, JSON_PRETTY_PRINT);
                file_put_contents($this->url, $fileContent);
            }
        }



    }


    public function delete_obj_in_file($id)
    {
        $fileContent = $this->read();
        $delKey = $this->get_key_from_id($id);
       
        if($delKey !== false)
        {
          
            array_splice($fileContent, $delKey, 1);

            $fileContent = json_encode($fileContent, JSON_PRETTY_PRINT);
            file_put_contents($this->url, $fileContent);
            return true;
        }
        else{
            return false;
        }
    }

}