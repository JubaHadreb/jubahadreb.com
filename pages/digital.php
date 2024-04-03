<?php
  error_reporting(0);
  ini_set("display_errors", 0);

  function error_found(){
    header("Location: https://jubahadreb.com/Accueil");
  }
  set_error_handler('error_found');
  require'connexion.php';
  require'contact.php';
  if(isset($_GET['nmbr'])){
    $nmbr = $_GET['nmbr'];           
  }else{
    $nmbr = 4;
  }
?>
<!doctype html>
<html lang="fr" xml:lang="fr">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Présentation de mes réalisations de sites web, produits graphiques(Logos, dépliants) et autres projets digitaux.">
    <meta name="keywords" content="juba hadreb,digital,projets digitaux,logo,site internet,site web,application,print,PAO,video">
    <meta name="author" content="Juba Hadreb">
    <title>Juba Hadreb - Projets Digitaux ></title>

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
            <li><a href="https://jubahadreb.com/Digital" class="nav_on">Digital</a></li>
            <li><a href="https://jubahadreb.com/Art">Art</a></li>
            <li><a href="https://jubahadreb.com/Expertises">Expertises</a></li>
          </ul>
        </nav>
        <div style="clear:both;"></div>
      </div>
    </header>

    <main>
      <section id="main_projets" class="container text-center">
        <!--<ul id="main_projets_nav" class="row">
          <li class="col-sm-1 col-md-2 col-lg-3"></li>
          <li class="col-2 col-sm-2 col-md-2 col-lg-2"><a href="https://jubahadreb.com/pages/digital.php" class="main_projets_nav_on">Tout</a></li>
          <li class="col-6 col-sm-5 col-md-4 col-lg-3"><a href="https://jubahadreb.com/pages/digital.php" class="main_projets_nav_off">Web et application</a></li>
          <li class="col-2 col-sm-2 col-md-2 col-lg-2"><a href="https://jubahadreb.com/pages/digital.php" class="main_projets_nav_off">Print</a></li>
          <li class="col-2 col-sm-2 col-md-2 col-lg-2"><a href="https://jubahadreb.com/pages/digital.php" class="main_projets_nav_off">Video</a></li>
        </ul>-->
        <ul id="main_projets_list" class="row">

          <?php
            $sql = $connexion->query(' SELECT work_id, work_project ,work_page, work_type, work_file FROM works WHERE work_page ="digital" ORDER BY work_id DESC LIMIT 0,'.$nmbr );
            
            $i = 0;

            while( $ligne = $sql->fetch() ){   
                     
              echo'<li id="'.$ligne['work_id'].'" class="col-12 col-md-6">';
              echo'<div class="projet_container container"> ';
              echo'<img src="https://jubahadreb.com/img/works/work_file/'.$ligne['work_file'].'" alt="'.$ligne['work_project'].'" width="100%">';
              echo'<div class="container centered">';
              echo'<a href="https://jubahadreb.com/Projet/'.$ligne['work_id'].'/'.$ligne['work_page'].'/'.$ligne['work_id'].'/'.$nmbr.'">';
              echo'<p>'.stripslashes($ligne['work_project']).'</p>';
              echo'<p>'.$ligne['work_type'].'</p>';
              echo'<p>Découvrir</p>';
              echo'</a>';
              echo'</div>';
              echo'</div>';
              echo'</li>';
              $a = $ligne['work_id'];
              $i++;
            }
          ?>

        </ul>

        <?php    

          $nmbr = $nmbr+4;
          $sql = $connexion->prepare(' SELECT * FROM works WHERE work_page ="digital" ');        
          $sql->execute();          
          $total = $sql->rowCount();

          if($total > $i){
            echo'<a href="https://jubahadreb.com/Digital/'.$a.'/'.$nmbr.'" class="plus">En voir plus</a>';
          }
        ?>

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
          <form class="col-12 col-md-5" action="https://jubahadreb.com/Digital#Echanges" method="post" onsubmit="return valider();">        
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

  <?php
    if(isset($_GET['acr'])){
    $acr = $_GET['acr'];
  ?>    
  <script type="text/javascript">
     window.location.hash = "<?= $acr; ?>";
   </script>
  <?php
    }
  ?>

</html>