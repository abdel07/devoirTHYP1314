<?php
require_once 'connexion.php';

if (isset ($_GET['nom'])) {	
	extract($_GET);
	getDonnee($nom, html_entity_decode($cours));
}

function getDonnee($etu, $cours) {
	$sql = "SELECT n.etu, n.note, n.maj, n.exercice, n.cours
		FROM notes n 
		WHERE n.etu = '".$etu."' AND n.cours = '".$cours."'
		ORDER BY n.exercice";
	
	//echo $sql;
	$rs = mysql_query($sql) or die('Requête invalide : ' . mysql_error());
	$arrG = array();
	While ($arr = mysql_fetch_array($rs)){
		$arrG[] = $arr;
	}
	echo json_encode($arrG);
	
}


?>
