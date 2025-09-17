<?php

// Exercices - Part 01
// Exo-boucles-01
$count = 5;
while ($count > 1) {
    echo $count;
    $count--;
}

?>

<?php

// Exo-boucles-03
$valDebut = 1;
$valFin = 5;
while ($valDebut < $valFin) {
    echo $valDebut;
    $valDebut++;
}

?>

<?php

$nombreMystère = rand(1, 20);
$count = 0;

echo $nombreMystère;

while (true) {
    $count++;
    $userInput = intval(readline("Veuillez entrer un nombre (tentative $count) : "));
    if($userInput != $nombreMystère) {
        if($userInput > $nombreMystère) {
            echo 'Le nombre mystère est plus petit!';
        } else {
            echo 'Le nombre mystère est plus grand!';
        }
    } else {
        echo "Félicitations, vous avez découvert le nombre mystère : $nombreMystère en $count tentatives.";
        break;
    }

}

?>

<?php

// Exercices - Part 01
// Exo-boucles-04
$laFineEquipe = ['Claudy', 'Jean-Claude', 'Laurence'];
foreach ($laFineEquipe as $member) {
    echo $member . "\n";
}

?>

<?php

// Exo-boucles-05
$laFineEquipe = ['Claudy', 'Jean-Claude', 'Laurence'];
foreach ($laFineEquipe as $key => $member) {
    echo "Nous sommes à l'index $key du tableau dont la valeur est $member \n";
}

?>

<?php

// Exo-boucles-06
$laFineEquipe = ['Claudy', 'Jean-Claude', 'Laurence'];
for ($i=0; $i < count($laFineEquipe); $i++) { 
    echo $laFineEquipe[$i] . "\n";
}

?>

<?php

// Exo-boucles-07
$laFineEquipe = ['Claudy', 'Jean-Claude', 'Laurence'];
for ($i=count($laFineEquipe)-1; $i >= 0; $i--) { 
    echo $laFineEquipe[$i] . "\n";
}

?>

<?php

// Exo-boucles-08
$matrice = [
    ['-1-', '-2-', '-3-'],
    ['-4-', '-5-', '-6-'],
    ['-7-', '-8-', '-9-']
];
$resultat = "";

for ($i=0; $i < 3; $i++) { 
    for ($j=0; $j < 3; $j++) { 
        $resultat .= $matrice[$i][$j]. " ";
    }
    $resultat .= "\n";
}

echo $resultat;

?>

<?php

// Exo-boucles-09
$matriceHauteurLargeur = 3;
$resultat = "";
for ($i=0; $i < $matriceHauteurLargeur; $i++) { 
    for ($j=0; $j < $matriceHauteurLargeur; $j++) { 
        $resultat .= "-" . ($i*$matriceHauteurLargeur + $j + 1) . "- ";
    }
    $resultat .= "\n";
}

echo $resultat;

?>