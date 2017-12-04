<?php
session_start();

// Déclaration de la base de données :
$bdd = new PDO('mysql:host=localhost;dbname=mydil_inventory', 'root', '', array (PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));

if (isset($_SESSION['id'])) {
  $id = $_SESSION['id'];

  // On effectue la requête :
  $requser = $bdd -> prepare('SELECT * FROM utilisateurs WHERE id = ?');
  $requser -> execute(array($id));
  $userinfo = $requser -> fetch();

  $id = $userinfo['id'];
  $surname = $userinfo['surname'];
  $lastname = $userinfo['lastname'];
  $email = $userinfo['email'];
  $class = $userinfo['class'];
  $isadmin = $userinfo['isadmin'];

}
?>



<!DOCTYPE html>
<html lang="fr">

<!-- Metadonnées -->
<head>
  <meta charset="utf-8">
  <title>MyDIL Inventory</title>
  <link rel="stylesheet" href="style/index.css">
  <link rel="stylesheet" href="style/fonts.css">
</head>


<!-- Corps de la page -->
<body>


  <?php
  include('includes/header.php');
  ?>


  <?php
  $req = $bdd -> prepare("SELECT * FROM stock WHERE estdispo = ?");
  $req -> execute(array(1));
  $nombre = $req -> rowCount();

  echo $nombre;
  ?>


  <?php


  for($i = 1; $i <= $nombre; $i++) {
    $reqObj = $bdd -> prepare("SELECT * FROM stock WHERE id = ?");
    $reqObj -> execute(array($i));
    $objInfos = $reqObj -> fetch();
    ?>
    <div><?php echo $objInfos['nom']; echo " ";echo $objInfos['etat'];?></div></br>
    <?php
  }
   ?>



</body>

</html>
