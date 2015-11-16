<?php
require('inc/config.inc.php');

//on include tous les modeles
foreach (glob( ADMIN_FOLDER."/modeles/*.php" ) as $filename){
    include $filename;
}

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
    <link href="css/index.css" rel="stylesheet">

  </head>
  <body id="0">

    <!-- Nav -->
    <?php if ($nav = getNav()): ?>
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <ul class="nav navbar-nav">
                    <?php foreach ($nav as $key => $lien): ?>
                        <?php if ($lien['lien'] == "#0"): ?>
                            <li class="nav-link active">
                            <?php else : ?>
                                <li class="nav-link">
                                <?php endif; ?>
                                <a href="<?php echo $lien['lien']; ?>"><?php echo $lien['titre']; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </nav>
        <?php endif; ?>

        <!-- Carousel -->
        <?php if ($carousel = getCarousel()): ?>
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <?php if (count($carousel) != 1): ?>
                    <ol class="carousel-indicators">
                        <?php foreach ($carousel as $key => $image): ?>
                            <?php if ($key == 0): ?>
                                <li data-target="#carousel-example-generic" data-slide-to="<?php echo $key; ?>" class="active"></li>
                            <?php else: ?>
                                <li data-target="#carousel-example-generic" data-slide-to="<?php echo $key; ?>"></li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ol>
                <?php endif; ?>
                <div class="carousel-inner" role="listbox">
                    <?php foreach (getCarousel() as $key => $image): ?>
                        <?php if ($key == 0): ?>
                          <div class="item active">
                          <?php else: ?>
                              <div class="item">
                              <?php endif; ?>
                              <img src="images/carousel/<?php echo $image['id_carousel'] ?>.<?php echo $image['extension'] ?>" alt="<?php echo $image['alt']; ?>">
                              <div class="carousel-caption">
                                <h3><?php echo $image['titre']; ?></h3>
                                <p><?php echo $image['description']; ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php if (count($carousel) != 1): ?>
                    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <!-- Categories -->
        <?php if ($categories = getCategories()): ?>
            <?php foreach ($categories as $key => $categorie): ?>
                <div id="<?php echo $categorie['id_categorie']; ?>" class="categorie" style="background-color:<?php echo $categorie['color']; ?>">
                    <?php echo $categorie['code']; ?>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>

        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script>

            $(document).ready(function () {
                $(document).on("scroll", onScroll);

                $('a[href^="#"]').on('click', function (e) {
                    e.preventDefault();
                    $(document).off("scroll");

                    $('a').parent().each(function () {
                        $(this).removeClass('active');
                    })
                    $(this).parent().addClass('active');

                    var target = this.hash;
                    $target = $(target);
                    $('html, body').stop().animate({
                       'scrollTop': $target.offset().top - $('.navbar').height()
                   }, 500, 'swing', function () {
                    $(document).on("scroll", onScroll);
                });
                });
            });

            function onScroll(event){
                var scrollPos = $(document).scrollTop();
                $('.nav-link a').each(function () {
                    var currLink = $(this);
                    var refElement = $(currLink.attr("href"));
                    if (refElement.position().top <= scrollPos + $('.navbar').height() + 5 && refElement.position().top + refElement.height() > scrollPos + $('.navbar').height() + 5) {
                        $('.nav-link').removeClass("active");
                        currLink.parent().addClass("active");
                    }
                    else{
                        currLink.parent().removeClass("active");
                    }
                });
            }

        </script>
    </body>
    </html>