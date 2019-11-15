<!DOCTYPE html>
<html>
  <head>
    <title> Publier</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="public/styles/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="public/styles/styles_back/styles.css" rel="stylesheet">

    <link href='https://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css' rel='stylesheet' media='screen'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.css' rel='stylesheet'>
    <link rel='stylesheet' type='text/css' href='public/styles/vendors/bootstrap-wysihtml5/src/bootstrap-wysihtml5.css'></link>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="header">
         <div class="container">
            <div class="row">
               <div class="col-md-5">
                  <!-- Logo -->
                  <div class="logo">
                     <h1><a href="index.php?action=listBillets">Back Office</a></h1>
                  </div>
               </div>
               <div class="col-md-5">
                  <div class="row">
                    <div class="col-lg-12">
                    </div>
                  </div>
               </div>
               <div class="col-md-2">
                  <div class="navbar navbar-inverse" role="banner">
                      <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
                        <ul class="nav navbar-nav">
                          <li class="dropdown">
                            <a href="#" class="dropdown-toggle lien_menu_compte" data-toggle="dropdown"> Mon compte <b class="caret"></b></a>
                            <ul class="dropdown-menu animated fadeInUp menu_compte">
                              <li><a href="profile.html"> Profile </a></li>
                              <li><a href="login.html"> Déconnexion </a></li>
                            </ul>
                          </li>
                        </ul>
                      </nav>
                  </div>
               </div>
            </div>
         </div>
    </div>

    <div class="page-content">
        <div class="row">
          <div class="col-md-2">
            <div class="sidebar content-box" style="display: block;">
                <ul class="nav">
                    <!-- Main menu -->
                    <li class="current"><a href="index.php?action=page_liste_billets"><i class="glyphicon glyphicon-home"></i> billets</a></li>
                    <li><a href="index.php?action=page_liste_commentaires"><i class="glyphicon glyphicon-envelope"></i> Commentaires</a></li>
                    <li><a href="index.php?action=page_publier_billet"><i class="glyphicon glyphicon-pencil"></i> Publier</a></li>
                    <li><a href="index.php"><i class="glyphicon glyphicon-pencil"></i> Revenir sur le site</a></li>
                </ul>
             </div>
           </div>
        
           <div class="col-md-10">
                <div class="content-box-large">
                    <div class="panel-heading">
                        <div class="panel-title">Editeur de texte</div>
                        <div class="panel-options">
                            <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
                            <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
                        </div>
                    </div>
                    <?php 
                        if (!empty($_SESSION['error_billet'])) {
                          echo "<div class='erreur'>". $_SESSION['error_billet'] ."</div>";
                        }
                        unset($_SESSION['error_billet']);
                    ?>
                    <form method="POST" action="index.php?action=verification_billet" id="formSummerNote" enctype="multipart/form-data">
                       <!--  <input type="hidden" name="action" value="checkBillet" /> -->
                        <input class="inputTitle" type="text" name="titre" placeholder="Entrer votre titre ..." <?php if (!empty($_SESSION['titre'])) {
                          echo 'value='.$_SESSION['titre'];
                          unset($_SESSION['titre']);
                        } ?> >
                        <textarea class="summernote" name="texte" placeholder="Entrer votre texte ..."><?php if (!empty($_SESSION['texte'])) {
                          echo $_SESSION['texte'];
                          unset($_SESSION['texte']);
                        } ?> </textarea>
                        <input type="file" name="image" class="inputFile">
                        <input type="submit" name="publier" class="btn btn-primary btn_publication" value="Publier">
                    </form>
                </div>
            </div>
        </div>   
    </div>



    <footer>
         <div class="container">
         
            <div class="copy text-center">
               Copyright 2014 <a href='#'>Website</a>
            </div>
            
         </div>
      </footer>
  
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../public/styles/bootstrap/js/bootstrap.min.js"></script>
    <script src="../public/styles/js/js_back/custom.js"></script>
    <script src='https://code.jquery.com/ui/1.10.3/jquery-ui.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.js'></script>
    <!-- <script src='public/styles/vendors/ckeditor/ckeditor.js'></script> -->
    <!--<script src='public/styles/vendors/ckeditor/adapters/jquery.js'></script> -->
    <!-- <script type='text/javascript' src='public/styles/vendors/tinymce/js/tinymce/tinymce.min.js'></script> -->
    <script src='public/js/js_back/editors.js'></script>
  </body>
</html>
