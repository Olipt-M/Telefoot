<?php
  // Check if user is connected and avoid session hijacking
  // if (!isset($_SESSION["user"]) || ($_SESSION["user"]["ip"] != $_SERVER["REMOTE_ADDR"])) {
  //     header('Location: home');
  // }
  // echo ($_SESSION["user"]["ip"] != $_SERVER["REMOTE_ADDR"]);
  // echo $_SESSION["user"]["ip"];
  // echo $_SERVER["REMOTE_ADDR"];


  // PROBLEME $_SESSION["user"]["ip"] EST VIDE, A CAUSE DE LA NAVIGATION PRIVEE ? IMPACT TEST SESSION HIJACKING // Esct-q ue j'ai fait trop de session_start ?

  include("header.php");
?>

<main>
  <section>
    <h1>Vos chaînes</h1>
    <p>Nous n'avons aucune base de données pour vous actuellement, <?= $_SESSION["user"]["firstname"] ?>, revenez un autre jour.</p>
  </section>
</main>

<?php
  include("footer.php");
?>