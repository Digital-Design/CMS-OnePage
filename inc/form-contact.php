<?php

if(!empty($_POST)) {

  require('config.inc.php');
  require('../'.ADMIN_FOLDER.'/modeles/index.php');
  require('../'.ADMIN_FOLDER.'/modeles/mailer.php');
  require('../'.ADMIN_FOLDER.'/modeles/parametre.php');

  $bdd = connectDB();

  $sql = 'INSERT INTO contact SET
  nom = :nom,
  mail = :mail,
  commentaire = :commentaire';

  $stmt = $bdd->prepare($sql);

  $stmt->bindParam(':mail', $_POST['mail'], PDO::PARAM_STR);
  $stmt->bindParam(':nom', $_POST['nom'], PDO::PARAM_STR);
  $stmt->bindParam(':commentaire', $_POST['commentaire'], PDO::PARAM_STR);

  if($stmt->execute() or die(var_dump($stmt->ErrorInfo()))) {

    // Retrieve the email template required
    $message = file_get_contents('../'.ADMIN_FOLDER.'/vues/sample_mail.html');

    // Replace the % with the actual information
    $message = str_replace('%mail%', $_POST['mail'], $message);
    $message = str_replace('%nom%', $_POST['nom'], $message);
    $message = str_replace('%commentaire%', $_POST['commentaire'], $message);
    $message = str_replace('%titre%', 'Vous avez été contacté depuis votre site web', $message);
    $message = str_replace('%domaine%', $_SERVER['HTTP_HOST'], $message);

    // Setup PHPMailer
    $mail = new PHPMailer();

    // Set who the email is coming from
    $mail->SetFrom('notification@cmsonepage.fr', 'Votre CMS');

    //recuperation du mail admin
    $parametre = getParametre(3);
    $mail->AddAddress($parametre['valeur']);

    // Set the subject
    $mail->Subject = 'Vous avez été contacté depuis votre site web';

    //Set the message
    $mail->MsgHTML($message);
    $mail->AltBody = strip_tags($message);

    // Send the email
    if($mail->Send()) {
      echo "success";
    }else{
      echo "invalid";
      //echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
  }else{
    echo "invalid";
  }
}else{
  echo "invalid";
}

/*
    //recuperation du mail admin
    $parametre = getParametre(3);

    //recuperatoin du template
    $message = file_get_contents('../'.ADMIN_FOLDER.'/vues/sample_mail.html');

    $message = str_replace('%mail%', $_POST['mail'], $message);
    $message = str_replace('%nom%', $_POST['nom'], $message);
    $message = str_replace('%commentaire%', $_POST['commentaire'], $message);
    $message = str_replace('%titre%', 'Vous avez été contacté depuis votre site web', $message);
    $message = str_replace('%domaine%', $_SERVER['HTTP_HOST'], $message);

    $headers = 'From: Votre CMS <notification@cmsonepage.fr>' . "\r\n";
    $headers .= "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // Envoi du mail
    if(mail($parametre['valeur'], 'Vous avez été contacté depuis votre site web', $message, $headers)) echo "success";
    else echo "invalid";
*/