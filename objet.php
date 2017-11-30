<?php

session_start();

  // Déclaration de la base de données :
  $bdd = new PDO('mysql:host=localhost;dbname=mydil_inventory', 'root', '', array (PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));

  $reqobjet = $bdd -> prepare("SELECT * FROM stock WHERE id = ?");
  $reqobjet -> execute(array($_GET['id']));
  $objetinfos = $reqobjet -> fetch();

  $objetid = $objetinfos['id'];
  $objetnom = $objetinfos['nom'];
  $objetdesc = $objetinfos['description'];
  $objetdispo = $objetinfos['estdispo'];
  $objetdateretour = $objetinfos['dateretour'];
  $objetetat = $objetinfos['etat'];
  $objetcategorie = $objetinfos['categorie'];
  $objetsouscategorie = $objetinfos['souscategorie'];
  $objetimage = $objetinfos['photos'];

?>



 <!DOCTYPE html>
 <html lang="fr">

 <!-- Metadonnées -->
 <head>
   <meta charset="utf-8">
   <title>MyDIL Inventory</title>
    <link rel="stylesheet" type="text/css" href="style/objet.css">
 </head>


  <!-- Corps de la page -->
  <body>

    <?php
      include('includes/header.php');
    ?>

    <div id="table">

      <div id="titre">
        <p><b><?php echo $objetnom;?></b></p>
      </div>


      <div id="image">
        <img src="<?php echo $objetimage;?>"></img>
      </div>




      <div id="description">
         <p class="champ">Description :</p>
         <?php echo $objetdesc;?>
      </div>


      <div id="etat">
        <p class="champ">État :</p>
        <?php echo $objetetat;?>
      </div>


      <div id="categorie">
        <p class="champ">Catégorie :</p>
        <?php echo $objetcategorie;?>
      </div>


      <div id="souscategorie">
        <p class="champ">Sous-catégorie :</p>
        <?php echo $objetsouscategorie;?></p>
      </div>




      <div id="disponibilite">
        <p><?php if ($objetdispo == 1) { echo "<a href='emprunter.php'>Disponible (cliquez pour réserver !)</a>";} else { echo "Retour le : $objetdateretour";}?></p>
      </div>

    </div>



</body>

</html>
