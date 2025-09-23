<?php

function importerJsonEnTableau(string $cheminDuFichierJson) : array {

    $fileContent = file_get_contents($cheminDuFichierJson);
    return json_decode($fileContent, true);

}

?>