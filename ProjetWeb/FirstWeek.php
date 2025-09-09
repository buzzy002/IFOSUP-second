
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


<?php

// Exercices - Part 02

$films = [
    'horreur' => [
        [
            'nomDuFilm' => 'Hellraiser',
            'realisateur' => 'Clive Barker',
            'annee' => '1987'
        ],
        [
            'nomDuFilm' => 'La Colline a des Yeux',
            'realisateur' => 'Alexandre Aja',
            'annee' => '2006'
        ]
    ],
    'comedie' => [
        [
            'nomDuFilm' => 'Dikkenek',
            'realisateur' => 'Olivier Van Hoofstadt',
            'annee' => '2006'
        ],
        [
            'nomDuFilm' => 'Le Dîner de cons',
            'realisateur' => 'Francis Veber',
            'annee' => '1998'
        ]
    ],
    'scienceFiction' => [
        [
            'nomDuFilm' => 'Blade Runner 2049',
            'realisateur' => 'Denis Villeneuve',
            'annee' => '2017'
        ],
        [
            'nomDuFilm' => 'Dune',
            'realisateur' => 'Denis',
        ],
        [
            'nomDuFilm' => 'Minority Report',
            'realisateur' => 'Steven Spielberg',
            'annee' => '2002'
        ]
    ]
];

print_r($films);

echo($films['horreur'][1]['annee'] . "\n");

?>