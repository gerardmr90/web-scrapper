<?php

const EMAIL_REGEX = '/[a-z\d._%+-]+@[a-z\d.-]+\.[a-z]{2,4}\b/i';
const POSTCODE_REGEX = '/[A-Z]{1,2}[0-9][0-9A-Z]?\s?[0-9][A-Z]{2}/';
const PHONE_REGEX = '/\+?\d{1,2} \d{2,4} \d{2,4} \d{2,4}/';

final class WebScrapper
{
    public static function getEmailAddressFromWebsite($url)
    {
        $html = file_get_contents($url);

        preg_match_all(EMAIL_REGEX, $html, $matches);

        if ($matches) {
            $emails = array_unique($matches[0]);
            return implode(',', $emails);
        }
        return 'Email address not found';
    }

    public static function getPostCodeFromWebsite($url)
    {
        $html = file_get_contents($url);

        preg_match_all(POSTCODE_REGEX, $html, $matches);

        if ($matches) {
            $postcodes = array_unique($matches[0]);
            return implode(',', $postcodes);
        }
        return 'Postcode not found';
    }

    public static function getPhoneNumberFromWebsite($url)
    {
        $html = file_get_contents($url);

        preg_match_all(PHONE_REGEX, $html, $matches);

        if ($matches) {
            $phones = array_unique($matches[0]);
            return implode(',', $phones);
        }
        return 'Phone Number not found';
    }
}
