<?php 
	defined('BASEPATH') OR exit();

	/**
	* @library	RandGen
	* @author 	Daniel Omoniyi
	* @link 	https://www.github.com/danielthegeek/RandGen 
	* @license	http://opensource.org/licenses/MIT	MIT License
	* @version	1.0.0
	**/


	class Rand_gen
	{	

		private function randomize($string,$len) 
		{
			$result="";
			$charArray = str_split($string);
			for($i= 0; $i < $len; $i++) { 
				$randItem = array_rand($charArray);
				$result .= "".$charArray[$randItem];
			}
			return $result;	
		}

		/** 
		*  Generator, accepts three arguments
		*  @var $len, numeric value
		*  @var $type, string type
		*  @var $save, Boolean: 
		*  TRUE (Will store generated string), FALSE (Will not store generated string)
		**/

		public function generate($len, $type="") 
		{	 
			// Validating $len
			if (!is_numeric($len)) {
				throw new Exception("Expected a numerical value as string length not \"$len\"", 1);
			}
			// String $type
			switch ($type) 
			{
				case 'alpha':
					$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
					$output = $this->randomize($chars,$len);
					return $output;
				break;
				case 'numeric':
					$chars = "0123456789";
					$output = $this->randomize($chars,$len);
					return $output;
				break;
				case 'alpha-numeric':
					$chars = "abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
					$output = $this->randomize($chars,$len);
					return $output;
				break;
				default:
					$chars = "abcdefghijklmnopqrstuvwxyzU\$VW01QRST23E\FGHI/456JKLMNOP78XYZ9ABCD";
					$randChars = md5(md5(strtotime(time()).$chars)).$chars;
					$output = $this->randomize($randChars,$len);
					return $output;
				break;
			}
		}
	}
?>