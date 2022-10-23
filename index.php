<?php
include_once './toolBox.php';
$object2 = new stdClass();
$object2->ingredient = "sucre";
$object2->cook = "30mn";

$fruits = array('banana','strawberry','apple',$object2);

$object = new stdClass();
$object->propriete1 = "test";
$object->propriete2 = $fruits;

$test = array(
    "myKey" =>'My first string',
    1=> array(
        'test'=> "A string test",
        1 => array(
            "anotherKey"=> 'Another string',
            1 => array(
                0=> 'Hm , this is a string too',
                1 => 'Again again again'
            ),
            2 =>$object

        )
    ));

// TODO à venir : array avec plusieur array au meme niveau
$test2 = array('salut');
nicePrint2($test);

echo"<pre>";
var_dump($test);
echo"</pre>";

//nicePrint('Salut tu va bien ?');
//





//nicePrint(json_encode("Salut toi "));