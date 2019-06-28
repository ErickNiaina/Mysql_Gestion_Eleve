 <!DOCTYPE>
<?php 

    require('pdo.php');

 ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />
<link rel="stylesheet" type="text/css" href="tous.css">
<title>LISTES DES ETUDIANTS ESFN</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

<div class="container-fluid">
  <h2 style="text-align: center;color: red">LISTES DES ETUDIANTS</h2>
  <b><a href="index.php">Retour à la liste</a></b>
  <h4>
  	<ul>
  		<li><a href="filtre.php?filier=Informatique">INFORMATIQUE</a></li>
        <li><a href="filtre.php?filier=Pedagogique">PEDAGOGIQUE</a></li>
        <li><a href="filtre.php?filier=Français">FRANÇAIS</a></li>
        <li><a href="filtre.php?filier=Anglais">ANGLAIS</a></li>
  	</ul>
  </h4>
  <h5>Voici la liste des etudiants universitaire 2019-2020 <a href="inscription.php" class="btn btn-warning">Ajouter</a></h5>            
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Date d'inscription</th>
        <th>Filiere</th>
        <th>Option</th>
        <th>Age</th>
        <th>Adresse</th>
        <th>Niveau</th>
      </tr>
    </thead>
    <tbody>
        <?php
     
    $stmt = connexion()->prepare("SELECT e.nom,e.prenom,e.datenee,e.age,e.adresse,e.optione,e.id_niveau,n.niveaux,f.matiere FROM etudiant AS e JOIN niveau AS n  ON e.id_niveau = n.id 
    	LEFT JOIN filiere AS f ON f.id = e.id_matiere WHERE f.matiere = '{$_GET['filier']}' ORDER BY e.nom ASC,e.prenom ASC ");
    $stmt->execute();
    
    if($stmt->rowCount() > 0)
    {
        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);
            ?>
      <tr>
        <td><?php echo $nom; ?></td>
        <td><?php echo $prenom; ?></td>
        <td><?php echo $datenee; ?></td>
        <td><?php echo $matiere; ?></td>
        <td><?php  echo $optione; ?></td>
        <td><?php  echo $age; ?></td>
        <td><?php  echo $adresse; ?></td>
        <td><?php  echo $niveaux; ?></td>
      </tr>
     <?php
        }
    }
    else
    {
        ?>
        <div class="col-xs-12">
            <div class="alert alert-warning">
                <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Pas des Etudiants Enregistrer...
            </div>
        </div>
        <?php
    }
    
?>
    </tbody>
  </table>
</div>

</body>
</html>
