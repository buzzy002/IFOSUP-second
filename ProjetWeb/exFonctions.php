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

echo ajouterTva(100, 21) . "\n";
echo ajouterTva(100, 12);

?>

<?php

// Exo-fonctions-05
function calculerMontantTvaPrixTTC(float $prixTTC, float $tva) : float {

    return ($prixTTC * $tva) / (100 + $tva);

}

function retirerTva(float $prixTTC, float $tva) : float {

    $montantTVA = calculerMontantTvaPrixTTC($prixTTC, $tva);

    return round(($prixTTC - $montantTVA), 3);

}

echo retirerTva(100, 21) . "\n";
echo retirerTva(100, 12);

?>

<?php

// Exo-fonctions-06
function estValideEmail(string $email) : bool {

    if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } 
    return false;

}

$estEmailRempli = estValideEmail("claudy.focan@gmail.com");
var_dump($estEmailRempli);

$estEmailRempli = estValideEmail("claudy.focan");
var_dump($estEmailRempli);

?>

<?php

// Exo-fonctions-07
function respecteLongueurMinimale(string $entreeUtilisateur, int $longueurMin) : bool {

    return mb_strlen($entreeUtilisateur) >= $longueurMin;

}

$estLongueurValide = respecteLongueurMinimale("saperlipopette", 2);
var_dump($estLongueurValide );

$estLongueurValide = respecteLongueurMinimale("saperlipopette", 30);
var_dump($estLongueurValide );

?>

<?php

// Exo-fonctions-08
function respecteLongueurMaximale(string $entreeUtilisateur, int $longueurMax) : bool {

    return mb_strlen($entreeUtilisateur) <= $longueurMax;

}

$estLongueurValide = respecteLongueurMaximale("saperlipopette", 30);
var_dump($estLongueurValide );

$estLongueurValide = respecteLongueurMaximale("saperlipopette", 2);
var_dump($estLongueurValide );

?>

<?php

// Exo-fonctions-09
function respecteLongueurMinEtMax(string $entreeUtilisateur, int $longueurMin, int $longueurMax) : bool {

    return mb_strlen($entreeUtilisateur) >= $longueurMin && mb_strlen($entreeUtilisateur) <= $longueurMax;

}

$estLongueurValide = respecteLongueurMinEtMax("saperlipopette", 2, 30);
var_dump($estLongueurValide);

$estLongueurValide = respecteLongueurMinEtMax("saperlipopette", 2, 8);
var_dump($estLongueurValide);

?>

<?php

// Exo-fonctions-10
function estRempli(string $nomDuChampnom, array $entreesUtilisateur) : bool {

    $champTrouve = "";
    if(!array_key_exists($nomDuChampnom, $entreesUtilisateur)) {
        return false;
    }

    $champTrouve = trim(strval($entreesUtilisateur[$nomDuChampnom]));
    if($champTrouve == "" || empty($champTrouve)) {
        return false;
    }
    
    return true;
}

$entreesUtilisateur = [
    'nom' => 'Claudy',
    'email' => 'claudy.focan@gmail.com'
];

$estNomRempli = estRempli("nom", $entreesUtilisateur);
var_dump($estNomRempli);

$estPrenomRempli = estRempli("prenom", $entreesUtilisateur);
var_dump($estPrenomRempli);

?>

<?php

// Exo-fonctions-11
function verifierValiditeChamps(array $regleDesChamps, array $entreesUtilisateur) : array {

    $messageErreur = [];
    foreach ($regleDesChamps as $key=>$value) {
        if($value['requis'] && !estRempli($key, $entreesUtilisateur)) {
            $messageErreur[$key] = 'Le champ est requis';
        } else {
            if(estRempli('type', $value)) {
                if($value['type'] == 'email' && !estValideEmail($entreesUtilisateur['email'])) {
                    $messageErreur[$key] = "Email invalide!";
                }
            } 
            
            if(estRempli('longueurMin', $value) && estRempli('longueurMax', $value)) {
                if(!respecteLongueurMinEtMax($entreesUtilisateur[$key], $value['longueurMin'], $value['longueurMax'])) {
                    $messageErreur[$key] = "Ce champ doit doit comprendre entre {$value['longueurMin']} et {$value['longueurMax']} caractères!";
                }
            } elseif(estRempli('longueurMin', $value)) {
                if(!respecteLongueurMinimale($entreesUtilisateur[$key], $value['longueurMin'])) {
                    $messageErreur[$key] = "Ce champ doit comprendre au moins {$value['longueurMin']} caractères!";
                }
            } elseif(estRempli('longueurMax', $value)) {
                if(!respecteLongueurMaximale($entreesUtilisateur[$key], $value['longueurMax'])) {
                    $messageErreur[$key] = "Ce champ doit comprendre au maximum {$value['longueurMax']} caractères!";
                }
            }
        }
    }
    return $messageErreur;
}

$regleDesChamps = [
    'nom' => [
        'requis' => true,
        'longueurMin' => 2,
        'longueurMax' => 255
    ],
    'email' => [
        'requis' => true,
        'type' => 'email'
    ]
];

$entreesUtilisateurValides = [
    'nom' => 'Claudy',
    'email' => 'claudy.focan@gmail.com'
];

$entreesUtilisateurInvalides = [
    'nom' => 'a',
    'email' => 'claudy.focan'
];

$erreurs = verifierValiditeChamps($regleDesChamps, $entreesUtilisateurValides);
print_r($erreurs);

$erreurs = verifierValiditeChamps($regleDesChamps, $entreesUtilisateurInvalides);
print_r($erreurs);

?>