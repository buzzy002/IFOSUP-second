<?php

function enregistrerTableauEnJson(string $cheminFichierDestination, array $tableau) : void {

    $fileContent = json_encode($tableau, JSON_PRETTY_PRINT);
    file_put_contents($cheminFichierDestination, $fileContent);

}

?>