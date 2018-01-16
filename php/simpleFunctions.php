<?php
/**
 * Use to check if a string exists in an array, if it does it returns true, if
 * if doesn't it returns false and adds the string to the array.
 *
 * I use this in a mail loop to make sure a specific email address does not get
 * emailed twice.
 * 
 * @param  string $string The string you are testing.
 * @param  array  &$array Referenced array to add string to or check if exists.
 * @return boolean        True if exists in array, false if it doesn't.
 */
function checkStringDuplicate( $string, &$array){
    
    if(!is_array($array)){
        trigger_error("Array needed for argument 2", E_USER_ERROR);
    }

    if(in_array(trim($string), $array) === true){
        return true;
    } else {
        $array[] = $string;
        return false;
    }
}

/**
 * Get the visitors ip address
 * 
 * @return string The from ip address of the visitor.
 */
function getUserIP(){
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}

/**
 * Find Percentage Shift Between Two Numbers
 * 
 * @param int $val1 First number
 * @param int $val2 Second number
 */
function PercentChange($val1,$val2)
{
    if($val1 == 0 && $val2 == 0){
        return 0;
    }
    $diff = $val2 - $val1;
    $average = ($val2 + $val1)/2;
    return ($diff / $average) * 100;
    
}
?>