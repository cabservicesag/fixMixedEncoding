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

// get file, fix characters and writ it back
$fixThisString = file_get_contents($argv[1]);
$fixedString = fixMixedCharacters($fixThisString);
file_put_contents($argv[2], $fixedString);
