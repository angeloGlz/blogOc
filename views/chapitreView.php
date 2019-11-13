<!DOCTYPE html>
<!--
Template Name: Preevent
Author: <a href="http://www.os-templates.com/">OS Templates</a>
Author URI: http://www.os-templates.com/
Licence: Free to use under our free template licence terms
Licence URI: http://www.os-templates.com/template-terms
-->
<html>
<head>
<title>Jean Forteroche</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="public/styles/styles_front/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top">
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- Top Background Image Wrapper -->
<div class="bgded overlay" style="background-image:url('public/images/alaska.jpg');"> 
  <!-- ################################################################################################ -->
  <div class="wrapper row1">
    <header id="header" class="hoc clear"> 
      <!-- ################################################################################################ -->
      <div id="logo" class="fl_left">
        <h1><a href="index.php">Jean Forteroche</a></h1>
      </div>
      <!-- ################################################################################################ -->
      <nav id="mainav" class="fl_right">
        <ul class="clear">
          <li class="active"><a href="index.php">Accueil</a></li>
        </ul>
      </nav>
      <!-- ################################################################################################ -->
    </header>
  </div>
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row3 bloc_chapitres">
  <section class="hoc container clear"> 
    <!-- ################################################################################################ -->
    <div class="sectiontitle center">
      <img src="public/images/<?php echo $billet->image(); ?>">
      <h3 class="heading"><?php echo $billet1->titre(); ?></h3>
      <p> <?php echo $billet1->texte(); ?></p>
    </div>
    <!-- ################################################################################################ -->

    <div class="bloc_com">
      <?php
      if (!empty($comChapitre)) {
        foreach ($comChapitre as $com) { ?>
          <div <?php if($com->getSignaler() == 1){ echo "class=com_signaler";} else{echo "class=com";} ?>>
            <div class="pseudo_date">
              <p class="pseudo">Posté par : <strong><?php echo $com->getPseudo(); ?></strong> le <?php echo $com->getDate(); ?></p>
              <button><a href="index?action=signalerCommentaire&commentaire=<?php echo $com->getId()?>&billet=<?php echo $billet1->id(); ?>">signaler</a></button>
            </div>
            <p class="texteCom"><?php echo $com->getCommentaire(); ?></p>
          </div>
      <?php  
        }
      }
      ?>
      
    </div>

    <h3>Commentaires</h3>
    <div class="blocForm">
        <form method="POST" action="index.php?action=checkComExist">
            <label>Pseudo
                <input type="text" name="pseudo" class="inputFront" required="true">
            </label>
            <label>Commentaire
                <textarea name="commentaire" class="inputFront textareaFront" required="true"></textarea> 
            </label> 
            <input type="hidden" name="idBillet" value="<?php echo $billet1->id(); ?>">
            <input type="submit" name="btnPublierCom" value="Publier">
        </form>
    </div>
  </section>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row4 bgded overlay" style="background-image:url('accueil/images/demo/backgrounds/04.png');">
  <footer id="footer" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <div class="sectiontitle">
      <h3 class="heading">Preevent</h3>
      <ul class="nospace inline pushright uppercase">
        <li><a href="index.html"><i class="fa fa-lg fa-home"></i></a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Contact</a></li>
        <li><a href="#">Terms</a></li>
        <li><a href="#">Privacy</a></li>
        <li><a href="#">Cookies</a></li>
        <li><a href="#">Disclaimer</a></li>
        <li><a href="#">Online Shop</a></li>
        <li><a href="#">Sitemap</a></li>
      </ul>
      <hr>
    </div>
    <!-- ################################################################################################ -->
    <div class="one_quarter first">
      <h6 class="heading">Dictum aliquam</h6>
      <p>At feugiat nunc donec a est et metus aliquam tristique aenean eu elit vitae lectus mollis justo donec luctus vehicula lacus non.</p>
      <p>Pharetra tortor laoreet eget ut congue erat at neque dignissim suscipit pretium sem rhoncus aliquam tincidunt.</p>
    </div>
    <div class="one_quarter">
      <h6 class="heading">Lacinia elementum</h6>
      <ul class="nospace linklist contact">
        <li><i class="fa fa-map-marker"></i>
          <address>
          Street Name &amp; Number, Town, Postcode/Zip
          </address>
        </li>
        <li><i class="fa fa-phone"></i> +00 (123) 456 7890<br>
          +00 (123) 456 7890</li>
        <li><i class="fa fa-fax"></i> +00 (123) 456 7890</li>
        <li><i class="fa fa-envelope-o"></i> info@domain.com</li>
      </ul>
    </div>
    <div class="one_quarter">
      <h6 class="heading">Vel diam tempor</h6>
      <ul class="nospace linklist">
        <li><a href="#">Sed lacus turpis sed nisi</a></li>
        <li><a href="#">Consequat sodales mauris</a></li>
        <li><a href="#">Massa aliquam quis tortor</a></li>
        <li><a href="#">Bibendum arcu in tristique</a></li>
        <li><a href="#">Interdum eget sapien nec</a></li>
      </ul>
    </div>
    <div class="one_quarter">
      <h6 class="heading">Vulputate nulla</h6>
      <ul class="nospace linklist">
        <li>
          <article>
            <h6 class="nospace font-x1"><a href="#">Vehicula augue</a></h6>
            <time class="font-xs block btmspace-10" datetime="2045-04-06">Friday, 6<sup>th</sup> April 2045</time>
            <p class="nospace">Arcu ut condimentum in erat tincidunt quis accumsan [&hellip;]</p>
          </article>
        </li>
        <li>
          <article>
            <h6 class="nospace font-x1"><a href="#">Condimentum aliquet</a></h6>
            <time class="font-xs block btmspace-10" datetime="2045-04-05">Thursday, 5<sup>th</sup> April 2045</time>
            <p class="nospace">Ultricies quis suscipit praesent euismod imperdiet ornare [&hellip;]</p>
          </article>
        </li>
      </ul>
    </div>
    <!-- ################################################################################################ -->
  </footer>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row5">
  <div id="copyright" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <p class="fl_left">Copyright &copy; 2016 - All Rights Reserved - <a href="#">Domain Name</a></p>
    <p class="fl_right">Template by <a target="_blank" href="http://www.os-templates.com/" title="Free Website Templates">OS Templates</a></p>
    <!-- ################################################################################################ -->
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="public/js/scripts_front/jquery.min.js"></script>
<script src="public/js/scripts_front/jquery.backtotop.js"></script>
<script src="public/js/scripts_front/jquery.mobilemenu.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</body>
</html>