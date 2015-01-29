<?php

// show usage
if(!is_file($argv[1]) || empty($argv[0])) {
	echo "\nUsage: > php fix_mixed_encoding.php inputfile.sql outputfile.sql\n";
	exit;
}

// replace damaged utf8 characters with fixed ones
function fixMixedCharacters($string) {
	$searchReplace = array(
	'Ã¼'=>'ü',
	'Ã¤'=>'ä',
	'Ã¶'=>'ö',
	'Ã–'=>'Ö',
	'ÃŸ'=>'ß',
	'Ã '=>'à',
	'Ã¡'=>'á',
	'Ã¢'=>'â',
	'Ã£'=>'ã',
	'Ã¹'=>'ù',
	'Ãº'=>'ú',
	'Ã»'=>'û',
	'Ã™'=>'Ù',
	'Ãš'=>'Ú',
	'Ã›'=>'Û',
	'Ãœ'=>'Ü',
	'Ã²'=>'ò',
	'Ã³'=>'ó',
	'Ã´'=>'ô',
	'Ã¨'=>'è',
	'Ã©'=>'é',
	'Ãª'=>'ê',
	'Ã«'=>'ë',
	'Ã€'=>'À',
	'Ã'=>'Á',
	'Ã‚'=>'Â',
	'Ãƒ'=>'Ã',
	'Ã„'=>'Ä',
	'Ã…'=>'Å',
	'Ã‡'=>'Ç',
	'Ãˆ'=>'È',
	'Ã‰'=>'É',
	'ÃŠ'=>'',
	'Ã‹'=>'Ë',
	'ÃŒ'=>'Ì',
	'Ã'=>'Í',
	'ÃŽ'=>'Î',
	'Ã'=>'Ï',
	'Ã‘'=>'Ñ',
	'Ã’'=>'Ò',
	'Ã“'=>'Ó',
	'Ã”'=>'Ô',
	'Ã•'=>'Õ',
	'Ã˜'=>'Ø',
	'Ã¥'=>'å',
	'Ã¦'=>'æ',
	'Ã§'=>'ç',
	'Ã¬'=>'ì',
	'Ã­'=>'í',
	'Ã®'=>'î',
	'Ã¯'=>'ï',
	'Ã°'=>'ð',
	'Ã±'=>'ñ',
	'Ãµ'=>'õ',
	'Ã¸'=>'ø',
	'Ã½'=>'ý',
	'Ã¿'=>'ÿ',
	'â‚¬'=>'€'
	);
	return str_replace(array_keys($searchReplace), $searchReplace, $string);
}

// open input file
$fp = fopen($argv[1], 'r');
// open/create output file
$fp2 = fopen($argv[2], 'w+');
// read the whole file by 4098 byte pieces and fix the encoding
while(!feof($fp)) {
	$fixThisString = fread($fp, 4098);
	$fixThisString = fixMixedCharacters($fixThisString);
	fwrite($fp2, $fixThisString);
}
fclose($fp);
fclose($fp2);
