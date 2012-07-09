<?PHP
foreach ($items->result_array() as $key=>$value) {
	//if (strpos(strtolower($key), $q) !== false) {
		echo $value['nombre']."|".$value['ID']."\n";
	//}
}?>