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
  else if($_POST['action'] == 'categorie'){

  }
}

//fonction pour avoir la barre de nav admin
function getNav($IdLink){
  $toolbar = '
  <nav id="navigation" role="navigation">
    <h1>Hello, '.$_SESSION['user'].'!</h1>
    <form action="index.php" method="post">
      <button type="submit" name="action" value="deconnexion" class="btn btn-default">Déconnexion</button>
    </form>
    <br/>
    <div class="list-group">
      <a href="index.php?page=categorie" class="list-group-item ';
      if($IdLink==1)$toolbar .= 'active ';
      $toolbar .= '">Editer les catégories</a>
      <a href="index.php?page=carousel" class="list-group-item ';
      if($IdLink==2)$toolbar .= 'active ';
      $toolbar .= '">Editer le carousel</a>
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
      <title>Test</title>
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
        <button type="submit" name="action" value="connexion" class="btn btn-default">Se connecter</button>
      </form>

<?php elseif(isset($_GET['page']) && $_GET['page'] == 'carousel'): $carousel = getCarousel()?>

    <script src='../js/jquery-sortable.js'></script>
    </head>
    <body>
      <div class="flex-container">
        <aside class="w20 mrs pam aside">
          <?php echo getNav(2); ?>
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
              <div class="carousel-inner" role="listbox" style="max-height:600px">
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
          <table id="sortable" class="table table-hover table-striped">
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
              <td><?php echo $image['ordre']; ?></td>
              <td>
                <a class="thumbnail">
                  <img src="../images/carousel/<?php echo $image['id_carousel']; ?>.jpeg" alt="<?php echo $image['alt']; ?>">
                </a>
              </td>
              <td><?php echo $image['titre']; ?></td>
              <td><?php echo $image['description']; ?></td>
              <td><?php echo $image['alt']; ?></td>
            </tr>
        <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <script>
        $('#sortable').sortable({
          containerSelector: 'table',
          itemPath: '> tbody',
          itemSelector: 'tr',
          placeholder: '<tr class="placeholder"/>',
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
          <?php echo getNav(1); ?>
        </aside>
        <div id="main" role="main" class="flex-item-fluid pam">

          <h1>Edition des catégories</h1>
          <div class="list-group">
          <?php foreach (getCategories() as $key => $categorie): ?>
            <li class="list-group-item">
          <h2>
            Editer la catégorie <?php echo $categorie['id_categories']; ?>
            <button type="button" class="btn btn-default" data-toggle="collapse" data-target="#categorie<?php echo $categorie['id_categories']; ?>" aria-expanded="false" aria-controls="categorie<?php echo $categorie['id_categories']; ?>">
              <span id="button-categorie-<?php echo $categorie['id_categories']; ?>" class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button>
          </h2>
          <div class="collapse" id="categorie<?php echo $categorie['id_categories']; ?>">
            <form id="postForm" action="index.php" method="POST" enctype="multipart/form-data" onsubmit="return postForm()">
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
              <button type="submit" name="action" value="categorie" class="btn btn-primary">Enregistrer</button>
              <button type="button" class="btn">Annuler</button>
            </form>
          </div>
          <script type="text/javascript">
          $('#button-categorie-<?php echo $categorie['id_categories']; ?>').on('click', function(){
            if($('#button-categorie-<?php echo $categorie['id_categories']; ?>').hasClass('glyphicon-plus')){
              $('#button-categorie-<?php echo $categorie['id_categories']; ?>').removeClass('glyphicon-plus');
              $('#button-categorie-<?php echo $categorie['id_categories']; ?>').addClass('glyphicon-minus');
            }else{
              $('#button-categorie-<?php echo $categorie['id_categories']; ?>').removeClass('glyphicon-minus');
              $('#button-categorie-<?php echo $categorie['id_categories']; ?>').addClass('glyphicon-plus');
            }
          });
        </script>
          </li>
          <?php endforeach; ?>
          </div>
        </div>
      </div>
      <footer>
        <script type="text/javascript">
          $(document).ready(function() {
            $('.summernote').summernote({
              height: "500px"
            });
          });
          $(function(){
            $('.colorpicker').colorpicker();
          });
        </script>
      </footer>

<?php endif; ?>
  </body>
</html>