<?php
  // if (!empty($_POST)) {
    // $errors = [];

    // $firstname = trim(strip_tags($_POST['name']));
    // $lastname = trim(strip_tags($_POST['lastname']));
    // $email = trim(strip_tags($_POST['email']));
    // $retypedEmail = trim(strip_tags($_POST['retypedEmail']));
    // $password = trim(strip_tags($_POST['password']));
    // $retypedPassword = trim(strip_tags($_POST['retypedPassword']));

    // // Validation de l'email
    // if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    //   $errors["email"] = "L'email n'est pas valide.";
    // }
    
    // if ($retypedEmail != $email) {
    //   $errors["retypedEmail"] = "Les deux emails sont différents.";
    // }

    // // Validation du mot de passe
    // if ($password != $retypedPassword) {
    //   $errors["retypedPassword"] = "Les deux mots de passe sont différents.";
    // }

    // // Validation de la présence d'aumoins une majuscule, une minuscule, un chiffre et un caractère spécial.
    // $uppercase = preg_match("/[A-Z]/", $password);
    // $lowercase = preg_match("/[a-z]/", $password);
    // $number = preg_match("/[0-9]/", $password);
    // $specialChar = preg_match("/[^a-zA-Z0-9]/", $password);

    // if (!$uppercase || !$lowercase || !$number || !$specialChar || strlen($password) < 12) {
    //   $errors["password"] = "Le mot de passe doit contenir au moins 12 caractères, dont une majuscule, une minuscule, un chiffre et un caractère spécial.";
    // }

    // Si pas d'erreur
    // if (empty($errors)) {
      // Cryptage du mdp
      // $hash = password_hash($password, PASSWORD_BCRYPT);

      // $db = new PDO('mysql:host=localhost;dbname=startauth', 'root', 'root');
      // Création du compte utilisateur dans la BDD
      // $query = $db->prepare("INSERT INTO users (firstname, email, password) VALUES (:firstname, :email, :password)");
      // $query->bindValue(':firstname', $firstname);
      // $query->bindValue(':email', $email);
      // $query->bindValue(':password', $hash);

      // if ($query->execute()) {
      //   // Rediriger vers la page de connexion
      //   header('Location: login.php');
      // }
    // }
  // }

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

      <p>* Champs obligatoires</p>
      <input type="submit" value="Envoyer" class="submit-btn">
    </form>
  </section>
</main>

<?php
  include("footer.php");
?>