<?php
  error_reporting(0);
  ini_set("display_errors", 0);

  function error_found(){
    header("Location: https://jubahadreb.com/Accueil");
  }
  set_error_handler('error_found');
  require'pages/connexion.php';
  require'pages/contact.php';
?>
<!doctype html>
<html lang="fr" xml:lang="fr">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Je suis chef de projet et développeur dans le domaine informatique. Je suis spécialisé dans la création d'application web et autres contenus digitaux.'.">
    <meta name="keywords" content="juba hadreb,digital,projets digitaux,art,oeuvres artistiques,design,graphique,design graphique,site internet,site web,dessins">
    <meta name="author" content="Juba Hadreb">
    <title>Juba Hadreb: Chef de Projet Informatique ></title>

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
            <li><a href="https://jubahadreb.com/Accueil" class="nav_on">Accueil</a></li>
            <li><a href="https://jubahadreb.com/Digital">Digital</a></li>
            <li><a href="https://jubahadreb.com/Art">Art</a></li>
            <li><a href="https://jubahadreb.com/Expertises">Expertises</a></li>
          </ul>
        </nav>
        <div style="clear:both;"></div>
      </div>
    </header>

    <main class="text-center">
      <section id="main_title">
        <img src="https://jubahadreb.com/img/design_et_web.jpg" alt="Création digitale et web" width="100%">
        <h1 class="container centered">
          <p>Juba Hadreb</p>
          <p>Développeur de Projets Web et Graphiques<br>Créateur d'oeuvres artistiques</p>
        </h1>
      </section>
      <section id="main_presentation" class="container">
        <p>J'exerce dans la <span>communication digitale</span> depuis maintenant <span>5 ans</span> et j’ai la chance de faire de ma passion pour celle-ci mon quotidien.
        <br>J’ai accompagné divers projets de communication digitale, de la réflexion jusqu’à la conception : création de site internet, design graphique web et print, réalisation vidéo, stratégie digitale, référencement et SEO ...
        <br>J'aime également produire des <span>oeuvres artistiques</span>, qui s'expriment le plus souvent à travers des dessins graphiques.</p>
      </section>
      <section id="ProjetsDigitaux" class="container">
        <h3>Projets digitaux</h3>
        <ul class="row">

          <?php
            $sql = $connexion->query(' SELECT work_id, work_project, work_page, work_file FROM works WHERE work_page ="digital" ORDER BY work_id DESC LIMIT 0,2 ');
            
            while( $ligne = $sql->fetch() ){          
              echo'<li class="col-12 col-md-6">';
              echo'<a href="https://jubahadreb.com/Projet/'.$ligne['work_id'].'/'.$ligne['work_page'].'">';
              echo'<img class="img_grey" src="https://jubahadreb.com/img/works/work_file/'.$ligne['work_file'].'" alt="'.$ligne['work_project'].'" width="100%">';
              echo'<p class="txt_grey">'.$ligne['work_project'].'</p>';
              echo'</a>';
              echo'</li>';
            }
          ?>

        </ul>
        <a href="https://jubahadreb.com/Digital" class="plus">Plus de projets</a>
      </section>
      <section id="OeuvresArtistiques" class="container">
        <h3>Oeuvres artistiques</h3>
        <ul class="row">

          <?php
            $sql = $connexion->query(' SELECT work_id, work_project, work_page, work_file FROM works WHERE work_page ="art" ORDER BY work_id DESC LIMIT 0,2 ');
            
            while( $ligne = $sql->fetch() ){          
              echo'<li class="col-12 col-md-6">';
              echo'<a href="https://jubahadreb.com/Projet/'.$ligne['work_id'].'/'.$ligne['work_page'].'">';
              echo'<img class="img_purple" src="https://jubahadreb.com/img/works/work_file/'.$ligne['work_file'].'" alt="'.$ligne['work_project'].'" width="100%">';
              echo'<p class="txt_purple">'.$ligne['work_project'].'</p>';
              echo'</a>';
              echo'</li>';
            }
          ?>

        </ul>
        <a href="https://jubahadreb.com/Art" class="plus">Plus d'oeuvres</a>
      </section>
      <section id="main_expertises" class="container">
        <img src="https://jubahadreb.com/img/laurier.png" alt="Couronne de laurier" width="12%">
        <p>.Mes domaines d'expertises.</p>
        <ul class="row">
          <li class="col-6 col-md-3">
              <img src="https://jubahadreb.com/img/site_internet.png" alt="Réalisation d'un site internet" width="80%">
              <h2>Création de site web</h2>
          </li>
          <li class="col-6 col-md-3">
              <img src="https://jubahadreb.com/img/design.png" alt="Design de produits graphiques" width="80%">
              <h2>Design de produits graphiques (PAO)</h2>
          </li>
          <li class="col-6 col-md-3">
              <img src="https://jubahadreb.com/img/referencement.png" alt="Référencement web SEO" width="80%">
              <h2>Référencement web SEO</h2>
          </li>
          <li class="col-6 col-md-3">
              <img src="https://jubahadreb.com/img/experience_utilisateur.png" alt="Amélioration de l'UX (expérience utilisateur)" width="80%">
              <h2>Amélioration de l'UX (expérience utilisateur)</h2>
          </li>
        </ul>
        <a href="https://jubahadreb.com/Expertises" class="plus">En savoir plus</a>
      </section>
      <section id="Echanges" class="container">
        
        <?php
        echo $chaine;
        ?>
      
        <div class="row">

          <div class="col-md-1"></div>
          <div id="Echanges_img" class="col-md-5">
            <img src="https://jubahadreb.com/img/echanger.jpg" alt="Echanger ensemble par mail" height="100%">
          </div>
          <form class="col-12 col-md-5" action="https://jubahadreb.com/Accueil#Echanges" method="post" onsubmit="return valider();">        
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