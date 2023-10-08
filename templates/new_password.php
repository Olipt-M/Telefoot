<?php
  include("header.php");
?>

<main>
<section>
    <h1>Nouveau mot de passe</h1>
    <p>Entrez un nouveau mot de passe pour accéder à votre compte.</p>
    <form action="" method="post">
      <div class="form-mdp">
        <div class="form-group form-secondary">
          <label for="inputLoginPassword"></label>
          <input type="password" name="password" id="inputLoginPassword" placeholder="Nouveau mot de passe">

          <?php if (isset($errors["password"])) { ?>
            <p class="error"><?= $errors["password"] ?></p>
          <?php } ?>

          <?php if (isset($errors["passwordUpdate"])) { ?>
            <p class="error"><?= $errors["passwordUpdate"] ?></p>
          <?php } ?>

          <?php if (isset($errors["tokenExpired"])) { ?>
            <p class="error">La durée de validité de votre lien a expirée. <a href="reset_password" class="reset-link"><?= $errors["tokenExpired"] ?></a></p>
          <?php } ?>
        </div>
      </div>

      <input type="submit" value="Envoyer" class="submit-btn">
    </form>
  </section>
</main>

<?php
  include("footer.php");
?>