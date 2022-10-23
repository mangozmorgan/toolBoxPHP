<?php


function iterateArrayRecursive($data,$spacing = 2){
    $colorArray = ['#2ecc71','#f1c40f','#e67e22','#3c40c6'];
    foreach( $data as $key => $value ){

        $color =$colorArray[array_rand($colorArray)] ;

        if ( is_array($value) ){
            echo '<span style="margin-left: '.$spacing.'rem;line-height:2rem;"><span >['.$key.'] ➡ <span style="color: '.$color.';font-style: italic "> Array</span></span> (<span style="color: '.$color.';">'.count($value).'</span>) ➡ </span><br>';
            $spacing ++;
            echo "<span style='margin-left: ".$spacing."rem;color: ".$color."'>{</span><br>";
            $spacing ++;
            iterateArrayRecursive($value,$spacing);

            $spacing --;
            echo "<span style='margin-left: ".$spacing."rem;color: ".$color."'>}</span><br>";
        }else{
            $count = strlen($value);
            echo "<span style='margin-left: ".$spacing."rem;'>"."[$key] ➡ ".$value.' <small style="color: #d703d7;font-style: italic">String ('.$count.')</small></span><br>';
        }
    }
}

function nicePrint($data){

    $backtrace = debug_backtrace();
    $line = $backtrace[0]['line'];
    $file = $backtrace[0]['file'];

    echo "<span style='line-height:2rem;font-family: Arial;'>NicePrint() <small style='color: #f30202;'>$file : <small style='color: dodgerblue;'>L.$line</small> </small></span><br>";

    if( is_array($data) ){
        $count = count($data);
        echo '<span style="line-height:1.5rem;font-family: Arial;"><span ><span style="color: dodgerblue;font-style: italic "> Array('.$count.') ➡</span><br><span>(</span><br>';
        iterateArrayRecursive($data);
        echo "<span>)</span><br>";

    }elseif( is_string($data) ){
        $countString = strlen($data);
        echo "<span style='font-family: Arial;'><span style='color: #d703d7;font-style: italic'>String </span>".$data."($countString)</span>";
    }
}