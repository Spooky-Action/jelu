<?php 
	if($_SESSION['admin_usager'] && !$_SESSION['banni_usager']){
?>
<h1>Gestion Administrateur</h1>
<div class="container">
<form method="post">
<table class="pure-table">
    <thead><th>Nom d'Usager</th><th>Statut</th></thead>

<?php 
    foreach($data['Usager']as $usager){
        echo '<tr><td> ' . $usager->username_usager . ' </td>';
        echo'<td>';
        echo '<input type="radio" name="usager['.$usager->username_usager.']" value="0" ';
        if($usager->banni_usager == '0'){
            echo 'checked';
        }
        echo '>';
        echo '<label for="usager['.$usager->username_usager.']">Normal</label>';
        echo '<input  type="radio" name="usager['.$usager->username_usager.']" value="1"';
        if($usager->banni_usager == '1'){
            echo 'checked';
        }
        echo '>';
        echo '<label for="usager['.$usager->username_usager.']">Banni</label>';
        echo '</td>';
        echo '</tr>';
    }

// ATTENTION: Ici, lorsqu'on soumets les changements, la page semble se rafraichir plus rapidement que la db s'update et on est rediriger vers la meme page avec les anciennes valeurs!
// Mais en verifiant dans la db ou en fesant un refresh de la page, on voit quils ont bel et bien ete mis a jour. 
    

?>
</table>

<input type='hidden' name='action' value='majstatut'>

<input class='pure-button pure-button-primary' type='submit' value='Mettre a jour les droits dusagers'>

<p>Veuillez noter qu'une fois qu'on met a jour les droits des usagers, on doit rafraichir la page a nouveau pour voir les bonnes valeurs dans le tableau. Pour eviter d'envoyer le formulaire a nouveau, utilisez le menu.</p>

</form>
</div>

<?php 

}else{

?>

<div class='form-container'>Vous n'avez plus acces a la page admin puisque vous avez ete banni.</div>

<?php
}

?>