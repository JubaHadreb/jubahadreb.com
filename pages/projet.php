<?php
  error_reporting(0);
  ini_set("display_errors", 0);

  function error_found(){
    header("Location: https://jubahadreb.com/Accueil");
  }
  set_error_handler('error_found');

  require'connexion.php';

  if(isset($_GET['a'])){
    
    if(is_numeric($_GET['a'])){
      $a = $_GET['a'];
    }else{
      header("Location: https://jubahadreb.com/Accueil");
    } 

  }

  if(isset($_GET['p'])){

    $p = $_GET['p'];           
  }

  if(isset($_GET['acr'])){
    
    if(is_numeric($_GET['acr'])){
      $acr = $_GET['acr'];
    }else{
      header("Location: https://jubahadreb.com/Accueil");
    }  

  }else{
    $acr = null;
  }

  if(isset($_GET['nmbr'])){
    
    if(is_numeric($_GET['nmbr'])){
      $nmbr = $_GET['nmbr'];
    }else{
      header("Location: https://jubahadreb.com/Accueil");
    }  

  }else{
    $nmbr = null;
  }

  $sql = $connexion->prepare(" SELECT * FROM works WHERE work_id = '$a' AND work_page = '$p' ");
  $sql->execute();
  $nombre = $sql->rowCount();

  if ($nombre == 0){
    header("Location: https://jubahadreb.com/Accueil");
  }
  
  ob_start ();
?>
<!doctype html>
<html lang="fr" xml:lang="fr">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="juba, hadreb, digital, art, design, graphique, web, dessin">
    <meta name="author" content="Juba Hadreb">
    <title>Juba Hadreb - <!--TITLE--> ></title>

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

            <?php 
              if( $p == 'digital' ){
                echo'<li><a href="https://jubahadreb.com/Digital" class="nav_on">Digital</a></li>';
              }else{
                echo'<li><a href="https://jubahadreb.com/Digital">Digital</a></li>';
              }
              if( $p == 'art' ){
                echo'<li><a href="https://jubahadreb.com/Art" class="nav_on">Art</a></li>';
              }else{
                echo'<li><a href="https://jubahadreb.com/Art">Art</a></li>';
              }
            ?>

            <li><a href="https://jubahadreb.com/Expertises">Expertises</a></li>
          </ul>
        </nav>
        <div style="clear:both;"></div>
      </div>
    </header>

    <main>
      <section id="retour_projets" class="container">
        <div class="row">
          <div class="col-3 col-md-2 col-xxl-1">

            <?php
              if($acr AND $nmbr != null){
                if($p == 'digital'){
                echo'<a href="https://jubahadreb.com/Digital/'.$acr.'/'.$nmbr.'">';
                }
                if($p == 'art'){
                echo'<a href="https://jubahadreb.com/Art/'.$acr.'/'.$nmbr.'">';
                }
              }else{
                if($p == 'digital'){
                echo'<a href="https://jubahadreb.com/Accueil#ProjetsDigitaux">';
                }
                if($p == 'art'){
                echo'<a href="https://jubahadreb.com/Accueil#OeuvresArtistiques">';
                }
              }
            ?>

              <img src="https://jubahadreb.com/img/retour.png" alt="Bouton de retour en arrière">
              <p>Retour</p>
            </a>
          </div>
        </div>
        <div style="clear:both;"></div>
      </section>
      <section id="projet_presentation" class="container projet">

        <?php
          $sqlwork = $connexion->query(' SELECT work_project, work_project_clean, work_type, work_page, work_description, work_file FROM works WHERE work_id = '.$a);

          while( $lignework = $sqlwork->fetch() ){ 
            echo'<h3>'.stripslashes($lignework['work_project']).'</h3>';
            echo'<p>'.stripslashes($lignework['work_description']).'</p>';

            $work = $lignework['work_project_clean'];
            $realtitle = stripslashes($lignework['work_project']);
          }

        ?>

      </section>

        <?php

          /*......................................LOGO......................................*/

          $sql = $connexion->query(" SELECT logo_project, logo_file FROM logos WHERE logo_project = '$work' ");

          while( $ligne = $sql->fetch() ){
            if( $work == $ligne['logo_project'] ){
              echo'<section id="projet_logo" class="text-center projet">';
              echo'<h2>Création de logo</h2>';
              echo'<div class="container">';
              echo'<div class="row">';
              $logo_project = str_replace(' ', '_', $ligne['logo_project']);
              echo'<a class="lightbox" href="#'.$logo_project.'_logo_max" id="'.$logo_project.'_logo">';
              echo'<img src="https://jubahadreb.com/img/works/logo_file/'.$ligne['logo_file'].'" alt="Logo pour '.$ligne['logo_project'].'" width="100%"/>';
              echo'</a>';
              echo'</div>';
              echo'</div>';

              echo'<div class="lightbox-target" id="'.$logo_project.'_logo_max">';
              echo'<img src="https://jubahadreb.com/img/works/logo_file/'.$ligne['logo_file'].'" alt="Logo pour '.$ligne['logo_project'].'"/>';
              echo'<a class="lightbox-close" href="#'.$logo_project.'_logo"></a>';
              echo'</div>';
              echo'</section>';
            }
          }

          /*......................................WEBSITE......................................*/
          
          $sql = $connexion->query(" SELECT website_project, website_file, website_link FROM websites WHERE website_project = '$work' ");

          while( $ligne = $sql->fetch() ){
            if( $work == $ligne['website_project'] ){
              echo'<section id="projet_siteweb" class="text-center projet">';
              echo'<h2>Développement d’un site web</h2>';
              echo'<div class="container projet_img">';
              echo'<div class="row">';
              $website_project = str_replace(' ', '_', $ligne['website_project']);
              echo'<a class="lightbox" href="#'.$website_project.'_website_max" id="'.$website_project.'_website">';
              echo'<img src="https://jubahadreb.com/img/works/website_file/'.$ligne['website_file'].'" alt="Site web pour '.$ligne['website_project'].'" width="100%"/>';
              echo'</a>';
              echo'</div>';
              echo'</div>';
           

              echo'<div class="lightbox-target" id="'.$website_project.'_website_max">';
              echo'<img src="https://jubahadreb.com/img/works/website_file/'.$ligne['website_file'].'" alt="Site web pour '.$ligne['website_project'].'"/>';
              echo'<a class="lightbox-close" href="#'.$website_project.'_website"></a>';
              echo'</div>';
              if($ligne['website_link'] != null){
                echo'<a href="'.$ligne['website_link'].'" target="_blank" class="plus">Voir le site</a>';
              }
              echo'</section>';
            }
          }

          /*......................................APPLICATION......................................*/

          $sql = $connexion->query(" SELECT application_project, application_file FROM applications WHERE application_project = '$work' ");

          while( $ligne = $sql->fetch() ){
            if( $work == $ligne['application_project'] ){

            echo'<section id="projet_application" class="text-center projet">';
            echo'<h2>Développement d’une application</h2>';
            echo'<div class="container">';
            echo'<div class="row">';
            $application_project = str_replace(' ', '_', $ligne['application_project']);
            echo'<a class="lightbox" href="#'.$application_project.'_application_max" id="'.$application_project.'_application">';
            echo'<img src="https://jubahadreb.com/img/works/application_file/'.$ligne['application_file'].'" alt="Application pour '.$ligne['application_project'].'" width="100%"/>';
            echo'</a>';
            echo'</div>';
            echo'</div>';

            echo'<div class="lightbox-target" id="'.$application_project.'_application_max">';
            echo'<img src="https://jubahadreb.com/img/works/application_file/'.$ligne['application_file'].'" alt="Application pour '.$ligne['application_project'].'"/>';
            echo'<a class="lightbox-close" href="#'.$application_project.'_application"></a>';
            echo'</div>';
            echo'</section>';

            }
          }

          /*......................................PRINTS......................................*/

          $sqlprint1 = $connexion->query(" SELECT print_project, print_file FROM prints WHERE print_project = '$work' ORDER BY print_id ");          

          $count = $sqlprint1->rowCount();
          if( $count > 0 ){
            echo'<section id="projet_print" class="text-center projet">';
            echo'<h2>Création en print</h2>';
            echo'<div class="container">';
            echo'<div class="row">';
          }

          $i=0;
          while( $ligne = $sqlprint1->fetch() ){

            $print_project = str_replace(' ', '_', $ligne['print_project']);
            if( $count == $i+1 AND $count % 2 != 0 ){
              echo'<a class="lightbox col-12" href="#'.$print_project.'_'.$i.'_print_max" id="'.$print_project.'_'.$i.'_print">';
              echo'<img src="https://jubahadreb.com/img/works/print_file/'.$ligne['print_file'].'" alt="Réalisation print pour '.$ligne['print_project'].'" width="100%" />';
              echo'</a>';
            }else{
              echo'<a class="lightbox col-12 col-md-6" href="#'.$print_project.'_'.$i.'_print_max" id="'.$print_project.'_'.$i.'_print">';
              echo'<img src="https://jubahadreb.com/img/works/print_file/'.$ligne['print_file'].'" alt="Réalisation print pour '.$ligne['print_project'].'" width="100%" />';
              echo'</a>';
              
            }
            $i++;
          }

          if( $count > 0 ){
           
            echo'</div>';
            echo'</div>';

          }

          $sqlprint2 = $connexion->query(" SELECT print_project, print_file FROM prints WHERE print_project = '$work' ORDER BY print_id ");

          $j=0;
          while( $ligne = $sqlprint2->fetch() ){

            $print_project = str_replace(' ', '_', $ligne['print_project']);
            echo'<div class="lightbox-target" id="'.$print_project.'_'.$j.'_print_max">';
            echo'<img src="https://jubahadreb.com/img/works/print_file/'.$ligne['print_file'].'" alt="Réalisation print pour '.$ligne['print_project'].'"/>';
            echo'<a class="lightbox-close" href="#'.$print_project.'_'.$j.'_print"></a>';
            echo'</div>';
            $j++;

          }

          if( $count > 0 ){
            echo'</section>';
          }

          /*......................................VIDEO......................................*/

          $sql = $connexion->query(" SELECT video_project, video_file FROM videos WHERE video_project = '$work' ");

          while( $ligne = $sql->fetch() ){
            if( $work == $ligne['video_project'] ){      

            echo'<section id="projet_video" class="container text-center projet">';
            echo'<h2>Création vidéo</h2>';
            echo'<video width="100%" controls>';
            echo'<source src="https://jubahadreb.com/img/works/video_file/'.$ligne['video_file'].'" title="Vidéo pour '.$ligne['video_project'].'" type="video/mp4">';
            echo'</video>';
            echo'</section>';

            }
          }

          /*......................................DESSINS......................................*/

          $sqldessins1 = $connexion->query(" SELECT dessin_project, dessin_file FROM dessins WHERE dessin_project = '$work' ORDER BY dessin_id ");          

          $count = $sqldessins1->rowCount();
          if( $count > 0 ){

            echo'<section id="projet_dessin" class="text-center projet">';
            echo'<h2>Dessins, art graphique</h2>';
            echo'<div class="container">';
            
          }

          $i=0;
          while( $ligne = $sqldessins1->fetch() ){

            echo'<div class="row">';
            $dessin_project = str_replace(' ', '_', $ligne['dessin_project']);
            echo'<a class="lightbox" href="#'.$dessin_project.'_'.$i.'_dessin_max" id="'.$dessin_project.'_'.$i.'_dessin">';
            echo'<img src="https://jubahadreb.com/img/works/dessin_file/'.$ligne['dessin_file'].'" alt="Dessin pour '.$ligne['dessin_project'].'" width="100%" />';
            echo'</a>';
            echo'</div>';
            $i++;

          }

          if( $count > 0 ){

            echo'</div>';

          }

          $sqldessins2 = $connexion->query(" SELECT dessin_project, dessin_file FROM dessins WHERE dessin_project = '$work' ORDER BY dessin_id "); 

          $j=0;
          while( $ligne = $sqldessins2->fetch() ){

            $dessin_project = str_replace(' ', '_', $ligne['dessin_project']);
            echo'<div class="lightbox-target" id="'.$dessin_project.'_'.$j.'_dessin_max">';
            echo'<img src="https://jubahadreb.com/img/works/dessin_file/'.$ligne['dessin_file'].'" alt="Dessin pour '.$ligne['dessin_project'].'"/>';
            echo'<a class="lightbox-close" href="#'.$dessin_project.'_'.$j.'_dessin"></a>';
            echo'</div>';
            $j++;

          }

          if( $count > 0 ){
            
            echo'</section>';

          }

          /*......................................PHOTOS......................................*/

          $sqlphotos1 = $connexion->query(" SELECT photo_project, photo_file FROM photos WHERE photo_project = '$work' ORDER BY photo_id ");          

          $count = $sqlphotos1->rowCount();
          if( $count > 0 ){

            echo'<section id="projet_photo" class="text-center projet">';
            echo'<h2>Créations photos</h2>';
            echo'<div class="container">';
            echo'<div class="row">';

          }

          $i=0;
          while( $ligne = $sqlphotos1->fetch() ){

            $photo_project = str_replace(' ', '_', $ligne['photo_project']);
            if( $count == $i+1 AND $count % 2 != 0 ){
              echo'<a class="lightbox col-12" href="#'.$photo_project.'_'.$i.'_photo_max" id="'.$photo_project.'_'.$i.'_photo">';
              echo'<img src="https://jubahadreb.com/img/works/photo_file/'.$ligne['photo_file'].'" alt="¨Photo pour '.$ligne['photo_project'].'" width="100%" />';
              echo'</a>';
            }else{
              echo'<a class="lightbox col-12 col-md-6" href="#'.$photo_project.'_'.$i.'_photo_max" id="'.$photo_project.'_'.$i.'_photo">';
              echo'<img src="https://jubahadreb.com/img/works/photo_file/'.$ligne['photo_file'].'" alt="¨Photo pour '.$ligne['photo_project'].'" width="100%" />';
              echo'</a>';
            }
            $i++;

          }

          if( $count > 0 ){

            echo'</div>';
            echo'</div>';

          }

          $sqlphotos2 = $connexion->query(" SELECT photo_project, photo_file FROM photos WHERE photo_project = '$work' ORDER BY photo_id "); 

          $j=0;
          while( $ligne = $sqlphotos2->fetch() ){

            $photo_project = str_replace(' ', '_', $ligne['photo_project']);
            echo'<div class="lightbox-target" id="'.$photo_project.'_'.$j.'_photo_max">';
            echo'<img src="https://jubahadreb.com/img/works/photo_file/'.$ligne['photo_file'].'" alt="¨Photo pour '.$ligne['photo_project'].'"/>';
            echo'<a class="lightbox-close" href="#'.$photo_project.'_'.$j.'_photo"></a>';
            echo'</div>';
            $j++;

          }

          if( $count > 0 ){
            
            echo'</section>';

          }

        ?>

      <section id="autre_projets" class="text-center projet">
        <h2>Autres projets digitaux</h2>
        <ul id="autre_projets_list" class="row">

        <?php

        $sql = $connexion->query(" SELECT work_id, work_project ,work_page, work_type, work_file FROM works WHERE work_page ='$p' AND work_id != '$a' ORDER BY rand() LIMIT 2 ");
            
        while( $ligne = $sql->fetch() ){  

          echo'<li class="col-12 col-md-6">';
          echo'<div class="autre_projet_container">';             
          echo'<img src="https://jubahadreb.com/img/works/work_file/'.$ligne['work_file'].'" alt="'.$ligne['work_project'].'" width="100%">';
          echo'<div class="container centered">';
          if( $acr AND $nmbr){
            echo'<a href="https://jubahadreb.com/Projet/'.$ligne['work_id'].'/'.$ligne['work_page'].'/'.$acr.'/'.$nmbr.'">';
          }else{
            echo'<a href="https://jubahadreb.com/Projet/'.$ligne['work_id'].'/'.$ligne['work_page'].'">';
          }
          echo'<p>'.$ligne['work_project'].'</p>';
          echo'<p>'.$ligne['work_type'].'</p>';
          echo'<p>Découvrir</p>';
          echo'</a>';
          echo'</div>';              
          echo'</div>';           
          echo'</li>';

        }

        ?>

        </ul>
      </section>
      <section id="Echanges" class="container text-center">
        <ul id="main_socials" class="row">
          <li class="col-md-1"></li>
          <li id="linkedin" class="col-6 col-md-5">
            <a href="https://www.linkedin.com/in/jubahadreb/" target="_blank">
              <img src="https://jubahadreb.com/img/linkedin.png" alt="linkedin" width="10%">              
            </a>
          </li>
          <li id="twitter" class="col-6 col-md-5">
            <a href="https://twitter.com/JubaHadreb" target="_blank">
              <img src="https://jubahadreb.com/img/twitter.png" alt="Twitter" width="10%">              
            </a>
          </li>
        </ul>
        <a id="ancre" href="#JubaHadreb"><img src="https://jubahadreb.com/img/ancre.png" alt="Bouton de retour en début de page" width="5%"></a>
      </section>
    </main>

    <footer class="text-center">
        <a href="https://jubahadreb.com/Accueil"><<span>/</span>jubahadreb></a>
    </footer>

  </body>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

</html>

<?php
  $pageContents =ob_get_contents();
  ob_end_clean();
  echo str_replace('<!--TITLE-->', $realtitle, $pageContents);
?>