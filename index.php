<?php
include_once './toolBox.php';

$test = array(
    "myKey" =>'My first string',
    1=> array(
        'test'=> "A string test",
        1 => array(
            "anotherKey"=> 'Another string',
            1 => array(
                0=> 'Hm , this is a string too',
                1 => 'Again again again'
            )
        )
    ));


$test2 = array('salut');
nicePrint($test);

echo"<pre>";
var_dump($test);
echo"</pre>";

nicePrint('Salut tu va bien ?');






//nicePrint(json_encode("Salut toi "));