    <!--https://codepen.io/hudsonmarinho/pen/FHGeK-->

<!DOCTYPE html>
<html>

<head>

<meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/style.1.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/style_nav.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/normalize.css" type="text/css" media="screen">
    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/tables-min.css" type="text/css" media="screen">
    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/forms-min.css" type="text/css" media="screen">
    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/buttons-min.css" type="text/css" media="screen">

<!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>-->
<!--    <script src="script.js"></script>-->

</head>


<body>
      <header>
      <h1>JÉLÜ</h1>
        
          <ul class="snip1189">
        <li><a href="index.php?Sujets&action=forum">Accueil</a></li>
        <?php    
            if(isset($_SESSION['username_usager']) && $_SESSION["banni_usager"] == 0 ){    
                echo '<li><a href="index.php?Sujets&action=nouveausujet">Nouveau Sujet</a></li>';
            }
        ?>
        <?php 
            if(isset($_SESSION['username_usager']) && $_SESSION['admin_usager'] == 1 && $_SESSION["banni_usager"] == 0 )
                echo '<li><a href="index.php?Sujets&action=acces_administrateur">Page administrateur</a></li>';
        ?>
        
        <?php 
            if(!isset($_SESSION['username_usager'])){
                echo '<li><a href="index.php?Sujets&action=connexion">Se Connecter</a></li>';
            }else{
                echo '<li><a href="index.php?Sujets&action=logout">Se Déconnecter</a></li>';
            }
        ?>
       
    </ul>
          <!--div> <p>Veuillez naviguer vers le bas &#709;</p>
          </div-->

         
       
      </header>

      <section class="content">