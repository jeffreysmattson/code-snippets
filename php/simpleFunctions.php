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
?>