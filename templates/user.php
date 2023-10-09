<?php
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