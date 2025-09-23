<?php

function ecrireElementsDansFichier(string $nomDuFichier, array $phrases) : void {
    
    $file = fopen(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'textes' . DIRECTORY_SEPARATOR . $nomDuFichier, 'w');
    if(flock($file, LOCK_EX)) {

        foreach($phrases as $phrase) {

            fwrite($file, $phrase . "\n");

        }

        flock($file, LOCK_UN);

    } else {

        echo "Le fichier est occupé par un autre utilisateur";

    }

    fclose($file);

}

?>