<?php
/**
 * Pangrams, anagrams and palindromes
 * 
 * Implement each of the functions of the Checker class. 
 * Aim to spend about 10 minutes on each function. 
 */
class Checker
{
    /**
     * A palindrome is a word, phrase, number, or other sequence of characters 
     * which reads the same backward or forward.
     *
     * @param string $word
     * @return boolean
     */
    public static function isPalindrome($word)
    {
        $filter_word = trim(strtolower($word));

        return (strtolower($filter_word) == strrev($filter_word));
    }
    
    /**
     * An anagram is the result of rearranging the letters of a word or phrase 
     * to produce a new word or phrase, using all the original letters 
     * exactly once.
     * 
     * @param string $word
     * @param string $comparison
     * @return boolean
     */
    public static function isAnagram($word, $comparison)
    {
        $filter_word = strtr(trim(strtolower($word)), [' ' => '']);
        $filter_comparison = strtr(trim(strtolower($comparison)), [' ' => '']);

        $first_string = str_split($filter_word);
        $second_string = str_split($filter_comparison);

        sort($first_string);
        sort($second_string);

        return (join('',$first_string) == join('',$second_string));
    }

    /**
     * A Pangram for a given alphabet is a sentence using every letter of the 
     * alphabet at least once. 
     * 
     * @param string $phrase
     * @return boolean
     */    
    public static function isPangram($phrase)
    {
        $filter_phrase = strtr(trim(strtolower($phrase)), [' ' => '']);

        $english_dictionary = 'abcdefghijklmnopqrstuvwxyz';
        $letters = str_split($filter_phrase);
        
        sort($letters);

        $unique_letters = array_unique($letters);

        return (join('', $unique_letters) == $english_dictionary);
    }
}