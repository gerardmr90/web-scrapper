<?php

const EMAIL_REGEX = '/[a-z\d._%+-]+@[a-z\d.-]+\.[a-z]{2,4}\b/i';

final class WebScrapper
{
    public static function getEmailAddressFromWebsite($url)
    {
        $html = file_get_contents($url);

        preg_match_all(EMAIL_REGEX, $html, $matches);

        if ($matches) {
            $emails = array_unique($matches[0]);
            return implode(',', $emails);
        } else {
            return 'Email address not found';
        }
    }
}
