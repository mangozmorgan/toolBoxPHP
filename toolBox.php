<?php


function iterateArrayRecursive($data,$color = false,$spacing = 2,$second = false){
    $colorArray = ['black'];
    $stringColor = 'grey';

    if ( $color === true ){
        $stringColor = '#d703d7';
        $colorArray = ['#2ecc71','#f1c40f','#e67e22','#3c40c6'];
    }

    foreach( $data as $key => $value ){

        if($second === true ){
            $spacing++;
            $second = false;
        }

        $colorText =$colorArray[array_rand($colorArray)] ;

        if ( is_array($value) || is_object($value) ){

            $type = "Array";
            $class = '';

            if ( is_object($value) ){
                $class = get_class($value);
                $value = (array)$value;
                $type = "Object";

            }
            if ( !is_numeric($key) ){
                $key = '"'.$key.'"';
            }

            echo '<span style="margin-left: '.$spacing.'rem;line-height:2rem;"><span style="color: '.$colorText.';font-weight: bold;">['.$key.']  <span style="color: '.$colorText.';font-style: italic ;font-weight: bold;">'.$type.' '.$class.'</span></span> (<span style="color: '.$colorText.';">'.count($value).'</span>) ➡ </span><br>';

//            if($key == 0 ){
//
//                $spacing ++;
//            }
            echo "<span style='margin-left: ".$spacing."rem;color: ".$colorText.";font-weight: bold;'>{</span><br>";
//            $spacing ++;
            iterateArrayRecursive($value,$color,$spacing,true);

//            $spacing --;
            echo "<span style='margin-left: ".$spacing."rem;color: ".$colorText.";font-weight: bold;'>}</span><br>";
        }else{
            if ( !is_numeric($key) ){
                $key = '"'.$key.'"';
            }


            $count = strlen($value);
            echo "<span style='margin-left: ".$spacing."rem;'>"."[$key] ➡ "."\"".$value."\"".' <small style="color: '.$stringColor.';font-style: italic">String ('.$count.')</small></span><br>';
//


        }
    }
}

function nicePrint($data,$color = false){

    $backtrace = debug_backtrace();
    $line = $backtrace[0]['line'];
    $file = $backtrace[0]['file'];

    $baseColor = 'black';
    $stringColor = "grey";

    $baseColor = $color ? 'dodgerblue' : $baseColor;
    $stringColor = $color ? '#d703d7' : $stringColor;

    echo "<span style='line-height:2rem;font-family: Arial;'><small style='text-transform: uppercase;font-weight: bold'>NicePrint()</small> <small style='color: #f30202;'>$file : <small style='color: ".$baseColor.";'>L.$line</small> </small></span><br>";

    if( is_array($data) ){
        $count = count($data);
        echo '<span style="line-height:1.5rem;font-family: Arial;"><span ><span style="color: '.$baseColor.';font-style: italic ;font-weight: bold;"> Array('.$count.') ➡</span><br><span style="font-weight: bold;color: '.$baseColor.'">{</span><br>';
        iterateArrayRecursive($data,$color);
        echo "<span style='font-weight: bold;color:".$baseColor." '>}</span><br>";

    }elseif( is_string($data) ){
        $countString = strlen($data);
        echo "<span style='font-family: Arial;font-weight: bold;'><span style='color: ".$stringColor.";font-style: italic;font-weight: bold;'>String </span>".$data."($countString)</span>";
    }elseif( is_object($data) ){

        $class = get_class($data);
        $data = (array)$data;
        $countObject = count($data);
        echo "<span style='font-family: Arial;line-height:1.5rem;font-weight: bold;'><span style='color: #ff4c00;font-style: italic;font-weight: bold;'>Object ".$class." </span>($countObject){</span><br>";
        iterateArrayRecursive($data,$color);
        echo "<span>}</span><br>";
    }
}