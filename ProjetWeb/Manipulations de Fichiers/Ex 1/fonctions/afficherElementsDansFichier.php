<?php

function afficherElementsFichier(string $nomDuFichier) : void {

    $file = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'textes' . DIRECTORY_SEPARATOR . $nomDuFichier, LOCK_EX);
    echo $file;

}

?>