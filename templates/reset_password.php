<?php
// Chargement des dépendances Composer
require("vendor/autoload.php");
use PHPMailer\PHPMailer\PHPMailer;

// Création d'une constante pour générer le lien de réinitialisation du mot de passe
define("HOST", "http://localhost/startauth/");

  if (isset($_POST["email"])) {
    $email = trim(strip_tags($_POST["email"]));
  }

  // La fonction random_bytes renvoie un binaire que nous trnasformons en hexadécimal avec la fonction bin2hex --> cela donne un token.
  // Si on indique 50 en paramètres de random_bytes, on obtient un token de 100 caractères avec bin2hex.
  $token = bin2hex(random_bytes(50));

  // Insertion du token en BDD
  $db = new PDO('mysql:host=localhost;dbname=startauth', 'root', 'root');
  $query = $db->prepare("INSERT INTO password_reset (email, token) VALUES (:email, :token)");
  $query->bindParam(":email", $email);
  $query->bindParam(":token", $token);

  if ($query->execute()) {
    // On valide que l'insertion en BDD est bien réalisée, donc on peut passer à l'envoi du mail.
    
    // Appel d'un constructeur de la classe PHPMailer
    $phpmailer = new PHPMailer();

    // On indique qu'on utilise le protocole SMTP
    $phpmailer->isSMTP();

    // Informations du compte Mailtrap
    $phpmailer->Host = 'sandbox.smtp.mailtrap.io';
    $phpmailer->SMTPAuth = true;
    $phpmailer->Port = 2525;
    $phpmailer->Username = '1cb0c0776d432d';
    $phpmailer->Password = '9135844e0d9791';

    // Expéditeur
    $phpmailer->From = "contact@dwwm.fr";
    // Nom à afficher à la place de l'adresse mail dans le client mail
    $phpmailer->FromName = "Team Babar";

    // Destinataire
    $phpmailer->addAddress($email);

    // On indique que le contenu du mail sera en HTML.
    $phpmailer->isHTML(true);

    // Encodage du texte en UTF-8
    $phpmailer->CharSet = 'UTF-8';

    // Sujet du mail
    $phpmailer->Subject = "Réinitialisation du mot de passe";

    // Corps du mail
    $url = HOST . "new_password.php?token={$token}";
    $phpmailer->Body = "<a href=\"{$url}\">Réinitialisation du mot de passe</a>";
    
    // Envoi du mail
    $phpmailer->send();
  }

  include("header.php");
?>

<main>
<section>
    <h1>Réinitialisation du mot de passe</h1>
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