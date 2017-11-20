<?php
final class CompanyExtractor
{
    public static function getCompanyFromEmailAddress($email)
    {
        $domain = substr(strstr($email, '@'), 1);
        $company = substr(strstr($domain, '.', true), 0);
        return $company;
    }
}
