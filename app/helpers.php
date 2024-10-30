<?php

if (!function_exists('createSlug')) {
    function createSlug($firstName, $lastName)
    {
        // Combine first name and last name into one string
        $string = $firstName . ' ' . $lastName;

        // Replace non-letter or non-digit characters with an underscore
        $string = preg_replace('~[^\pL\d]+~u', '_', $string);

        // Trim the string to remove any underscores from the beginning or end
        $string = trim($string, '_');

        // Transliterate the string to ASCII (optional)
        $string = iconv('utf-8', 'us-ascii//TRANSLIT//IGNORE', $string);

        // Convert the string to lowercase
        $string = mb_strtolower($string, 'UTF-8');

        // Replace any remaining non-letter or non-digit characters with an underscore
        $string = preg_replace('~[^\w]+~', '_', $string);

        return $string;
    }
}
