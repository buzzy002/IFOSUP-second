
<?php
// Exercices - Part 01
// Exo-variables-01

$eleve1 = 'Sébastien';
$eleve2 = 'Martine';
$eleve1NoteMath = 4;
$eleve1NoteFrancais = 2;

echo "Comme dirait $eleve2 : \" $eleve1 est un cancre, il n' a que " . (($eleve1NoteMath + $eleve1NoteFrancais) / 2) . " de moyenne \" \n";

?>


<?php
// Exo-variables-02

$claudyVousDitBonjour = 'coucou petite perruche !';
echo $claudyVousDitBonjour;
echo "\n";

$claudyVousDitAurevoir = str_replace("coucou", "Au revoir", $claudyVousDitBonjour);
echo $claudyVousDitAurevoir;
echo "\n";


echo ucfirst($claudyVousDitBonjour);
echo "\n";

echo strtoupper($claudyVousDitBonjour);
echo "\n";

?>