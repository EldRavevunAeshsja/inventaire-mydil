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

  <div id="section">
    <div class="boite">1</div>
    <div class="boite">2</div>
    <div class="boite">3</div>
    <div class="boite">4</div>
    <div class="boite">5</div>
    <div class="boite">6</div>
    <div class="boite">7</div>
    <div class="boite">8</div>
    <div class="boite">9</div>
    <div class="boite">11</div>
    <div class="boite">12</div>
    <div class="boite">13</div>
    <div class="boite">14</div>
    <div class="boite">15</div>
    <div class="boite">16</div>
    <div class="boite">17</div>
    <div class="boite">18</div>
    <div class="boite">19</div>
    <div class="boite">20</div>
    <div class="boite">21</div>
    <div class="boite">22</div>
    <div class="boite">23</div>
    <div class="boite">24</div>
    <div class="boite">25</div>
    <div class="boite">26</div>
  </div id="section">




</body>

</html>
