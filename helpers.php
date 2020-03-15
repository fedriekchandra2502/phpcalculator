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
    $description = '';
    $output = '';

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
        $description = $text;
        $text .= '= '.$result;

    } else {
        $result = $numbers[0];
        $text .= $result;
    }

    $file = fopen("db.csv","a");
    $insertCsv = [ ucfirst($command), $description, $result, $text, date("Y-m-d H:i:s") ];
    fputcsv($file, $insertCsv);
    fclose($file);

    //insert to DB code

    return $text;
}

function printHistoryList($datas, $output) {

    $header = [
        '+----+-----------+--------------------------+---------+--------------------------------+----------------------+',
  '<info>| No | Command   | Description              | Result  | Output                         | Time                 |</>',
        '+----+-----------+--------------------------+---------+--------------------------------+----------------------+'
    ];
    $cover = '+----+-----------+--------------------------+---------+--------------------------------+----------------------+';

    $output->writeln($header);

    //print history list
    foreach ($datas as $key => $value) {

        if(empty($value)) break;

        //No section
        echo '| ';
        $space = 3-strlen($key);
        echo $key+1;
        for($i=0; $i < $space; $i++){
            echo ' ';
        }

        //Command section
        echo '| ';
        $space = 10-strlen($value[0]);
        echo $value[0];
        for($i=0; $i < $space; $i++){
            echo ' ';
        }

        //Description section
        echo '| ';
        $space = 25-strlen($value[1]);
        echo $value[1];
        for($i=0; $i < $space; $i++){
            echo ' ';
        }

        //Result section
        echo '| ';
        $space = 8-strlen($value[2]);
        echo $value[2];
        for($i=0; $i < $space; $i++){
            echo ' ';
        }

        //Output section
        echo '| ';
        $space = 31-strlen($value[3]);
        echo $value[3];
        for($i=0; $i < $space; $i++){
            echo ' ';
        }

        //Time section
        echo '| ';
        $space = 21-strlen($value[4]);
        echo $value[4];
        for($i=0; $i < $space; $i++){
            echo ' ';
        }
        echo '|'.PHP_EOL;
    }

    $output->writeln($cover);
}
