<?php

declare(strict_types=1);

require_once 'fonctions' . DIRECTORY_SEPARATOR . 'ecrireElementsDansFichier.php';
require_once 'fonctions' . DIRECTORY_SEPARATOR . 'afficherElementsDansFichier.php';

$listeDePhrases = [
    "Claudy aime les poneys.",
    "Jean-Claude est nerveux.",
    "Laurence n'aime pas les kékés.",
    "Steph est l'ami de Jean-Claude."
];

$nomFichier = 'Exo_manipulation_de_fichiers_1.txt';

ecrireElementsDansFichier($nomFichier, $listeDePhrases);

afficherElementsFichier($nomFichier);

?>