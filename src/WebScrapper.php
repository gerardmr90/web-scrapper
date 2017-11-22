<?php

final class WebScrapper
{
    public static function getInformationFromWebsite($url, $regex)
    {
        $html = file_get_contents($url);
        preg_match_all($regex, $html, $matches);

        if ($matches) {
            $info = array_unique($matches[0]);
            return implode(',', $info);
        }
    }
}
