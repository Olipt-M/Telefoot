<?php
  session_start();

  require("../config/index.php");

  $page = "home";
  if (isset($_GET["page"])) {
    $page = $_GET["page"];
  }

  // Connexion à la BDD
  $dsn = "mysql:host=" . DB_HOSTNAME . ";dbname=" . DB_DATABASE;
  $db = new PDO($dsn, DB_USERNAME, DB_PASSWORD);

  // Tableau contenant les différentes pages du site
  $pages = array(
    "home" => array(
      "model" => "HomeModel",
      "view" => "HomeView",
      "controller" => "HomeController"
    ),
    "subscription" => array(
      "model" => "SubscriptionModel",
      "view" => "SubscriptionView",
      "controller" => "SubscriptionController"
    ),
    "login" => array(
      "model" => "LoginModel",
      "view" => "LoginView",
      "controller" => "LoginController"
    ),
    "user" => array(
      "model" => "UserModel",
      "view" => "UserView",
      "controller" => "UserController"
    ),
    "logout" => array(
      "model" => "LogoutModel",
      "view" => "LogoutView",
      "controller" => "LogoutController"
    ),
    "reset_password" => array(
      "model" => "ResetPasswordModel",
      "view" => "ResetPasswordView",
      "controller" => "ResetPasswordController"
    ),
    "new_password" => array(
      "model" => "NewPasswordModel",
      "view" => "NewPasswordView",
      "controller" => "NewPasswordController"
    )
  );

  // On parcourt le tableau pour vérifier si la page existe bien.
  $find = false;
  foreach ($pages as $key => $value) {
    if ($page == $key) {
      $find = true;

      $model = $value["model"];
      $view = $value["view"];
      $controller = $value["controller"];

      break;
    }
  }

  if ($find) {
    // On importe les différentes classes (ex: HomeModel, HomeCOntroller et HomeView).
    require(DIR_MODEL . $page . ".php");
    require(DIR_CONTROLLER . $page . ".php");
    require(DIR_VIEW . $page . ".php");

    // Suite à ces imports on peut instancier les classes.
    $pageModel = new $model($db);
    $pageController = new $controller($pageModel);
    $pageView = new $view($pageController);

    // Appel de la méthode render() pour faire le rendu de la vue.
    $pageView->render();
  }
?>