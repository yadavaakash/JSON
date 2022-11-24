<?php

$programming = '{"One":"C","Two":"C++","Three":"Java","Four":"PHP"}';

$object = json_decode($programming,true);

print_r($object);

echo "<hr>";
echo $object['One'];
echo $object['Two'];
echo $object['Three'];
echo $object['Four'];

?>