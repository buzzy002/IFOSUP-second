<?php

declare(strict_types=1);

define ("DS", DIRECTORY_SEPARATOR);

require_once __DIR__ . DS . 'fonctions' . DS . 'enregistrerTableauEnJson.php';
require_once __DIR__ . DS . 'fonctions' . DS . 'importerJsonEnTableau.php';

$cheminDictionnaire = __DIR__ . DS . 'bdd' . DS . 'dictionnaire.json';

$dictionnaire = importerJsonEnTableau($cheminDictionnaire);

$dictionnaire['nourriture'][] = 'poire';
$dictionnaire['animaux'][] = 'grenouille';
$dictionnaire['professions'][] = 'couvreur';

enregistrerTableauEnJson($cheminDictionnaire, $dictionnaire);

?>