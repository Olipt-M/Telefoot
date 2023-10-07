<?php
  include("header.php");
?>

<main>
<section>
    <h1>Réinitialisation du mot de passe</h1>
    <p>Pour réinitialiser votre mot de passe, entrez l'email de votre compte.</p>
    <form action="" method="post">
      <div class="form-email">
        <div class="form-group form-secondary">
          <label for="inputLoginEmail"></label>
          <input type="email" name="email" id="inputLoginEmail" placeholder="Entrez votre email">
        </div>
      </div>

      <input type="submit" value="Envoyer" class="submit-btn">
    </form>
    
    <p class="text-secondary">Vous allez recevoir un email pour réinitialiser votre mot de passe. Si vous ne l'avez pas reçu, veuillez vérifier que votre mail est correct.</p>
  </section>
</main>

<?php
  include("footer.php");
?>