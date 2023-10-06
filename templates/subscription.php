<?php
  include("header.php");
?>

<main>
  <section>
    <h1>Créer un compte</h1>
    <form action="" method="post">
      <div class="form-name">
        <div class="form-group">
          <label for="inputFirstname">Prénom *</label>
          <input type="text" name="firstname" id="inputFirstname" value="<?= isset($data["firstname"]) ? $data["firstname"] : "" ?>">

          <?php if (isset($errors["firstname"])) { ?>
            <p class="error"><?= $errors["firstname"] ?></p>
          <?php } ?>
        </div>

        <div class="form-group">
          <label for="inputLastname">Nom de famille *</label>
          <input type="text" name="lastname" id="inputLastname" value="<?= isset($data["lastname"]) ? $data["lastname"] : "" ?>">

          <?php if (isset($errors["lastname"])) { ?>
            <p class="error"><?= $errors["lastname"] ?></p>
          <?php } ?>
        </div>
      </div>

      <div class="form-email">
        <div class="form-group">
          <label for="inputEmail">Email *</label>
          <input type="email" name="email" id="inputEmail" value="<?= isset($data["email"]) ? $data["email"] : "" ?>">

          <?php if (isset($errors["email"])) { ?>
            <p class="error"><?= $errors["email"] ?></p>
          <?php } ?>
        </div>

        <div class="form-group">
          <label for="inputRetypedEmail">Confirmer l'email *</label>
          <input type="email" name="retypedEmail" id="inputRetypedEmail" value="<?= isset($data["retypedEmail"]) ? $data["retypedEmail"] : "" ?>">

          <?php if (isset($errors["retypedEmail"])) { ?>
            <p class="error"><?= $errors["retypedEmail"] ?></p>
          <?php } ?>
        </div>
      </div>

      <div class="form-mdp">
        <div class="form-group">
          <label for="inputPassword">Mot de passe *</label>
          <input type="password" name="password" id="inputPassword" value="<?= isset($data["password"]) ? $data["password"] : "" ?>">

          <?php if (isset($errors["password"])) { ?>
            <p class="error"><?= $errors["password"] ?></p>
          <?php } ?>
        </div>

        <div class="form-group">
          <label for="inputRetypedPassword">Confirmer le mot de passe *</label>
          <input type="password" name="retypedPassword" id="inputRetypedPassword" value="<?= isset($data["retypedPassword"]) ? $data["retypedPassword"] : "" ?>">
          
          <?php if (isset($errors["retypedPassword"])) { ?>
            <p class="error"><?= $errors["retypedPassword"] ?></p>
          <?php } ?>
        </div>
      </div>

      <p class="info-compulsory">* Champs obligatoires</p>
      <input type="submit" value="Envoyer" class="submit-btn">
    </form>
  </section>
</main>

<?php
  include("footer.php");
?>