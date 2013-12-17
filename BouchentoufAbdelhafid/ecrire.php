<?php
$info = '';
 
if (isset ($_POST['valider']))
{
	$note = $_POST['note'];
	$exercice  = $_POST['exo'];
	$etudiant = $_POST['etu'];
 
	// Si l'un des champs est vide, lancer une erreur
	if (empty ($exercice) || empty($note) || empty($etudiant)){		$info = 'Veuillez renseigner tous les champs';}
	else
	{
	// Connexion Ã  la bdd
		mysql_connect("localhost", "root","") or die("Echec de connexion au serveur.");; // Connexion Ã  MySQL
		mysql_select_db("etunote") or die("Echec de sÃ©lection de la base.");; // SÃ©lection de la base etunote
 
		// Insertion dans la bdd
		$query = "insert into note (exo,note,etu) values('$exo','$note','$etu')";
 
		if (mysql_query($query)){
			$info = 'la note a Ã©tÃ© enregistrÃ© avec succÃ¨s';}
		else
			{$info = 'Erreur lors de la crÃ©ation de la note';}
			
		mysql_close();
	}
}
//________________________________________
?>