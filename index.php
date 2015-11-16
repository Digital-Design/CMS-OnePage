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

    <?php if ($nav = getNav()): ?>
        <!-- Nav -->
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

        <?php if ($carousel = getCarousel()): ?>
            <!-- Carousel -->
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

        <?php if ($categories = getCategories()): ?>
            <!-- Categories -->
            <?php foreach ($categories as $key => $categorie): ?>
                <div id="<?php echo $categorie['id_categorie']; ?>" class="categorie" style="background-color:<?php echo $categorie['color']; ?>">
                    <?php echo $categorie['code']; ?>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>

        <?php if (0): ?>
            <!-- Contact Form -->
            <div class="row" id="contact">
                <div class="col-sm-6 col-sm-offset-3">
                    <h3>Contactez-moi !</h3>
                    <form role="form" id="contactForm">
                     <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="name" class="h4">Nom</label>
                            <input type="text" class="form-control" id="name" placeholder="Entrez votre Nom" required>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="email" class="h4">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Entrez votre Email" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="message" class="h4 ">Message</label>
                        <textarea id="message" class="form-control" rows="5" placeholder="Entrez votre message" required></textarea>
                    </div>
                    <button type="submit" id="form-submit" class="btn btn-primary btn-lg pull-right ">Envoyer</button>
                    <div id="msgValideSubmit" class="h3 text-center hidden">Le message a bien été envoyé</div>
                    <div id="msgErrorSubmit" class="h3 text-center hidden">Il y a eu une erreur lors de l'envoi du message</div>
                    </form>
                </div>
            </div>
        <?php endif; ?>
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script>

            //permet le scroll swing
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

            //permet d'ajouter activer sur certain lien
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

            //quand on valide le formulaire de contact
            $("#contactForm").submit(function(event){
                event.preventDefault();
                var name = $("#name").val();
                var email = $("#email").val();
                var message = $("#message").val();

                $.ajax({
                    type: "POST",
                    url: "php/form-process.php",
                    data: "name=" + name + "&email=" + email + "&message=" + message +"&action=contact",
                    success : function(text){
                        if (text == "success"){
                            $( "#msgValideSubmit" ).removeClass( "hidden" );
                        }else{
                            $( "#msgErrorSubmit" ).removeClass( "hidden" );
                        }
                    }
                });
            });

        </script>
</body>
</html>