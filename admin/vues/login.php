<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Administration</title>
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/admin.css" rel="stylesheet">
  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>
  <h1>Hello, world!</h1>
  <form action="index.php?page=login" method="post">
    <input type="text" class="form-control" name="type" value="connexion">
    <div class="form-group">
      <label for="user">Nom d'utilisateur</label>
      <input type="text" class="form-control" name="user">
    </div>
    <div class="form-group">
      <label for="pwd">Mot de passe</label>
      <input type="password" class="form-control" name="pwd">
    </div>
    <button type="submit" class="btn btn-default">Se connecter</button>
  </form>
</body>
</html>
