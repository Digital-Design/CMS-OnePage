<?php session_start();

require('../inc/config.inc.php');
require('../inc/functions.inc.php');

//si il y a un post
if(!empty($_POST)) {
  if($_POST['action'] == 'connexion'){
    $_SESSION = $_POST;
    $_SESSION['log'] = true;
  }
  else if($_POST['action'] == 'deconnexion'){
    unset($_SESSION);
  }
}
?>

<!DOCTYPE html>
  <html lang="fr">
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Test</title>
      <link href="../css/bootstrap.min.css" rel="stylesheet">
      <script src="../js/jquery.min.js"></script>
      <script src="../js/bootstrap.min.js"></script>
      <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->

<?php if(!isset($_SESSION['log'])) : ?>
  
    </head>
    <body>
      <h1>Hello, world!</h1>
      <form action="index.php" method="post">
        <div class="form-group">
          <label for="user">Nom d'utilistauer</label>
          <input type="text" class="form-control" name="user">
        </div>
        <div class="form-group">
          <label for="pwd">Mot de passe</label>
          <input type="password" class="form-control" name="pwd">
        </div>
        <button type="submit" name="action" value="connexion" class="btn btn-default">Se connecter</button>
      </form>

<?php else: ?>

    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" type="text/css" rel="stylesheet" />
    <script src="../js/summernote.min.js" type="text/javascript"></script>
    <link href="../css/summernote.css" type="text/css" rel="stylesheet" />
    <link href="../css/summernote-bs3.css" type="text/css" rel="stylesheet">
    </head>
    <body>
      <h1>Hello, <?php echo $_SESSION['user']; ?>!</h1>
      <form action="index.php" method="post">
        <button type="submit" name="action" value="deconnexion" class="btn btn-default">Déconnexion</button>
      </form>
      <?php foreach (getCategories() as $key => $categorie): ?>
        <form id="postForm" action="index.php" method="POST" enctype="multipart/form-data" onsubmit="return postForm()">
          <fieldset>
             <legend><?php echo $categorie['id_categories']; ?></legend>
             <p class="container">
              <textarea class="input-block-level summernote" name="content" rows="18">
                <?php echo $categorie['code']; ?>
              </textarea>
            </p>
          </fieldset>
          <button type="submit" class="btn btn-primary">Save changes</button>
          <button type="button" id="cancel" class="btn">Cancel</button>
        </form>
        <script type="text/javascript">
        $(document).ready(function() {
          $('.summernote').summernote({
            height: "500px"
          });
        });
        </script>
      <?php endforeach; ?>
<?php endif; ?>

  </body>
</html>