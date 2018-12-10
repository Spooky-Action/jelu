<?php $id = $_GET['idsujet']?>
<h1>Ajouter une nouvelle réponse</h1>
<div class='form-container'>
<form class="pure-form pure-form-stacked" method="POST">
    <fieldset>
        <label for="titre_reponse">Titre</label>
        <input class="pure-input-1" id="titre_reponse" name="titre_reponse" type="text" placeholder="Titre de la réponse"><br>
        <label for="texte_reponse">Texte</label>
        <textarea id ="texte_reponse" name="texte_reponse" class="pure-input-1" placeholder="Votre texte"></textarea>
        <input type='hidden' name='idsujet' value='<?=$id?>'>
        <input type="hidden" name="action" value="ajoutNouvelleReponse"/>
    </fieldset>
    <button class="pure-button pure-button-primary">Enregistrer Nouvelle Réponse</button>

</form>
</div>