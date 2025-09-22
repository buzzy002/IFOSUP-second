<?php

declare(strict_types=1);

// Exo-inclusion-de-fichiers-avec-include-et-require-01
/* require_once 'calculerSomme.php';
require_once 'calculerMoyenne.php';
require_once 'convertirTableauEnChaineDeCaracteres2.php';
require_once 'afficherMoyenne.php'; */

require_once 'exFonctions.php'; // Les require_once comme le prof voulait sont au-dessus mais j'avais la flemme de réorga mes fichiers

$listeDeNombres = [8, 'trois', 7, 6.5, 'cinq', 4.5, 7, 8];
afficherMoyenne2($listeDeNombres); // J'utilise afficherMoyenne2() car toutes mes fonctions sont dans le même fichier

?>

<?php

/* $ds = DIRECTORY_SEPARATOR;
require_once __DIR__ . $ds . 'scripts' . $ds . 'convert' . $ds . 'convertirTableauEnChaineDeCaracteres.php';
require_once __DIR__ . $ds . 'scripts' . $ds . 'math' . $ds . 'afficherMoyenne.php';
require_once __DIR__ . $ds . 'scripts' . $ds . 'math' . $ds . 'calculerSomme.php';
require_once __DIR__ . $ds . 'scripts' . $ds . 'math' . $ds . 'calculerMoyenne.php'; */

$listeDeNombres = [8, 'trois', 7, 6.5, 'cinq', 4.5, 7, 8];
afficherMoyenne2($listeDeNombres); // J'utilise afficherMoyenne2() car toutes mes fonctions sont dans le même fichier

?>