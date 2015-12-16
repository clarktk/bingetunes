<?php
/**
 * Class to hash user passwords
 * php CRYPT hashing algorithm 
 * @author mwilliams
 * @link http://php.net/manual/en/function.crypt.php
 */
class PassHash {

    // blowfish
    private static $algo = '$2a';
    // cost parameter
    private static $cost = '$10';

    // create a salt value
    public static function unique_salt() {
        return substr(sha1(mt_rand()), 0, 22);
    }

    // this will be used to generate a hash
    public static function hash($password) {

        return crypt($password, self::$algo .
                self::$cost .
                '$' . self::unique_salt());
    }

    // this will be used to compare a password against a hash
    public static function check_password($hash, $password) {
        $full_salt = substr($hash, 0, 29);
        $new_hash = crypt($password, $full_salt);
        return ($hash == $new_hash);
    }
    
 /*CRYPT_BLOWFISH - 
 * For Blowfish hashing, the format is: "$2a$", 
 * a two digit cost parameter, "$", 
 * and 22 digits from the alphabet "./0-9A-Za-z". 
 * The cost must be between 04 and 31.
 */

    //the first 29 characters are the same as the salt string
    //The characters from position 30 onwards are the hash.
}