<?php

declare(strict_types=1);

/**
 * Add a letter to the already proposed letters list and sort it alphabetically
 * 
 * @param string $letter The letter to add
 * @param array &$alreadyProposedLetters The array to add the letter to
 * 
 * @return void
 */
function addLetterToAlreadyProposedLetters(string $letter, array &$alreadyProposedLetters) : void {

    if(in_array($letter, $alreadyProposedLetters)) { return; }

    $alreadyProposedLetters[] = $letter;
    sort($alreadyProposedLetters);
    
}

/**
 * Verify if a letter is in a word
 * 
 * @param string $letter The letter to check
 * @param string $wordProcessed The word to check in without  accent or special character
 * 
 * @return bool TRUE if the letter is in the word, FALSE otherwise
 */
function isInWord(string $letter, string $wordProcessed) : bool {

    return in_array($letter, str_split($wordProcessed));

}

/**
 * Add the letter to status of the word to find
 * 
 * @param string $letter The letter to add
 * @param string $word The word to find
 * @param array &$currentStatusOfWordToFind The current status of the word to find
 * 
 * @return void
 */
function addLetterToCurrentStatusOfWordToFind(string $letter, string $word, array &$currentStatusOfWordToFind) : void {

    $indexOfLetterInWord = [];
    $wordArray = str_split($word);

    for($i = 0; $i < strlen($word); $i++) {

        if($wordArray[$i] == $letter) { $indexOfLetterInWord[] = $i; }

    }

    foreach($indexOfLetterInWord as $index) { $currentStatusOfWordToFind[$index] = $letter; }

}

/**
 * Remove a life from the remaining lives
 * 
 * @param int &$remainingLives The remaining lives of the player
 * 
 * @return void
 */
function removeLife(int &$remainingLives) : void {

    $remainingLives--;

}

/**
 * Check if the user input is valid (only lower case alphabetic letters)
 * 
 * @param string $userInput The input from the user
 * 
 * @return bool TRUE if the input is valid, FALSE otherwise
 */
function isValidInput(string $userInput) : bool {

    return mb_strlen($userInput) == 1 && ($userInput >= 'a' && $userInput <= 'z');

}

/**
 * Check if the player has won 
 * 
 * @param array $currentStatusOfWordToFind The status of the word to find
 * 
 * @return bool TRUE if the player has won, FALSE otherwise
 */
function hasWon(array $currentStatusOfWordToFind) : bool {

    return !in_array('_', $currentStatusOfWordToFind);

}

?>