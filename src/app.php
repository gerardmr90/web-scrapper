<?php

require 'CompanyExtractor.php';
require 'URLValidator.php';
require 'WebScrapper.php';

const EMAIL_REGEX = '/[a-z\d._%+-]+@[a-z\d.-]+\.[a-z]{2,4}\b/i';
const POSTCODE_REGEX = '/[A-Z]{1,2}[0-9][0-9A-Z]?\s?[0-9][A-Z]{2}/';
const PHONE_REGEX = '/\+?\d{1,2} \d{2,4} \d{2,4} \d{2,4}/';
const YOUTUBE_REGEX = '/((https):\/\/|)(www\.|)youtube\.com\/(channel\/|user\/)[a-zA-Z0-9\-]{1,}/';
const FACEBOOK_REGEX = '/(?:(?:http|https):\/\/)?(?:www.)?facebook.com\/(?:(?:\w)*#!\/)?(?:pages\/)?(?:[?\w\-]*\/)?(?:profile.php\?id=(?=\d.*))?([\w\-]*)?/';
const LINKEDIN_REGEX = '/(ftp|http|https):\/\/?((www|\w\w)\.)?linkedin.com(\w+:{0,1}\w*@)?(\S+)(:([0-9])+)?(\/|\/(["\w#!:.?+=&%@!\-\/]))?/';
const TWITTER_REGEX = '/((https):\/\/|)?(www\.|)?twitter\.com\/[a-zA-Z0-9\-]{1,}/';

function getInformation($email)
{
    $companyExtractor = new CompanyExtractor();
    $companyName=$companyExtractor->getCompanyFromEmailAddress($email);

    $mURLValidator = new URLValidator();
    $companyURL = $mURLValidator->findValidURLFromCompanyName($companyName);

    if ($companyURL != 'Website not found') {
        $webScrapper = new WebScrapper();
        $email = $webScrapper->getInformationFromWebsite($companyURL, EMAIL_REGEX);
        $postcode = $webScrapper->getInformationFromWebsite($companyURL, POSTCODE_REGEX);
        $phone = $webScrapper->getInformationFromWebsite($companyURL, PHONE_REGEX);
        $youtube = $webScrapper->getInformationFromWebsite($companyURL, YOUTUBE_REGEX);
        $facebook = $webScrapper->getInformationFromWebsite($companyURL, FACEBOOK_REGEX);
        $linkedin = $webScrapper->getInformationFromWebsite($companyURL, LINKEDIN_REGEX);
        $twitter = $webScrapper->getInformationFromWebsite($companyURL, TWITTER_REGEX);

        $info = array($email, $postcode, $phone, $youtube, $facebook, $linkedin, $twitter);
        print_r($info);
    } else {
        printf('Company information not found');
    }
}

getInformation($argv[1]);
