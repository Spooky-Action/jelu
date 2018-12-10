<?php
//    define("RACINE", $_SERVER["DOCUMENT_ROOT"] . "/ProjetMVC/");
//    define("RACINE", "");
//    définition des constantes de connexion à la base de données
//    define("DBTYPE", "mysql");
//    define("DBNAME", "pratique_film");
//    define("HOST", "localhost");
//    define("USER", "root");
//    define("PWD", "");

    
//-------------------------------------------------------------------
// Connection en local
//-------------------------------------------------------------------
//  define("RACINE", $_SERVER["DOCUMENT_ROOT"] . "/forum_prog_mvc/");
 // define("RACINE", "");
    // définition des constantes de connexion à la base de données
//  define("DBTYPE", "mysql");
 // define("DBNAME", "e1895029");
 // define("HOST", "localhost");
//  define("USER", "root");
//  define("PWD", "");


//-------------------------------------------------------------------
// Connection WebDev
//-------------------------------------------------------------------
     //define("RACINE", $_SERVER["DOCUMENT_ROOT"] . "/forum_prog_mvc-vfinal/");
    define("RACINE", "");
     //définition des constantes de connexion à la base de données
     define("DBTYPE", "mysql");
     define("DBNAME", "e1895029");
     define("HOST", "localhost");
     define("USER", "e1895029");
     //define("USER", "root");

     define("PWD", "EoqabVRs43bJjcURddHe");
     //define("PWD", "");


    //définition de la fonction d'autoload
    function mon_autoloader($classe)
    {
        $repertoires = array(RACINE . "controleurs/",
                            RACINE . "modeles/",
                            RACINE . "vues/");
        
        foreach($repertoires as $rep)
        {
            if(file_exists($rep . $classe . ".php"))
            {
                require_once($rep . $classe . ".php");
                return;
            }
        }
    }

    spl_autoload_register("mon_autoloader");
?>