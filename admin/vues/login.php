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
  <script src="../js/login.js"></script>
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>

  <div class="container">
    <div class="row">
      <div class="col-lg-9 col-md-7 col-sm-9">

        <h4 style="border-bottom: 1px solid #c5c5c5;">
          <i class="glyphicon glyphicon-user">
          </i>
          Accès Administration
        </h4>
        <div style="padding: 20px;" id="form-olvidado">
          <form accept-charset="UTF-8" role="form" id="login-form" method="post" action="index.php?page=login">
            <input type="hidden" class="form-control" name="type" value="connexion">
            <h4 class="">
              Connectez-vous !
            </h4>
            <fieldset>
              <div class="form-group input-group">
                <span class="input-group-addon">
                  <i class="glyphicon glyphicon-user">
                  </i>
                </span>
                <input class="form-control" placeholder="Nom d'utilisateur" name="user" type="text" autofocus="">
              </div>
              <div class="form-group input-group">
                <span class="input-group-addon">
                  <i class="glyphicon glyphicon-lock">
                  </i>
                </span>
                <input class="form-control" placeholder="Password" name="pwd" type="password" value="" >
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">
                  Valider
                </button>
                <p class="help-block">
                  <a class="pull-right text-muted" href="#" id="olvidado"><small>Mot de passe oublié ?</small></a>
                </p>
              </div>
            </fieldset>
          </form>
        </div>

        <div style="display: none;padding: 20px;" id="form-olvidado1">
          <h4 class="">
            Mot de passe oublié ?
          </h4>
          <form accept-charset="UTF-8" role="form" id="login-recordar" method="post" action="index.php?page=login">
            <input type="hidden" class="form-control" name="type" value="pwd">
            <fieldset>
              <span class="help-block">
                Adresse mail que vous utilisez pour votre compte.
                <br>
                Nous vous enverrons un e-mail avec des instructions pour choisir un nouveau mot de passe.
              </span>
              <div class="form-group input-group">
                <span class="input-group-addon">
                  @
                </span>
                <input class="form-control" placeholder="Email" name="email" type="email" required="">
              </div>
              <button type="submit" class="btn btn-primary btn-block" id="btn-olvidado">
              Valider
              </button>
              <p class="help-block">
                <a class="text-muted" href="#" id="acceso1"><small>Connectez-vous</small></a>

              </p>
            </fieldset>
          </form>
        </div>

      </div>
    </div>
  </div>

</body>
</html>
