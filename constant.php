<?php

// $upOne = dirname(__DIR__, 1);
// $realpath = $upOne.'\config\\';

function read_last(){
	$upOne = dirname(__DIR__, 1);
	$realpath = $upOne.'\config\\';
	$file = file($realpath."page-blocks.php");
	for ($i = max(0, count($file)-1); $i < count($file); $i++) {
		$x = $file[$i];
	}	
	return $x;
}

$x = read_last();
if($x == 'return $blocks;'){
	echo "sarua";
	// do something nulis ke file php
}else{
	echo "teu";
	// not do something
}
?>
