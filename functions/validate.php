<?php

    function checkEmpty($value)
    {
        if(!empty($value)){
            return true;
        }
        return false;
    }
    function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

    function checkLength($value,$min){
        if (trim(strlen($value)) >= $min) {
            return true;
        }
        return false;
    }
    function sanitizeEmail($email)
    {
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        return $email;
    }
// sanitizing for string
function sanitizeString($string)
{
    $string = trim($string);
    $string = filter_var($string,FILTER_SANITIZE_STRING);
    return $string;
}