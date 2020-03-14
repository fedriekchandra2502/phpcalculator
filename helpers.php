<?php

function math($command, $numerator, $denominator = 0){
    $result = 0;

    if($command == 'add') {
        $result = $numerator + $denominator;
    } else if($command == 'subtract') {
        $result = $numerator - $denominator;
    } else if($command == 'multiply') {
        $result = $numerator * ($denominator ? $denominator : 1);
    } else if($command == 'divide') {
        $result = $numerator / ($denominator ? $denominator : 1);
    } else if($command == 'pow') {
        $result = $numerator ** ($denominator ? $denominator : 1);
    }

    return $result;
}

function doMath($command, $numbers){
    $result = 0;
    $method = [
        'add'       => ' + ',
        'subtract'  => ' - ',
        'multiply'  => ' * ',
        'divide'    => ' / ',
        'pow'       => ' ^ '
    ];
    $text = '';
    $args = count($numbers);

    if($args > 1){

        foreach($numbers as $key => $value){

            if($key == 0){
                $result = math($command,$value);
            }else {
                $result = math($command,$result,$value);
            }

            if($key  == $args-1){
              $text .= $value.' ';
            }else {
              $text .= $value.$method[$command];
            }

        }

        $text .= '= '.$result;

    } else {
        $result = $numbers[0];
        $text .= $result;
    }

    return $text;
}
