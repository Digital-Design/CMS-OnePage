<?php
    require('inc/config.inc.php');
    require('inc/functions.inc.php');
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Test</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <!-- Carousel -->
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <?php foreach (getCarousel() as $key => $image): ?>
                <?php if ($key == 0): ?>
                    <li data-target="#carousel-example-generic" data-slide-to="<?php echo $key; ?>" class="active"></li>
                <?php else: ?>
                    <li data-target="#carousel-example-generic" data-slide-to="<?php echo $key; ?>"></li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ol>
        <div class="carousel-inner" role="listbox" style="max-height:600px">
        <?php foreach (getCarousel() as $key => $image): ?>
            <?php if ($key == 0): ?>
              <div class="item active">
            <?php else: ?>
              <div class="item">
            <?php endif; ?>
              <img src="images/carousel/<?php echo $image['id_carousel']; ?>.jpeg" alt="<?php echo $image['alt']; ?>">
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

    <!-- Categories -->
    <?php foreach (getCategories() as $key => $categorie): ?>
        <div style="background-color:<?php echo $categorie['color']; ?>">
            <?php echo $categorie['code']; ?>
        </div>
    <?php endforeach; ?>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>