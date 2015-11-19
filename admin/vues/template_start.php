<?php
include_once('modeles/index.php');
include_once('modeles/contact.php');
include_once('modeles/analytique.php');

//on recupere les contacts pour les notifs
$contactstats = getWeekContacts();
$analytiquestats = getWeekAnalytiques();

?>

<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="BackOffice">
    <meta name="author" content="Sidorenko Konstantin">

    <title>Administration</title>

    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../css/sb-admin.css" rel="stylesheet" type="text/css">
    <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="../css/bootstrap-colorpicker.min.css" rel="stylesheet" type="text/css"/>
    <link href="../css/font-awesome.min.css" type="text/css" rel="stylesheet" />
    <link href="../css/summernote.css" type="text/css" rel="stylesheet" />
    <link href="../css/summernote-bs3.css" type="text/css" rel="stylesheet">
    <link href="../css/admin.css" type="text/css" rel="stylesheet">
    <link href="../css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
    <link href="../css/morris.css" media="all" rel="stylesheet" type="text/css" />
    <link href="../css/sortable-theme-bootstrap.css" rel="stylesheet" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script src="../js/jquery.min.js" type="text/javascript"></script>
    <script src="../js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../js/summernote.min.js" type="text/javascript"></script>
    <script src="../js/bootstrap-colorpicker.min.js" type="text/javascript"></script>
    <script src='../js/jquery-sortable.js' type="text/javascript"></script>
    <script src="../js/fileinput.min.js" type="text/javascript"></script>
    <script src="../js/fileinput_locale_fr.js" type="text/javascript"></script>
    <script src="../js/morris.min.js" type="text/javascript"></script>
    <script src="../js/raphael-min.js" type="text/javascript"></script>
    <script src="../js/sortable.min.js" type="text/javascript"></script>

</head>
<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Menu de navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php?page=home">CMS One-Page Administration</a>
                <a class="navbar-brand" href="../">Retour au site</a>
            </div>
            <!-- Top Menu Alerts -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a>Commentaire(s) : <span class="label label-primary"><?php echo count($contactstats) ?></span></a>
                        </li>
                        <li>
                            <a>Visite(s) : <span class="label label-success"><?php echo count($analytiquestats) ?></span></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="contact">Consulter les messages</a>
                        </li>
                        <li>
                            <a href="analytique">Consulter les visites</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['user'] ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                          <a href="#" onclick="document.getElementById('logout').submit()" ><i class="fa fa-fw fa-power-off"></i> Déconnexion</a>
                          <form id="logout" action="index.php?page=login" method="post">
                              <input type="hidden" class="form-control" name="type" value="deconnexion" >
                          </form>
                      </li>
                  </ul>
              </li>
          </ul>
          <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
          <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <?php if($_GET['page'] == 'home') : ?>
                <li class="active">
                <?php else : ?>
                <li>
                <?php endif ?>
                    <a href="home"><i class="fa fa-fw fa-home"></i> Home</a>
                </li>
                <?php if($_GET['page'] == 'categorie') : ?>
                <li class="active">
                <?php else : ?>
                <li>
                <?php endif ?>
                    <a href="categorie"><i class="fa fa-fw fa-edit"></i> Editer les catégories</a>
                </li>
                <?php if($_GET['page'] == 'nav') : ?>
                <li class="active">
                <?php else : ?>
                <li>
                <?php endif ?>
                    <a href="nav"><i class="fa fa-fw fa-at"></i> Editer la barre de navigation</a>
                </li>
                <?php if($_GET['page'] == 'carousel') : ?>
                <li class="active">
                <?php else : ?>
                <li>
                <?php endif ?>
                    <a href="carousel"><i class="fa fa-fw fa-file-image-o"></i> Editer le carousel</a>
                </li>
                <?php if($_GET['page'] == 'module') : ?>
                <li class="active">
                <?php else : ?>
                <li>
                <?php endif ?>
                    <a href="module"><i class="fa fa-fw fa-desktop"></i> Gestion des modules</a>
                </li>
                <?php if($_GET['page'] == 'contact') : ?>
                <li class="active">
                <?php else : ?>
                <li>
                <?php endif ?>
                    <a href="contact"><i class="fa fa-fw fa-comments"></i> Contact</a>
                </li>
                <?php if($_GET['page'] == 'analytique') : ?>
                <li class="active">
                <?php else : ?>
                <li>
                <?php endif ?>
                    <a href="analytique"><i class="fa fa-fw fa-users"></i> Analytique</a>
                </li>
                <?php if($_GET['page'] == 'parametre') : ?>
                <li class="active">
                <?php else : ?>
                <li>
                <?php endif ?>
                    <a href="parametre"><i class="fa fa-fw fa-wrench"></i> Paramètres</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <h1 class="page-header">
                    <?php echo $titre ?>
                    <small><?php echo $sous_titre ?></small>
                </h1>
