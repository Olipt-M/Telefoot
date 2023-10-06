<?php
  include("header.php");
?>

<main>
<section>
    <h1>Connexion</h1>
    <form action="" method="post">
      <div class="form-email">
        <div class="form-group form-secondary">
          <label for="inputLoginEmail"></label>
          <input type="email" name="email" id="inputLoginEmail" value="<?= isset($data["email"]) ? $data["email"] : "" ?>" placeholder="Email">

          <?php if (isset($errors["email"])) { ?>
            <p class="error"><?= $errors["email"] ?></p>
          <?php } ?>
        </div>
      </div>

      <div class="form-mdp">
        <div class="form-group form-secondary">
          <label for="inputLoginPassword"></label>
          <input type="password" name="password" id="inputLoginPassword" value="<?= isset($data["password"]) ? $data["password"] : "" ?>" placeholder="Mot de passe">

          <?php if (isset($errors["password"])) { ?>
            <p class="error"><?= $errors["password"] ?></p>
          <?php } ?>
        </div>
      </div>

      <input type="submit" value="Ouvir une session" class="submit-btn">
    </form>
    
    <div class="login-other-actions">
      <a href="reset_password" class="btn-forgot-password">Mot de passe oublié ?</a>
      <p class="text-secondary">Vous ne possédez toujours pas de compte ?</p>
      <a href="subscription" class="submit-btn btn-login-subscription">S'abonner</a>
    </div>
  </section>
</main>

<?php
  include("footer.php");
?>