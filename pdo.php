<?php 
	function connexion(){
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=felana;charset=utf8', 'root', '');
			return $bdd;
		}
		catch(Exception $e)
		{
		        die('Erreur : '.$e->getMessage());
		}
	} ?>
	
