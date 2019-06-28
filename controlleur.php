<?php 

	require('pdo.php');

if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['datenee']) && isset($_POST['age']) && isset($_POST['adresse']) && isset($_POST['option']) && isset($_POST['niveau']) && isset($_POST['matiere'])){
	$tab = array(
	':nom' => $_POST['nom'],
	':prenom' => $_POST['prenom'],
	':datenee' => $_POST['datenee'],
	':age' => $_POST['age'],
	':adresse' => $_POST['adresse'],
	':optione'=> $_POST['option'],
	':id_niveau'=>$_POST['niveau'],
	':id_matiere'=>$_POST['matiere']
	);

$sql = "INSERT INTO etudiant (nom, prenom, datenee, age, adresse,optione,id_niveau,id_matiere) 
		VALUES (:nom, :prenom, :datenee, :age, :adresse, :optione, :id_niveau, :id_matiere)" ;
 
$req = connexion()->prepare($sql);
$req->execute($tab);

header('location:index.php');
 
 
$a = connexion();
 
if($a){
    $a = NULL;
	}
}
 
?>