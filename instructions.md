## Instructions

**Installation Requirements**

 1. Docker

**Installation**

 1. Should be automatic but in case it fails run: *docker network create jadu-network*
 2. Run docker-compose up

**Run the application**

 1. On your browser type: localhost:8080, to get the set of results
 2. You can simply add new test cases editing the file index.php, lines:
	 3. Line 135 for Palindrome
	 4. Lines 143 to 147 for Anagram
	 5. Lines 156 to 157 for Pangram

## File Structure

 - /
	 - app (application)
		 - lib
			 - Checker.php (Jadu provided library)
		 - index.php
	 - docs
		 - Jadu Engineer Code Exercise - Palindrome.pdf
	 - docker-compose.yml
	 - Dockerfile
	 - instructions.md
     - jadu-checker.code-workspace
	 - README.md
	 - time.md