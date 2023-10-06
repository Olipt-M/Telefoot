<?php
  // Check if user is connected and avoid session hijacking
  // if (!isset($_SESSION["user"]) || ($_SESSION["user"]["ip"] != $_SERVER["REMOTE_ADDR"])) {
  //     header('Location: home');
  // }
  // echo ($_SESSION["user"]["ip"] != $_SERVER["REMOTE_ADDR"]);
  echo $_SESSION["user"]["ip"];
  // echo $_SERVER["REMOTE_ADDR"];


  // PROBLEME $_SESSION["user"]["ip"] EST VIDE, A CAUSE DE LA NAVIGATION PRIVEE ? IMPACT TEST SESSION HIJACKING

  include("header.php");
?>

<main>
  <section>
    <h1>Voici vos chaînes, <?= $_SESSION["user"]["firstname"] ?></h1>
  </section>
</main>

<?php
  include("footer.php");
?>