<h1 id='forum'><?= $data['Sujets']->getTitreSujets() ?> par <?= $data['Sujets']->username_usager ?> </h1>
<div class='container'>
<table class="pure-table pure-table-horizontal">
   
    <thead>
    <tr>
        <th>Titre Sujet</th>
        <th>Texte Sujet</th>
        <th>Date de Creation du Sujet</th>
        <th>Auteur</th>
     </tr>
</thead>
<?php 
    // var_dump($data);

        echo '<tr>';
        echo '<td><a href="index.php?Sujets&action=sujet&sujetid='.$data['Sujets']->getIdSujets().'">'.$data['Sujets']->getTitreSujets().'</a></td>';
        echo '<td>'.$data['Sujets']->getTexteSujets().'</td>';
        echo '<td>'.$data['Sujets']->date_creation_sujet.'</td>';
        echo '<td>'.$data['Sujets']->username_usager.'</td>';
        echo '</tr>';   ?>
  
        <thead>
        <tr>
            <th>Titre Reponse</th>
            <th>Texte Reponse</th>
            <th>Date </th>
            <th>Auteur</th>
         </tr>         
        </thead>
        
        <?php

        // var_dump($data['Reponse']);

        foreach($data['Reponse'] as $reponse){
            echo '<tr>';
            echo '<td>'.$reponse->getTitreReponse().'</td>';
            echo '<td>'.$reponse->getTexteReponse().'</td>';
            echo '<td>'.$reponse->getDateCreationReponse().'</td>';
            echo '<td>'.$reponse->getUsernameUsager().'</td>';
            echo '</tr>';

        }
    ?>
</tbody>
</table>

        <a href="index.php?Sujets&action=nouvellereponse&idsujet=<?= $data['Sujets']->getIdSujets()?>" class="pure-button pure-button-primary">Ajouter une reponse</a>
</div>

