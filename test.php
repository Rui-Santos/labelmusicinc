<?php

function FosMerge($arr1, $arr2) {
    $res=array();
    $arr1=array_reverse($arr1);
    $arr2=array_reverse($arr2);
    foreach ($arr1 as $a1) {
        if (count($arr1)==0) {
            break;
        }
        array_push($res, array_pop($arr1));
        if (count($arr2)!=0) {
            array_push($res, array_pop($arr2));
        }
    }
    return array_merge($res, $arr2);
}

$arr1 = array(0, 5, 10, 15, 20, 25);
$arr2 = array(1, 2, 4, 6, 7, 9, 21, 24);
$arr3 = FosMerge($arr1, $arr2);
print_r($arr3);

echo "\n\n\n";

function isint( $mixed )
{
    return ( preg_match( '/^\d*$/'  , $mixed) == 1 );
}

var_dump(isint("23"));
echo (int) "value";



?>