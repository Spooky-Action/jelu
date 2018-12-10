<?php
    if(isset($_SESSION["banni_usager"]) && $_SESSION['banni_usager']){
        echo "<div class='container form-container'>Vous avez été banni! Contacter un administrateur si vous voulez avoir acces au site.</div>";
    }
    else if (isset($_SESSION["username_usager"]) && $_SESSION['banni_usager'] == '0'){

   
?>

<h1 id='forum'>Forum</h1>
<div class='container'>
<table class="pure-table pure-table-horizontal">
    <tr>
    <thead>
        <th>Titre Sujet</th>
        <th>Texte Sujet</th>
        <th>Date de Creation du Sujet</th>
        <th>Auteur</th>
        <th>Nombre de reponses</th>
        <th>Date de la derniere Reponses</th>
        <th>Auteur de la derniere reponse</th>
        </thead>
</tr>
<tbody>
<?php 
    // var_dump($data);

    foreach($data as $row){
        echo '<tr>';
        echo '<td><a href="index.php?Sujets&action=sujet&sujetid='.$row->getIdSujets().'">'.$row->getTitreSujets().'</a></td>';
        echo '<td>'.$row->getTexteSujets().'</td>';
        echo '<td>'.$row->date_creation_sujet.'</td>';
        echo '<td>'.$row->username_usager.'</td>';
        echo '<td>'.$row->nombre_reponse.'</td>';
        echo '<td>'.$row->date_derniere_reponse.'</td>';
        echo '<td>'.$row->username_usager_reponse.'</td>';
        echo '</tr>';   

    }


    
}else{
    echo "<div class='container form-container'>Oups! Cette combinaison nom d'usager et mot de passe ne correspondent pas! <br> <a class='pure-button pure-button-primary' href='index.php?Sujets&action=connexion'>Essayer a nouveau</a></div>";
}    


?>






</tbody>
</table>
</div>