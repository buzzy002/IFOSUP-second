<?php

declare(strict_types=1);

/**
 * Retrieve the categories from a JSON file
 * 
 * @param string $filePath The path of the JSON file containing the words and categories
 * 
 * @return array The list of categories
 */
function getCategories(string $filePath) : array {

    $fileContent = file_get_contents($filePath);
    $fileContentProcessed = json_decode($fileContent, true);

    return array_keys($fileContentProcessed);

}

/**
 * Choose a word in a JSON file
 * 
 * @param string $filePath The path of the JSON file containing the words
 * @param ?string $category The category of the word to choose. If not specified, will choose the category at random
 * 
 * @return string The word chosen
 */
function chooseWord(string $filePath, ?string $category = null) : string {

    $fileContent = file_get_contents($filePath);
    $fileContentProcessed = json_decode($fileContent, true);

    if($category == null || !array_key_exists($category, $fileContentProcessed)) { $category = array_rand($fileContentProcessed); }
    
    $secondRandomKey = array_rand($fileContentProcessed[$category]);

    return $fileContentProcessed[$category][$secondRandomKey];
}

/**
 * Process the word so it doesn't have accent or special character
 * 
 * @param string $word The word to process
 * 
 * @return string The processed word
 */
function processWord(string $word) : string {
    
    $accents = [
        'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a',
        'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e',
        'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i',
        'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o',
        'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ü' => 'u',
        'ý' => 'y', 'ÿ' => 'y',
        'ç' => 'c', 'ñ' => 'n',
        'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A',
        'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E',
        'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I',
        'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O',
        'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U',
        'Ý' => 'Y', 'Ÿ' => 'Y',
        'Ç' => 'C', 'Ñ' => 'N'
    ];

    return strtr($word, $accents);

}

/**
 * Create the array for the status of the word to find
 * 
 * @param string $word The word to find
 * 
 * @return array The array with '_' for each letter of the word
 */
function createCurrentStatusOfWordToFind(string $word) : array {

    return array_fill(0, strlen($word), '_');

}

?>