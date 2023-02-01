<?php

$arr = [12, 55, 5, 66, 58, 78, 10, 15];

foreach($arr as $prom) {
    if (gettype($prom) == 'array'){
        foreach($prom as $prom1){

            echo $prom1 . " ";
        }
    }
else {
    echo $prom . " ";
}
}