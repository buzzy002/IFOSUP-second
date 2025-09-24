<?php

declare(strict_types=1);

/*
    Ce fichier contient la fonction principale du jeu du pendu.

    Vous êtes encouragé à organiser les fonctions secondaires dans d'autres fichiers 
    et à utiliser les outils d'importation appropriés pour structurer votre code de manière claire et efficace.
*/

define("DS", DIRECTORY_SEPARATOR);

require_once __DIR__ . DS . 'word.php';
require_once __DIR__ . DS . 'display.php';
require_once __DIR__ . DS . 'gameLogic.php';

/**
 * Main loop for the game of the hangman
 * 
 * @return void
 */
function Game() : void {

    $filePath = __DIR__ . DS . '..' . DS . 'data' . DS . 'dictionnaire_avec_accents.json';

    $categories = getCategories($filePath);
    $categoryChosen = displayAskUserCategory($categories);

    $wordToFind = chooseWord($filePath, $categoryChosen);
    $wordToFindProccessed = processWord($wordToFind);
    $currentStatusOfWordToFind = createCurrentStatusOfWordToFind($wordToFindProccessed);
    $alreadyProposedLetters = [];

    $remainingLives = 6;
    $roundNumber = 1;
    
    clearConsole();

    while($remainingLives > 0 && !hasWon($currentStatusOfWordToFind)) {

        displayNexTurn($remainingLives, $alreadyProposedLetters, $currentStatusOfWordToFind, $roundNumber);

        $newLetter = displayAskUserLetter();

        if(isInWord($newLetter, $wordToFindProccessed)) {

            addLetterToCurrentStatusOfWordToFind($newLetter, $wordToFindProccessed, $currentStatusOfWordToFind);
            displayLetterPresence($newLetter, true);

        } 
        else {

            displayLetterPresence($newLetter, false);
            removeLife($remainingLives);

        }
        addLetterToAlreadyProposedLetters($newLetter, $alreadyProposedLetters);
        $roundNumber++;

        clearConsole();
    }

    if(hasWon($currentStatusOfWordToFind)) { displayEndOfGameMessage($wordToFind, true); }
    else { displayEndOfGameMessage($wordToFind, false); }

}

?>