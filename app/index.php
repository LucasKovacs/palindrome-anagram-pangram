<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once 'lib/Checker.php';

/**
 * Pangrams, anagrams and palindromes
 * 
 * Implement each of the functions of the Checker class. 
 * Aim to spend about 10 minutes on each function. 
 */
class Index
{
    public function __construct()
    {
    }

    /**
     * Check if the set of words are a palindrome
     *
     * @param array $words
     * @return void
     */
    public function checkPalindrome($words)
    {
        try {

            if (!is_array($words)) {

                throw new Exception('method "checkPalindrome" expects an array');
            }

            $phrases = [];

            foreach ($words as $word) {

                $phrases[] = '<p>Is "' . $word . '" a Palindrome? ' . $this->translateResult(Checker::isPalindrome($word)) . '</p>';
            }

            echo join("\n", $phrases);

        } catch(Exception $e) {

            die($e->message);
        }
    }

    /**
     * Check if the set of words are anagrams
     *
     * @param array $words
     * @return void
     */
    public function checkAnagram($words)
    {
        try {

            if (!is_array($words)) {

                throw new Exception('method "checkAnagram" expects an array');
            }

            $phrases = [];

            foreach ($words as $set) {

                $phrases[] = '<p>Is "' . $set['word'] . '", "' . $set['comparison'] . '" an Anagram? ' . $this->translateResult(Checker::isAnagram($set['word'], $set['comparison'])) . '</p>';
            }

            echo join("\n", $phrases);

        } catch(Exception $e) {

            die($e->message);
        }
    }

    /**
     * Check if a set of phrases are pangrams
     *
     * @param array $phrases
     * @return void
     */
    public function checkPangram($phrases)
    {
        try {

            if (!is_array($phrases)) {

                throw new Exception('method "checkPangram" expects an array');
            }

            $result = [];

            foreach ($phrases as $phrase) {

                $result[] = '<p>Is "' . $phrase . '" a Pangram? ' . $this->translateResult(Checker::isPangram($phrase)) . '</p>';
            }

            echo join("\n", $result);

        } catch(Exception $e) {

            die($e->message);
        }
    }

    /**
     * Translate result from boolean to string
     *
     * @param boolean $result
     * @return string
     */
    private function translateResult($result)
    {
        return ($result ? '<strong>YES</strong>' : '<strong>NO</strong>');
    }
}

$index = new Index();
?>

<!DOCTYPE html>
<html>
<head>
<title>Jadu Checker</title>
</head>

<body>

<h2>Palindrome</h2>
<?php 
    $index->checkPalindrome(
        ['anna', 'Bark', 'test', '1221', 'level', 'noon', 'hello']
    );
?>

<h2>Anagram</h2>
<?php 
    $index->checkAnagram(
        [
            ['word' => 'coalface', 'comparison' => 'cacao elf'],
            ['word' => 'coalface', 'comparison' => 'dark elf'],
            ['word' => 'who', 'comparison' => 'how'],
            ['word' => 'test', 'comparison' => 'rest'],
            ['word' => 'cafe', 'comparison' => 'face']
        ]
    );
?>

<h2>Pangram</h2>
<?php 
    $index->checkPangram(
        [
            'The quick brown fox jumps over the lazy dog',
            'The British Broadcasting Corporation (BBC) is a British public service broadcaster.'
        ]
    );
?>

</body>
</html>