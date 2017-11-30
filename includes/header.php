<link rel="stylesheet" href="style/header.css">
<link rel="stylesheet" href="style/fonts.css">



<div id="header">

  <img id="header_logo" src="images/epsi-logo.png" alt="logo"/>

  <h1 id="header_titre">Inventaire MyDIL<br/>EPSI Lyon</h1>

  <div id="header_compte" >
    <?php
    if (isset($_SESSION['id'])) {
      $firstname = $_SESSION['firstname'];
      $lastname = $_SESSION['lastname'];
      echo "<a class='header_bouton' id='header_bouton_gauche' href='moncompte.php'>$firstname $lastname</a></br>";
      echo "<a class='header_bouton' id='header_bouton_droite' href='deconnexion.php'>Se déconnecter</a>";
    } else {
      echo "<a class='header_bouton' id='header_bouton_gauche' href='inscription.php'>S'inscrire</a></br>";
      echo "<a class='header_bouton' id='header_bouton_droite' href='connexion.php'>Se connecter</a>";
    }
    ?>
  </div>

</div>



<div id="naviguation">

  <div id="naviguation_menu">
    <a class="naviguation_nav" href='index.php'>Accueil</a>
    <?php
    if (isset($_SESSION['id']) && $_SESSION['isadmin'] == 1) {
      echo " - ";
      echo "<a class='naviguation_nav' href='ajoutmateriel.php'>Ajouter un objet</a>";
    }
    ?>
  </div>


  <div id="naviguation_recherche">
    <form method="post" action="">
      <input id="naviguation_rechercher" type="text" placeholder="Rechercher un objet"/>
      <input type="button" value=""/>
    </form>
  </div>

</div>
