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
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Oubli de mot de passe</title>
</head>
<body>
  <h1>J'ai oublié mon mot de passe</h1>

  <form action="" method="post">
    <div class="form-group">
      <label for="inputEmail">Email :</label>
      <input type="email" name="email" id="inputEmail">
    </div>

    <input type="submit" value="Envoyer">
  </form>
</body>
</html>