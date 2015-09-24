<?php
$arr1 = array ();
file_put_contents("array.json",json_encode($arr1));
# array.json => {"a":1,"b":2,"c":3,"d":4,"e":5}
#$arr2 = json_decode(file_get_contents('array.json'), true);
#$arr1 === $arr2 # => true
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
