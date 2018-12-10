<h1>Ajouter un nouveau Sujet</h1>
<div class='form-container'>
<form class="pure-form pure-form-stacked" method="POST">
    <fieldset>

        <label for="titre_sujet">Titre</label>
        <input  class="pure-input-1" id="titre_sujet" name="titre_sujet" type="text" placeholder="Titre" required>
        <label for="texte_sujet">Texte</label>
        <textarea  class="pure-input-1" id ="texte_sujet" name="texte_sujet" placeholder="Votre texte"></textarea>
        <input type="hidden" name="action" value="ajoutNouveauSujet"/>
        <button type="submit" class="pure-button pure-button-primary">Enregistrer Nouveau Sujet</button>
    </fieldset>
</form>
</div>