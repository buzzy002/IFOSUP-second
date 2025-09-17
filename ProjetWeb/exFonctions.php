<?php

// Exercices - Part 01
// Exo-fonctions-01
declare(strict_types=1);

function afficherMoyenne(array $nombres) : void {

    if(count($nombres) == 0) {
        echo 'Votre tableau est vide';
        return;
    }

    $moy = array_sum($nombres) / count($nombres);
    echo "La moyenne du tableau " . implode($nombres) . " est " . $moy;

}

$listeDeNombres = [8, 7, 6.5, 4.5, 7, 8];

afficherMoyenne($listeDeNombres);

?>

<?php

// Exo-fonctions-02
function calculerMoyenne(array $nombres) : ?float {

    if(count($nombres) == 0) {
        echo 'Votre tableau est vide';
        return null;
    }

    return array_sum($nombres) / count($nombres);

}

function convertirTableauEnChaineDeCaracteres(array $nombres) : string {

    $result = "";
    foreach ($nombres as $number) {
        if ($number == $nombres[0]) {
            $result .= $number;
        } else {
            $result .= ", " . $number;
        }
    }
    return $result;

}

$listeDeNombres = [8, 7, 6.5, 4.5, 7, 8];
$moyenne = calculerMoyenne($listeDeNombres);
$listeDeNombres = convertirTableauEnChaineDeCaracteres($listeDeNombres);
echo "La moyenne des nombres [ $listeDeNombres ] : $moyenne";

?>

<?php

// Exo-fonctions-03
function calculerSomme(array $nombres) : array {

    $sum = 0;
    $validData = [];
    foreach ($nombres as $key => $number) {
        if(is_int($number) || is_float($number)) {
            $sum += $number;
            $validData[] = $number;
        }
    }

    return [$sum, $validData];

}

function CalculerMoyenne2(array $nombres) : array {
    
    $data = calculerSomme($nombres);
    $moy = $data[0] / count($data[1]);

    return [$moy, $data[1]];

}

function convertirTableauEnChaineDeCaracteres2(array $nombres) : string {

    $result = "";
    foreach ($nombres as $number) {
        if ($number == $nombres[0]) {
            $result .= $number;
        } else {
            $result .= ", " . $number;
        }
    }
    return $result;

}

function afficherMoyenne2(array $nombres) : void {

    $moy = CalculerMoyenne2($nombres);
    $invalidData = array_values(array_diff($nombres, $moy[1]));
    $strData = convertirTableauEnChaineDeCaracteres2($nombres);

    echo "La moyenne de [ $strData ] est $moy[0] ( [ " . convertirTableauEnChaineDeCaracteres2($invalidData) . " ] étant invalides)";

}

$listeDeNombres = [8, 'trois', 7, 6.5, 'cinq', 4.5, 7, 8];
afficherMoyenne2($listeDeNombres);

?>

<?php

// Exo-fonctions-04
function calculerMontantTvaPrixHT(float $prixHT, float $tva) : float {

    return $prixHT * ($tva / 100);

}

function ajouterTVA(float $prixHT, $tva) : float {

    return $prixHT + calculerMontantTvaPrixHT($prixHT, $tva);

}

echo ajouterTva(100, 21);

?>