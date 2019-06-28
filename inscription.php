
<!DOCTYPE html>
<?php 
	
	require('pdo.php');

 ?>
<html>
<head>
<meta charset="utf-8">
<title>TRIAGE DES ETUDIANTS</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="tous.css">
</head>
<body>
<div class="container-fluid">


	<div class="page-header">
    	<h1 class="h2" style="text-align: center">INSCRIPTION DES ETUDIANTS</h1>
    	<a class="btn btn-default" href="index.php"> <span class="glyphicon glyphicon-eye-open"></span> &nbsp; VOIR LISTES</a>
    </div>
            <div class="alert alert-danger">
            	<span class="glyphicon glyphicon-info-sign"></span> 
            </div>

        <div class="alert alert-success">
              <strong><span class="glyphicon glyphicon-info-sign"></span> 
        </div>
    

<form method="post" enctype="multipart/form-data" class="form-horizontal" action="controlleur.php" style="margin-left: 400px">
	    
	<table class="table table-bordered table-responsive" id="ins">
	
    <tr>
    	<td><label class="control-label">NOM</label></td>
        <td><input class="form-control" type="text" name="nom" placeholder="Entrer votre nom"  /></td>
    </tr>
    
    <tr>
    	<td><label class="control-label">PRENOM</label></td>
        <td><input class="form-control" type="text" name="prenom" placeholder="Entrer votre prenom"  /></td>
    </tr>
    
    <tr>
    	<td><label class="control-label">DATE DE NAISSANCE</label></td>
        <td><input class="input-group" type="date" name="datenee" /></td>
    </tr>
    <tr>
    	<td><label class="control-label">AGE</label></td>
        <td><input class="form-control" type="text" name="age" placeholder="Entrer votre age"  /></td>
    </tr>
     <tr>
    	<td><label class="control-label">ADRESSE</label></td>
        <td><input class="form-control" type="text" name="adresse" placeholder="Entrer votre adresse"  /></td>
    </tr>
    <tr>
    	<td><label class="control-label">OPTION</label></td>
    	<td>
    		<select name="option">
    			<option value="Default" selected>Default</option>
    			<option value="Developpeur" >Developpeur</option>
    			<option value="Reseau">Reseau</option>
    			<option value="Comptable">Comptable</option>
    		</select>
    	</td>
    </tr>
    <tr>
    	<td><label class="control-label">NIVEAU</label></td>
    	<td>
    		<?php
			    
			    $stmt = connexion()->prepare('SELECT * FROM niveau ORDER BY id ASC');
			    $stmt->execute();
			    
			    if($stmt->rowCount() > 0)
			    {
			        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			        {
			            extract($row);
			            
			        ?>
			     <input type="radio" name="niveau" value='<?php echo $row['id']?>'><?php echo $niveaux;?><br>
			<?php }} ?>
    	</td>	 
    </tr>
    <tr>
    	<td><label class="control-label">FILIERE</label></td>
    	<td>
    		<?php
			    
			    $stmt = connexion()->prepare('SELECT * FROM filiere ORDER BY id ASC');
			    $stmt->execute();
			    
			    if($stmt->rowCount() > 0)
			    {
			        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			        {
			            extract($row);
			            
			        ?>
			     <input type="radio" name="matiere" value='<?php echo $row['id'];?>'><?php echo $matiere;?><br>
			<?php }} ?>
    	</td>	 
    </tr>
    <tr>
        <td colspan="2"><button type="submit" name="btnsave" class="btn btn-default">ENREGISTRER
        <span class="glyphicon glyphicon-save"></span> &nbsp; 
        </button>
        </td>
    </tr>
    
    </table>
    
</form>



<div class="alert alert-info">
    <strong><a href="index.php">Annuler </a></strong>/ <a href="">Merci à vous</a>!
</div>

    

</div>

<!-- Latest compiled and minified JavaScript -->
<script src="bootstrap/js/bootstrap.min.js"></script>



</body>
</html>