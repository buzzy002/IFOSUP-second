<?php 
$Title = "Contact";
require_once __DIR__ . DIRECTORY_SEPARATOR . 'header.php'; ?>
    <h1>Contact</h1>

    <form action="contact.php" method="post">
        <!-- Champ nom -->
        <label for="nom">Nom <span style="color:red;">*</span></label>
        <input 
            type="text" 
            id="nom" 
            name="nom" 
            required 
            minlength="2" 
            maxlength="255" 
            placeholder="Votre nom">

        <!-- Champ prénom -->
        <label for="prenom">Prénom</label>
        <input 
            type="text" 
            id="prenom" 
            name="prenom" 
            minlength="2" 
            maxlength="255" 
            placeholder="Votre prénom (facultatif)">

        <!-- Champ email -->
        <label for="email">Email <span style="color:red;">*</span></label>
        <input 
            type="email" 
            id="email" 
            name="email" 
            required 
            placeholder="votre.email@example.com">

        <!-- Champ message -->
        <label for="message">Message <span style="color:red;">*</span></label>
        <textarea 
            id="message" 
            name="message" 
            required 
            minlength="10" 
            maxlength="3000" 
            placeholder="Votre message..."></textarea>

        <!-- Bouton d’envoi -->
        <button type="submit">Envoyer</button>
    </form>
<?php require_once __DIR__ . DIRECTORY_SEPARATOR . 'footer.php'; ?>