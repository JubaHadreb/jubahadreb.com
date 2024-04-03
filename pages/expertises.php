<?php
  error_reporting(0);
  ini_set("display_errors", 0);

  function error_found(){
    header("Location: https://jubahadreb.com/Accueil");
  }
  set_error_handler('error_found');
  require'connexion.php';
  require'contact.php';
?>
<!doctype html>
<html lang="fr" xml:lang="fr">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Les expertises qui me permettront de vous accompagner dans votre transition numérique et/ou transformation digitale.">
    <meta name="keywords" content="juba hadreb,digital,transformation digitale,communication digitale,numérique,transition numérique,solutions web,design graphique">
    <meta name="author" content="Juba Hadreb">
    <title>Juba Hadreb - Mes Expertises ></title>

    <link rel="icon" type="image/png" href="https://jubahadreb.com/img/favicon.png">
    <link rel="stylesheet" href="https://jubahadreb.com/css/feuille.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <script>   
    function valider(){
    
      if( document.forms[1].nom.value == '' || document.forms[1].email.value == '' || document.forms[1].email.value.indexOf('@')<0 || document.forms[1].email.value.indexOf('.')<0 || document.forms[1].objet.value == '' || document.forms[1].message.value == '' ){
      
        alert('Merci de remplir les champs obligatoires.');
        return false;
        
      }else{
      
        return true;
        
      }
    
    }
    </script>

  </head>
  <body>

    <header class="container">
      <div class="row">
        <a id="JubaHadreb" href="https://jubahadreb.com/Accueil" class="col-12 col-md-2"><span><</span>jubahadreb<span>></span></a>
        <nav class="col-12 col-md-10"> 
          <ul>
            <li><a href="https://jubahadreb.com/Accueil">Accueil</a></li>
            <li><a href="https://jubahadreb.com/Digital">Digital</a></li>
            <li><a href="https://jubahadreb.com/Art">Art</a></li>
            <li><a href="https://jubahadreb.com/Expertises" class="nav_on">Expertises</a></li>
          </ul>
        </nav>
        <div style="clear:both;"></div>
      </div>
    </header>

    <main>
      <section id="main_title" class="text-center">
        <img src="https://jubahadreb.com/img/design_et_web.jpg" alt="Création digitale et web" width="100%">
        <h1 class="container centered">
          <p>Une transformation digitale simple et accessible à tous</p>
        </h1>
      </section>
      <section id="main_presentation" class="container">
        <div class="text-center img_expertises">
          <img src="https://jubahadreb.com/img/expertises.png" alt="Création digitale et web" width="60%">
        </div>
        <p>Que vous ayez déjà accompli votre <span>transition numérique</span> ou que vous soyez encore en pleine <span>transformation digitale</span>, mon expertise saura s’adapter à vos besoins et ainsi vous proposer les solutions les plus pertinentes pour répondre aux défis auxquels vous êtes confrontés.</p>
        <p>Mes compétences me permettent d'agir en 360°. J'offre des services divers qui se répartissent sur tout le spectre de l’univers digital.</p>
        <p>Que vos besoins soient liés aux <span>solutions web, au design graphique, à la vidéo ou encore au développement d’une stratégie marketing et/ou communication digitale</span>, mon expertise nous permettra d’agir sur un ou plusieurs de ces domaines à la fois.
        <br>Je propose de vous accompagner à travers une démarche simple et efficace. Nous convenons d’<span>un rendez-vous gratuit</span>, où nous discuterons ensemble de vos besoins ou problématiques afin d’identifier les solutions à apporter.
        <br>Lors d’un deuxième rendez-vous, nous discuterons le détail des solutions qui auront été retenues.
        <br>Une fois les solutions retenues validées, je me chargerais de les développer et les mettre en place.</p>
        <p>N'hésitez pas à me contacter si vous souhaitez que je vous accompagne sur l'un de vos projets.</p>
      </section>
      <section id="Echanges" class="container text-center">

        <?php
          echo $chaine;
        ?>

        <div class="row">
          <div class="col-md-1"></div>
          <div id="Echanges_img" class="col-md-5">
            <img src="https://jubahadreb.com/img/echanger.jpg" alt="Echanger ensemble par mail" height="100%">
          </div>
          <form class="col-12 col-md-5" action="https://jubahadreb.com/Expertises#Echanges" method="post" onsubmit="return valider();">        
            <table>            
              <tr>
                <td><input type="text" name="nom" class="input" placeholder="Nom"></td>
              </tr>
              
              <tr>
                <td><input type="text" name="email" class="input" placeholder="Email"></td>
              </tr>
              
              <tr>
                <td><input type="text" name="objet" class="input" placeholder="Objet"></td>
              </tr>
              
              <tr>
                <td><textarea name="message" placeholder="Message" rows="6"></textarea></td>
              </tr>
              
              <tr>
                <td colspan="2"><input type="submit" name="envoyez" class="envoyez" value="Envoyez"></td>
              </tr>         
            </table>        
          </form>
        </div>
        <ul id="main_socials" class="row">
          <li class="col-md-1"></li>
          <li id="linkedin" class="col-6 col-md-5">
            <a href="https://www.linkedin.com/in/jubahadreb/" target="_blank">
              <img src="https://jubahadreb.com/img/linkedin.png" alt="Linkedin" width="10%">              
            </a>
          </li>
          <li id="twitter" class="col-6 col-md-5">
            <a href="https://twitter.com/JubaHadreb" target="_blank">
              <img src="https://jubahadreb.com/img/twitter.png" alt="Twitter" width="10%">              
            </a>
          </li>
        </ul>
        <a id="ancre" href="#JubaHadreb"><img src="https://jubahadreb.com/img/ancre.png" alt="Retour en début de page" width="5%"></a>
      </section>
    </main>

    <footer class="text-center">
        <a href="https://jubahadreb.com/Accueil"><<span>/</span>jubahadreb></a>
    </footer>

  </body>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

</html>