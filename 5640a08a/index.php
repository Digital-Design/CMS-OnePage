<?php session_start();
var_dump($_SESSION);
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

    <link href="../css/bootstrap.no-icons.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/summernote.css" / rel="stylesheet">
    <script src="../js/summernote.min.js"></script>

    </head>
    <body>
      <h1>Hello, <?php echo $_SESSION['user']; ?>!</h1>
      <form action="index.php" method="post">
        <button type="submit" name="action" value="deconnexion" class="btn btn-default">Déconnexion</button>
      </form>

      <div class="summernote container">
        <div class="row">
          <div class="span12">
            <h2>POST DATA</h2>
            <pre>
            <?php print_r($_POST); ?>
            </pre>
            <pre>
            <?php echo htmlspecialchars($_POST['content']); ?>
            </pre>
          </div>
        </div>
        <div class="row">
          <form class="span12" id="postForm" action="/summernote.php" method="POST" enctype="multipart/form-data" onsubmit="return postForm()">
            <fieldset>
              <legend>Make Post</legend>
              <p class="container">
                <textarea class="input-block-level" id="summernote" name="content" rows="18">
                </textarea>
              </p>
            </fieldset>
            <button type="submit" class="btn btn-primary">Save changes</button>
            <button type="button" id="cancel" class="btn">Cancel</button>
          </form>
        </div>
      </div>

      <script type="text/javascript">
      $(document).ready(function() {
        $('#summernote').summernote({
          height: "500px"
        });
      });
      var postForm = function() {
        var content = $('textarea[name="content"]').html($('#summernote').code());
      }
      </script>

<?php endif; ?>

  </body>
</html>