<?php

declare(strict_types=1);

require_once __DIR__ . DS . 'gameLogic.php';

/**
 * Display the current status of the game for the player 
 * 
 * @param int $remainingLives The remaining lives of the player
 * @param array $alreadyProposedLetters The letters already found by the player
 * @param array $currentStatusOfWordToFind The current status (found and unfound letters) of the word to find
 * @param int $roundNumber The number of the round we are at
 * 
 * @return void 
 */
function displayNexTurn(int $remainingLives, array $alreadyProposedLetters, array $currentStatusOfWordToFind, int $roundNumber) : void {

    if($roundNumber == 1) { echo "Bienvenue dans le jeu du pendu\n"; }
    else { clearConsole(); }
    
    $alreadyProposedLettersToString = join(" ", $alreadyProposedLetters);
    $currentStatusOfWordToFindToString = join(" ", $currentStatusOfWordToFind);

    echo "Vies restantes : {$remainingLives} \n";
    echo "Lettres proposées : [ {$alreadyProposedLettersToString} ] \n";
    echo "Mot : {$currentStatusOfWordToFindToString} \n";

    echo "\n";

}

/**
 * Display to the user if a letter is present or not in the word
 * 
 * @param string $letter The letter to display
 * @param bool $letterPresentInWord Indicate if the letter is present in the word or not
 * 
 * @return void
 */
function displayLetterPresence(string $letter, bool $letterPresentInWord) : void {

    if($letterPresentInWord) { echo "La lettre \"{$letter}\" se trouve dans le mot mystère !\n"; } 
    else { echo "La lettre \"{$letter}\" ne se trouve pas dans le mot mystère ! Vous perdez une vie !\n"; }

    readline('Veuillez appuyer sur ENTER pour passer au tour suivant...');

}

/**
 * Ask user a new letter until it's a valid one
 * 
 * @return string The valid user input
 */
function displayAskUserLetter() : string {

    $userInput = readline('Proposez une lettre : ');

    while(!$userInput || !isValidInput($userInput)) {

        if(!$userInput) { $userInput = readline('Veuillez proposer une lettre : '); }
        else { $userInput = readline('Ce que vous avez proposé n\'est pas valide, veuillez proposer uniquement une lettre minuscule : '); }

    }

    return $userInput;

}

/**
 * Ask user for a category of word
 * 
 * @param array $categories The possible categories for the word
 * 
 * @return ?string $category The chosen category (null if none chosen)
 */
function displayAskUserCategory(array $categories) : ?string {

    echo "Vous pouvez choisir une catégorie pour le mot à trouver\n";
    echo "Les catégories possibles sont :\n";

    foreach($categories as $category) { echo "- {$category}\n"; }

    $userInput = readline("Veuillez choisir parmi ces catégories. Si vous ne voulez pas choisir, appuyer sur ENTER : ");

    if(in_array($userInput, $categories)) { return $userInput; }
    
    return null;

}

/**
 * Display the end of the game message
 * 
 * @param string $word The word to find
 * @param bool $hasWon If the player has won or not
 * 
 * @return void
 */
function displayEndOfGameMessage(string $word, bool $hasWon) : void {

    if($hasWon) { echo "Vous avez gagné !!! Le mot à trouver était {$word} !\n"; }
    else { echo "Vous avez perdu :( Le mot à trouver était {$word} !\n"; }
    
    readline('Le jeu va se terminer, veuillez appuyer sur ENTER...');

}

/**
 * Clear the console
 * 
 * @return void
 */
function clearConsole() : void {

    if(PHP_OS_FAMILY == 'Windows') { system('cls'); }
    else { system('clear'); }

}

?>