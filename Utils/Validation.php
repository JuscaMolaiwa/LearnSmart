<?php  

class Validation{

	static function clean($str){
		$str = trim($str);
		$str = stripcslashes($str);
		$str = htmlspecialchars($str);
		return $str;
	}

	static function validateYear($year) {
		// Check if year is a four-digit number and is a valid year
		$currentYear = date("Y");
		return preg_match("/^\d{4}$/", $year) && ($year >= 1900 && $year <= $currentYear);
	}
	
	static function validateMonth($month) {
		// Check if month is a valid number between 1 and 12
		return preg_match("/^(0[1-9]|1[0-2]|[1-9])$/", $month);
	}
	
    static function name($str){
		# Letters Only 
		$name_regex = "/^([a-zA-Z' ]+)$/";
		if (preg_match($name_regex, $str)) 
			return true;
        else return false;
	}

	static function username($str){
		$username_regex = "/^[A-Za-z][A-Za-z0-9]{4,7}$/"; // Adjusted for total length of 5-8
		if (preg_match($username_regex, $str)) 
			return true;
		else 
			return false;
	}
	
	static function email($str){
		if (filter_var($str, FILTER_VALIDATE_EMAIL)) 
			return true;
        else return false;
	}

	static function password($str) {
    // Password validation regex
    $password_regex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{4,}$/"; 

    // Check if the password matches the regex
    if (preg_match($password_regex, $str)) {
        return true; // Valid password
    } else {
        return false; // Invalid password
    }
}
	static function match($str1, $str2){
		if ($str1 === $str2) 
			return true;
        else return false;
	}

}