<?php
/*
 * Numeric base conversion of arbitary length
 */
class GWF_Numeric {
	
	private static $inCharset = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ+-";
	private static $outCharset = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ+-";
	
	public static function baseConvert($number, $inBase, $outBase) {
		
		if (!is_string($number)) {
			return "Error number is not string: $number";
		}
		
		$len = strlen($number);
		$value = "0";
		$powy = 0;
		
		for ($i = 0; $i < $len; $i++) {
			
			$char = $number[$len - $i - 1];
			$inDigit = self::digitToDec($char, self::$inCharset);
			$add = bcpow("$inBase", "$powy");
			$add = bcmul("$inDigit", $add);
			$powy++;
			$value = bcadd($value, $add);
			
		}
		
		$len = strlen($value);
		
		$back = "";
		while ($value != "0") {
			
			$outNumber = bcmod($value, "$outBase");
			$back = self::decToDigit($outNumber, self::$outCharset).$back;
			$value = bcdiv($value, "$outBase");			
			
		}
		
		return $back;
		
	}

	private static function digitToDec($char, $charset) {
		
		return strpos("$charset", "$char");
		
	}
	
	private static function decToDigit($dec, $charset) {
		
		return $charset[((int)$dec)];
		
	}
	
	public static function setInputCharset($charset) {
		
		if (!is_string($charset) || strlen($charset) < 2) {
			echo "Numeric: Invalid charset";
			exit(1);
			return;
		}
		
		self::$inCharset = $charset;
		
	}
	
	public static function getInputCharset() {

		return self::$inCharset;
		
	}

	public static function setOutputCharset($charset) {
		
		if (!is_string($charset) || strlen($charset) < 2) {
			echo "Numeric: Invalid charset";
			exit(1);
			return;
		}
		
		self::$outCharset = $charset;
		
	}
	
	public static function getOutputCharset() {

		return self::$outCharset;
		
	}
	
	public static function setDefaultCharsets() {
		
		self::$inCharset = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ+-";
		self::$outCharset = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ+-";
		
	}
	
}

?>