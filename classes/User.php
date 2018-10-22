<?php

class User{

    public function __construct($email, $password)
    {
        // OBS här kan även våra input först valideras

        $this->id = time();
        if(filter_var($email,FILTER_VALIDATE_EMAIL))
        {
            $this->email = $email;
        }
        $this->password = password_hash($password, PASSWORD_DEFAULT); 

    }

    public static function user_info()
    {
        echo "This class needs email and password";
    }




}