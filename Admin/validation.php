<?php 
    // clean
    function clean ($value){
        
        $value = trim($value);
        $value = htmlspecialchars($value);
        $value = stripslashes($value);
        return $value;
        
        
        
    }
    

//validation   
$error =array();

 
     
//string validation >>> value >> string , > 3 

function strvalid($str)
{
    if(!preg_match("/^[a-zA-Z-`]*$/",$str)){
        return false;}
    else {
        return $str;
    }
    
    if($str < 3 )
    {
        return false; 
    }
    else {
        return $str;
    }
    
}

function phonevalid($phone){
    if(!preg_match("/^[0-9`]/",$phone)){
        
        return false; 
    }
    
    else 
    {
        return $phone;
    }
}

//email validation >> value >> email  
function emailvalid($email)
{
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        
        return false; 
    }
    
    else 
    {
        return $email;
    }
}

//password validation >> value > 6 

function passvalid($password)
{
    if(strlen($password) < 6)
    {
        return false;
    }
    
    else {
        return $password;
    }
}

//age validation >> value >>> 0 && < 100 , intger  

function egevalid($age)
{
    
    if(($age > '0') && ($age < '100') )
    {
        return $age;
    }
    else {
        return false ;
    }
}



function rolevalid($role)
{
    if (!($role == 'admin' || $role == 'superadmin'))
            {
                return false ;       
            }
    
    else {
        return $role ;
    }
}


// gender validation  
function genvalid($gender){
    if( ($gender == 'male') || ($gender == 'female'))
    {
        return $gender;
    }
    else {
        return false;
    }
}
?> 