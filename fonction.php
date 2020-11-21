<?php
function notemptycol($array){
	$liste_var = array();
	foreach ($array[0] as $key => $value) {
		$liste_var[$key] = 0;
	}

	foreach ($array as $ligne) {
		foreach ($liste_var as $key => $value) {
			if (!empty($ligne[$key])){
				$liste_var[$key] += 1;
			}
		}
	}

	foreach ($liste_var as $key => $value) {
		if ($value == 0){
			unset($liste_var[$key]);
		}
	}

	return array_keys($liste_var);
}
  ?>