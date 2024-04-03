<?php
  $chaine = '';

  if(isset($_POST['envoyez'])){//on a envoyé le formulaire

    $nom = addslashes($_POST['nom']);
    $email = addslashes($_POST['email']);
    $objet = addslashes($_POST['objet']);
    $message = addslashes($_POST['message']);
        
    $destinataire = 'hadrebjuba@gmail.com';
        
    $contenu = '<br><big>Nom:</big> '.$nom;
    $contenu .= '<br><big>Email:</big> '.$email;
    $contenu .= '<br><big>Objet:</big> '.$objet;
    $contenu .= '<br><br><big>Message:</big> '.$message;
        
    $entete = 'MIME-Version: 1.0'.'\r\n';
    $entete = 'Content-type: text/html; charset=iso-8859-1'.'\r\n';
        
    if( mail($destinataire, $objet, $contenu, $entete) ){ //email envoyé
        
      $chaine ="<div class='row'><p class='col-12 col-md-10' id='envoyer'>L'envoie est réussi! Je vous répondrais dans les plus brefs délais.</p></div>";
        
    }else{//email n'est pas parti
        
      $chaine = "<div class='row'><p class='col-12 col-md-10' id='annuler'>Désolé, un probléme est apparue. Veuillez réessayer un peu plus tard ou si vous le souhaitez, contactez moi directement à l'adresse suivante : hadrebjuba@gmail.com</p></div>";
        
    }

  }
?>