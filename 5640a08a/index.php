<?php session_start();

require('../inc/config.inc.php');
require('../inc/functions.inc.php');


//si il y a un post
if(!empty($_POST)) {

  $success = FALSE;

  if($_POST['type'] == 'connexion'){
    $_SESSION = $_POST;
    $_SESSION['log'] = true;
  }
  else if($_POST['type'] == 'deconnexion'){
    unset($_SESSION);
  }
  else if($_POST['type'] == 'categorie'){

    $bdd = connectDB();

    if($_POST['action'] == 'add') $sql = 'INSERT INTO';
    else if($_POST['action'] == 'edit') $sql = 'UPDATE';
    $sql .= ' categories SET ';

    $sql .= 'color = :color,
            ordre = :ordre,
            code = :code';

    if($_POST['action'] == 'edit') $sql .= ' WHERE id_categories = :id_categories';

    $stmt = $bdd->prepare($sql);

    $stmt->bindParam(':color', $_POST['color'], PDO::PARAM_STR);
    $stmt->bindParam(':ordre', $_POST['ordre'], PDO::PARAM_INT);
    $stmt->bindParam(':code', $_POST['code'], PDO::PARAM_STR);
    $stmt->bindParam(':id_categories', $_POST['id_categories'], PDO::PARAM_INT);

    if($stmt->execute() or die(var_dump($stmt->ErrorInfo()))) {
      $success = TRUE;
    }
  }
  else if($_POST['type'] == 'carousel'){
    $bdd = connectDB();

    if($_POST['action'] == 'add') $sql = 'INSERT INTO';
    else if($_POST['action'] == 'edit') $sql = 'UPDATE';
    $sql .= ' carousel SET ';

    $sql .= 'titre = :titre,
            description = :description,
            ordre = :ordre,
            alt = :alt';

    if($_POST['action'] == 'edit') $sql .= ' WHERE id_carousel = :id_carousel';

    for ($i=1; $i < count(getCarousel())+1; $i++) {

      $stmt = $bdd->prepare($sql);
      $stmt->bindParam(':titre', $_POST['titre_'.$i], PDO::PARAM_STR);
      $stmt->bindParam(':description', $_POST['description_'.$i], PDO::PARAM_STR);
      $stmt->bindParam(':ordre', $_POST['ordre_'.$i], PDO::PARAM_INT);
      $stmt->bindParam(':alt', $_POST['alt_'.$i], PDO::PARAM_STR);
      $stmt->bindParam(':id_carousel', $_POST['id_carousel_'.$i], PDO::PARAM_INT);

      if($stmt->execute() or die(var_dump($stmt->ErrorInfo()))) {
        $success = TRUE;
      }
    }
  }
  else if($_POST['type'] == 'nav'){

    $bdd = connectDB();

    if($_POST['action'] == 'add') $sql = 'INSERT INTO';
    else if($_POST['action'] == 'edit') $sql = 'UPDATE';
    $sql .= ' nav SET ';

    $sql .= 'titre = :titre,
            lien = :lien,
            ordre = :ordre';

    if($_POST['action'] == 'edit') $sql .= ' WHERE id_nav = :id_nav';

    for ($i=1; $i < count(getNav())+1; $i++) {

      $stmt = $bdd->prepare($sql);

      $stmt->bindParam(':titre', $_POST['titre_'.$i], PDO::PARAM_STR);
      $stmt->bindParam(':lien', $_POST['lien_'.$i], PDO::PARAM_STR);
      $stmt->bindParam(':ordre', $_POST['ordre_'.$i], PDO::PARAM_INT);
      $stmt->bindParam(':id_nav', $_POST['id_nav_'.$i], PDO::PARAM_INT);

      if($stmt->execute() or die(var_dump($stmt->ErrorInfo()))) {
        $success = TRUE;
      }
    }
  }
}

//fonction pour avoir la barre de nav admin
function getNavAdmin($IdLink){
  $toolbar = '
  <nav id="navigation" role="navigation">
    <h1>Hello, '.$_SESSION['user'].'!</h1>
    <form action="index.php" method="post">
      <button type="submit" name="type" value="deconnexion" class="btn btn-default">Déconnexion</button>
    </form>
    <br/>
    <div class="list-group">
      <a href="index.php?page=categorie" class="list-group-item ';
      if($IdLink==1)$toolbar .= 'active ';
      $toolbar .= '">Editer les catégories</a>
      <a href="index.php?page=carousel" class="list-group-item ';
      if($IdLink==2)$toolbar .= 'active ';
      $toolbar .= '">Editer le carousel</a>
      <a href="index.php?page=nav" class="list-group-item ';
      if($IdLink==3)$toolbar .= 'active ';
      $toolbar .= '">Editer la barre de navigation</a>
    </div>
  </nav>';
  return $toolbar;
}
?>

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
        <button type="submit" name="type" value="connexion" class="btn btn-default">Se connecter</button>
      </form>

<?php elseif(isset($_GET['page']) && $_GET['page'] == 'carousel'): $carousel = getCarousel()?>

      <script src='../js/jquery-sortable.js'></script>
    </head>
    <body>
      <div class="flex-container">
        <aside class="w20 mrs pam aside">
          <?php echo getNavAdmin(2); ?>
        </aside>
        <div id="main" role="main" class="flex-item-fluid pam">
          <h1>Edition du crousel</h1>
          <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">

                  <?php foreach ($carousel as $key => $image): ?>

                      <?php if ($key == 0): ?>
                          <li data-target="#carousel-example-generic" data-slide-to="<?php echo $key; ?>" class="active"></li>
                      <?php else: ?>
                          <li data-target="#carousel-example-generic" data-slide-to="<?php echo $key; ?>"></li>
                      <?php endif; ?>

                  <?php endforeach; ?>

              </ol>
              <div class="carousel-inner" role="listbox" >

              <?php foreach ($carousel as $key => $image): ?>

                  <?php if ($key == 0): ?>
                    <div class="item active">
                  <?php else: ?>
                    <div class="item">
                  <?php endif; ?>
                    <img src="../images/carousel/<?php echo $image['id_carousel']; ?>.jpeg" alt="<?php echo $image['alt']; ?>">
                    <div class="carousel-caption">
                      <h3><?php echo $image['titre']; ?></h3>
                      <p><?php echo $image['description']; ?></p>
                    </div>
                  </div>

              <?php endforeach; ?>

              </div>
              <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
              </a>
          </div>
          <br/>
          <form id="postForm" method="POST" enctype="multipart/form-data">
          <input name="action" type="text" value="edit"/>
          <table id="Sortable" class="table table-hover table-striped">
            <thead>
              <tr>
                <th>Ordre</th>
                <th>Image</th>
                <th>Titre</th>
                <th>Description</th>
                <th>Alt</th>
              </tr>
            </thead>
            <tbody>

          <?php foreach ($carousel as $key => $image): ?>

              <tr>
                <td class="handle">
                  <button type="button" class="btn btn-default" aria-label="Left Align">
                    <span class="glyphicon glyphicon-move" aria-hidden="true"></span>
                  </button>
                  <input name="id_carousel_<?php echo $image['id_carousel']; ?>" type="text" value="<?php echo $image['id_carousel']; ?>"/>
                  <input name="ordre_<?php echo $image['id_carousel']; ?>" type="text" value="<?php echo $image['ordre']; ?>" class="weight" maxlength="5"/></td>
                <td>
                  <a class="thumbnail">
                    <img src="../images/carousel/<?php echo $image['id_carousel']; ?>.jpeg" alt="<?php echo $image['alt']; ?>">
                  </a>
                </td>
                <td>
                  <input name="titre_<?php echo $image['id_carousel']; ?>" type="text" value="<?php echo $image['titre']; ?>"/>
                </td>
                <td>
                  <input name="description_<?php echo $image['id_carousel']; ?>" type="text" value="<?php echo $image['description']; ?>"/>
                </td>
                <td>
                  <input name="alt_<?php echo $image['id_carousel']; ?>" type="text" value="<?php echo $image['alt']; ?>"/>
                </td>
              </tr>

          <?php endforeach; ?>

            </tbody>
          </table>
          <button type="submit" name="type" value="carousel" class="btn btn-primary">Enregistrer</button>
          <button type="button" class="btn">Annuler</button>
        </form>
      </div>
      <script>
      $('#Sortable tbody').sortable({
          handle: ".handle",
          stop: function(event, ui) {
              $('#Sortable tbody>tr').each(function(index){
                  $(this).find('.weight').val(index+1);
              });
          }
      });
      </script>

<?php elseif(isset($_GET['page']) && $_GET['page'] == 'nav'): $nav = getNav() ?>

      <script src='../js/jquery-sortable.js'></script>
    </head>
    <body>
      <div class="flex-container">
        <aside class="w20 mrs pam aside">
          <?php echo getNavAdmin(3); ?>
        </aside>
        <div id="main" role="main" class="flex-item-fluid pam">
          <h1>Edition de la barre de navigation</h1>

          <form id="postForm" method="POST" enctype="multipart/form-data">
          <input name="action" type="text" value="edit"/>
          <table id="Sortable" class="table table-hover table-striped">
            <thead>
              <tr>
                <th>Ordre</th>
                <th>Lien</th>
                <th>Titre</th>
              </tr>
            </thead>
            <tbody>

          <?php foreach ($nav as $key => $lien): ?>

              <tr>
                <td class="handle">
                  <button type="button" class="btn btn-default" aria-label="Left Align">
                    <span class="glyphicon glyphicon-move" aria-hidden="true"></span>
                  </button>
                  <input name="id_nav_<?php echo $lien['id_nav']; ?>" type="text" value="<?php echo $lien['id_nav']; ?>"/>
                  <input name="ordre_<?php echo $lien['id_nav']; ?>" type="text" value="<?php echo $lien['ordre']; ?>" class="weight" maxlength="5"/>
                </td>
                <td>
                  <input name="lien_<?php echo $lien['id_nav']; ?>" type="text" value="<?php echo $lien['lien']; ?>"/>
                </td>
                <td>
                  <input name="titre_<?php echo $lien['id_nav']; ?>" type="text" value="<?php echo $lien['titre']; ?>"/>
                </td>
              </tr>

          <?php endforeach; ?>

            </tbody>
          </table>
          <button type="submit" name="type" value="nav" class="btn btn-primary">Enregistrer</button>
          <button type="button" class="btn">Annuler</button>
        </form>
      </div>
      <script>
      $('#Sortable tbody').sortable({
          handle: ".handle",
          stop: function(event, ui) {
              $('#Sortable tbody>tr').each(function(index){
                  $(this).find('.weight').val(index+1);
              });
          }
      });
      </script>


<?php else: ?>

      <script src="../js/summernote.min.js" type="text/javascript"></script>
      <script src="../js/bootstrap-colorpicker.min.js" type="text/javascript"></script>
      <link href="../css/bootstrap-colorpicker.min.css" type="text/css" rel="stylesheet" />
      <link href="../css/font-awesome.min.css" type="text/css" rel="stylesheet" />
      <link href="../css/summernote.css" type="text/css" rel="stylesheet" />
      <link href="../css/summernote-bs3.css" type="text/css" rel="stylesheet">
    </head>
    <body>
      <div class="flex-container">
        <aside class="w20 mrs pam aside">
          <?php echo getNavAdmin(1); ?>
        </aside>
        <div id="main" role="main" class="flex-item-fluid pam">

          <h1>Edition des catégories</h1>
          <div class="list-group">

          <?php foreach (getCategories() as $key => $categorie): ?>

            <li class="list-group-item">
              <h2>
                Editer la catégorie <?php echo $categorie['id_categories']; ?>
                <button type="button" class="btn btn-default" data-toggle="collapse" data-target="#categorie<?php echo $categorie['id_categories']; ?>" aria-expanded="false" aria-controls="categorie<?php echo $categorie['id_categories']; ?>">
                  <span class="glyphicon glyphicon-plus boutton-categorie" aria-hidden="true"></span>
                </button>
              </h2>
              <div class="collapse" id="categorie<?php echo $categorie['id_categories']; ?>">
                <form id="postForm" action="index.php" method="POST" enctype="multipart/form-data">
                  <!-- ID -->
                    <input type="text" name="action" value="edit" class="form-control" />
                    <input type="text" name="id_categories" value="<?php echo $categorie['id_categories']; ?>" class="form-control" />
                  <!-- Color picker -->
                  <div class="input-group colorpicker">
                    <input type="text" name="color" value="<?php echo $categorie['color']; ?>" class="form-control" />
                    <span class="input-group-addon"><i></i></span>
                  </div>
                  <!-- Ordre -->
                  <input type="number" name="ordre" value="<?php echo $categorie['ordre']; ?>" class="form-control" />
                  <!-- summernote -->
                  <textarea class="input-block-level summernote" name="code" rows="18">
                    <?php echo $categorie['code']; ?>
                  </textarea>
                  <button type="submit" name="type" value="categorie" class="btn btn-primary">Enregistrer</button>
                  <button type="button" class="btn">Annuler</button>
                </form>
              </div>

            </li>

          <?php endforeach; ?>

          </div>
        </div>
      </div>
      <script type="text/javascript">
        $('.boutton-categorie').on('click', function(){
          if($(this).hasClass('glyphicon-plus')){
            $(this).removeClass('glyphicon-plus');
            $(this).addClass('glyphicon-minus');
          }else{
            $(this).removeClass('glyphicon-minus');
            $(this).addClass('glyphicon-plus');
          }
        });
        $(document).ready(function() {
          $('.summernote').summernote({
            height: "500px"
          });
        });
        $(function(){
          $('.colorpicker').colorpicker();
        });
      </script>

<?php endif; ?>

  </body>
</html>