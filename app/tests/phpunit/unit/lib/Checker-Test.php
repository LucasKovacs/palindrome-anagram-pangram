<?php
declare(strict_types = 1);

use PHPUnit\Framework\TestCase;

/**
 * @covers Checker
 */
class CheckerTest extends TestCase
{
    /**
     * 
     * 
     * TEST FOR isPalindrome
     * 
     */

    /**
     * @covers Checker::isPalindrome
     * @dataProvider validPalindrome
     */
    public function testIsPalindromeIsValidString($a): void
    {
        $this->assertTrue(Checker::isPalindrome($a));
    }

    /**
     * @covers Checker::isPalindrome
     * @dataProvider invalidPalindrome
     */
    public function testIsPalindromeIsNotValidString($a): void
    {
        $this->assertFalse(Checker::isPalindrome($a));
    }

    /**
     * @covers Checker::isPalindrome
     */
    public function testIsPalindromeIsEmpty(): void
    {
        $this->assertFalse(Checker::isPalindrome(''));
    }

    /**
     * @covers Checker::isPalindrome
     */
    public function testIsPalindromeIsValidNumber(): void
    {
        $this->assertFalse(Checker::isPalindrome(1331));
    }

    /**
     * @covers Checker::isPalindrome
     */
    public function testIsPalindromeIsNotValidNumber(): void
    {
        $this->assertFalse(Checker::isPalindrome(2231));
    }

    /**
     * @covers Checker::isPalindrome
     */
    public function testIsPalindromeIsArray(): void
    {
        $this->assertFalse(Checker::isPalindrome(['anna', 'level']));
    }

    /**
     * 
     * 
     * TEST FOR isAnagram
     * 
     */

    /**
     * @covers Checker::isAnagram
     * @dataProvider validAnagram
     */
    public function testIsAnagramIsValidString($a, $b): void
    {
        $this->assertTrue(Checker::isAnagram($a, $b));
    }

    /**
     * @covers Checker::isAnagram
     * @dataProvider invalidAnagram
     */
    public function testIsAnagramIsNotValidString($a, $b): void
    {
        $this->assertFalse(Checker::isAnagram($a, $b));
    }

    /**
     * @covers Checker::isAnagram
     */
    public function testIsAnagramIsEmptyWord(): void
    {
        $this->assertFalse(Checker::isAnagram('', 'cacao elf'));
    }

    /**
     * @covers Checker::isAnagram
     */
    public function testIsAnagramIsEmptyComparison(): void
    {
        $this->assertFalse(Checker::isAnagram('coalface', ''));
    }

    /**
     * @covers Checker::isAnagram
     */
    public function testIsAnagramIsBothParamsEmpty(): void
    {
        $this->assertFalse(Checker::isAnagram('', ''));
    }

    /**
     * @covers Checker::isAnagram
     */
    public function testIsAnagramIsNumberWord(): void
    {
        $this->assertFalse(Checker::isAnagram(1234, 'cacao elf'));
    }

    /**
     * @covers Checker::isAnagram
     */
    public function testIsAnagramIsNumberComparison(): void
    {
        $this->assertFalse(Checker::isAnagram('coalface', 123234));
    }

    /**
     * 
     * 
     * TEST FOR isPangram
     * 
     */

    /**
     * @covers Checker::isPangram
     * @dataProvider validPangram
     */
    public function testIsPangramIsValidString($a): void
    {
        $this->assertTrue(Checker::isPangram($a));
    }

    /**
     * @covers Checker::isPangram
     * @dataProvider invalidPangram
     */
    public function testIsPangramIsNotValidString($a): void
    {
        $this->assertFalse(Checker::isPangram($a));
    }

    /**
     * @covers Checker::isPangram
     */
    public function testIsPangramIsEmptyString(): void
    {
        $this->assertFalse(Checker::isPangram(''));
    }

    /**
     * @covers Checker::isPangram
     */
    public function testIsPangramIsNumber(): void
    {
        $this->assertFalse(Checker::isPangram(12312312));
    }

    /**
     * @covers Checker::isPangram
     */
    public function testIsPangramIsNull(): void
    {
        $this->assertFalse(Checker::isPangram(null));
    }

    /**
     * @covers Checker::isPangram
     */
    public function testIsPangramIsFalse(): void
    {
        $this->assertFalse(Checker::isPangram(false));
    }

    /**
     * @covers Checker::isPangram
     */
    public function testIsPangramIsTrue(): void
    {
        $this->assertFalse(Checker::isPangram(true));
    }

    /**
     * @covers Checker::isPangram
     */
    public function testIsPangramIsArray(): void
    {
        $this->assertFalse(Checker::isPangram(['something']));
    }



    /**
     * 
     * 
     * DATA
     * PROVIDERS
     * 
     * 
     */

     /**
      * Valid Palindromes
      *
      * @return array
      */
    public function validPalindrome()
    {
        return [
            ['anna'], 
            ['level'], 
            ['noon']
        ];
    }

     /**
      * Invalid Palindromes
      *
      * @return array
      */
    public function invalidPalindrome()
    {
        return [
            ['Bark'], 
            ['test'], 
            [1221],
            ['hello'],
            ['']
        ];
    }

     /**
      * Valid Anagrams
      *
      * @return array
      */
      public function validAnagram()
      {
        return [
            ['coalface','cacao elf'],
            ['who', 'how'],
            ['cafe', 'face']
        ];
      }
  
       /**
        * Invalid Anagrams
        *
        * @return array
        */
      public function invalidAnagram()
      {
        return [
            ['coalface','dark elf'],
            ['test', 'rest'],
            ['', '']
        ];
      }

    /**
     * Valid Pangrams
    *
    * @return array
    */
    public function validPangram()
    {
        return [
            ['The quick brown fox jumps over the lazy dog'],
            ['The job requires extra pluck and zeal from every young wage earner']
        ];
    }
  
    /**
    * Invalid Pangrams
    *
    * @return array
    */
    public function invalidPangram()
    {
        return [
            ['The British Broadcasting Corporation (BBC) is a British public service broadcaster.'], 
            [''],
            ['A test method can accept arbitrary arguments. These arguments are to be provided by a data provider method...']
        ];
    }
}

/* End of Checker-Test.php */
