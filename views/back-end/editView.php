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
                     <h1><a href="afficherBillets.php">Back Office</a></h1>
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
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Mon compte <b class="caret"></b></a>
                            <ul class="dropdown-menu animated fadeInUp">
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
                    <li class="current"><a href="index.php?action=listBillets"><i class="glyphicon glyphicon-home"></i> billets</a></li>
                    <li><a href="index.php?action=listBillets"><i class="glyphicon glyphicon-envelope"></i> Commentaires</a></li>
                    <li><a href="index.php?action=publierBillet"><i class="glyphicon glyphicon-pencil"></i> Publier</a></li>
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

                    <form method="POST" action="index.php" id="formSummerNote">
                        <input type="hidden" name="action" value="saveEdit">
                        <input type="hidden" name="idbillet" value="<?php echo $billet1->id() ?>" >
                        <input class="inputTitle" type="text" name="title" placeholder="Titre..." value ="<?php echo $billet1->titre(); ?>">
                        <textarea class="summernote" name="text"><?php echo $billet1->texte(); ?></textarea>
                        <input type="submit" class="btn btn-primary btn_publication" value="Modifier">
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
