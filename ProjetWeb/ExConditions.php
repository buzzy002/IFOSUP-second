<?php

// Exo-conditions-01
$estPresent = false;
if ($estPresent) {
    echo 'Le ministre était présent';
} else {
    echo 'Le ministre était absent';
}

?>

<?php

// Exo-conditions-02
$estPresent = true;
echo ($estPresent) ? 'Le ministre était présent' : 'Le ministre était absent';

?>

<?php

// Exo-conditions-03
$etatEbriete = readline("Quel était l'état d'ébriété du ministre (0 = sobre, 1 = joyeux, 2 = ivre) : ");

if ($etatEbriete == '0') {
    echo 'Le ministre est sobre et responsable !';
} elseif ($etatEbriete == '1') {
    echo 'Le ministre est joyeux !';
} elseif ($etatEbriete == '2') {
    echo 'Le ministre est ivre !';
} else {
    echo 'Erreur ! État d\'ébriété inconnu !';
}

?>

<?php

// Exo-conditions-04
$etatEbriete = readline("Quel était l'état d'ébriété du ministre (0 = sobre, 1 = joyeux, 2 = ivre) : ");
switch ($etatEbriete) {
    case '0':
        echo 'Le ministre est sobre et responsable !';
        break;
    case '1':
        echo 'Le ministre est joyeux !';
        break;
    case '2':
        echo 'Le ministre est ivre !';
        break;
    default:
        echo 'Erreur ! État d\'ébriété inconnu !';
}

?>

<?php

// Exo-conditions-05
$estPresent = true;
$aFaitPipi = true;
$estEmeche = false;

if (!$estPresent) {
    echo 'Le ministre n\'était pas là pendant l\'incident.';
} else {
    if ($aFaitPipi && $estEmeche) {
        echo 'Le ministre ne se souvient pas de tout à cause de son état d\'ébriété.';
    } elseif ($aFaitPipi && !$estEmeche) {
        echo 'Le ministre était en train de jouer un air de guitare devant ses invités.';
    } else {
        echo 'Le ministre n\'était pas là pendant l\'incident.';
    }
}

?>