<?php


class uservalidator
{

    private $data;
    private $errors=[];
    private static $fileds=['firstname','lastname','username','email'];

    public function __construct($post_data)
    {
        $this->data=$post_data;
    }

    public function validateform()
    {
        foreach (self::$fileds as $filed)
        {
            if(!array_key_exists($filed, $this->data))
            {
                trigger_error( $filed  .   " is not present in data");
                return;

            }
        }
      $this->validateFirstname();
      $this->validateLastname();
      $this->validateUsername();
      $this->validateEmail();
      
      

      return $this->errors;



    }

    private function validateFirstname()
    {

        $val=trim($this->data['firstname']);
        if(empty($val))
        {
            $this->adderror('firstname','firstname cannot be empty');
        }
        else
         {
            if(!preg_match('/^[a-zA-Z0-9]{3,12}$/',$val))
            {
                $this->adderror('firstname','firstname must be 3-12 chars & alphanumeric');

            }
        }


    }

    private function validateLastname()
    {

        $val=trim($this->data['lastname']);
        if(empty($val))
        {
            $this->adderror('lastname','lastname cannot be empty');
        }
        else
        {
            if(!preg_match('/^[a-zA-Z0-9]{3,12}$/',$val))
            {
                $this->adderror('lastname','lastname must be 3-12 chars & alphanumeric');

            }
        }

    }


    private function validateUsername()
    {

        $val=trim($this->data['username']);
        if(empty($val))
        {
            $this->adderror('username','username cannot be empty');
        }
        else
         {
            if(!preg_match('/^[a-zA-Z0-9]{6,12}$/',$val))
            {
                 $this->adderror('username','username must be 6-12 chars & alphanumeric');

            }
        }

    }
    private function validateEmail()
    { 

        $val=trim($this->data['email']);
        if(empty($val))
        {
            $this->adderror('email','email cannot be empty');
        }
        else
         {
            if(!filter_var($val,FILTER_VALIDATE_EMAIL))
            {
                 $this->adderror('email','email must be valid');

            }
        }

    }

    
    
    private function adderror($key,$val)
    {
        $this->errors[$key]=$val;

    }

}




?>