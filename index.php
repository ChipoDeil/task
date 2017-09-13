<?php
echo "<meta charset='utf8'>";
$content = file_get_contents("http://testlodtask20172.azurewebsites.net/task");
strip_tags($content);
$content = json_decode($content);
$ageMale = 9999999999;
$nameMale;
$ageFemale = 9999999999;
$nameFemale;
foreach ($content as $key => $value) {
	$id = $value->id;
	$human = file_get_contents("http://testlodtask20172.azurewebsites.net/task/".$id);
	strip_tags($human);
	$human = json_decode($human);
	if($human->sex == "male" && $human->age < $ageMale){
		$ageMale = $human->age;
		$nameMale = $human->name;
	}else if($human->sex == "female" && $human->age < $ageFemale){
		$ageFemale = $human->age;
		$nameFemale = $human->name;
	}
	$i++;
}
echo "Самый молодой парень - ".$nameMale.". Его возраст - ".$ageMale.".";
echo "<br>";
echo "Самая молодая девушка - ".$nameFemale.". Её возраст - ".$ageFemale.".";
?>