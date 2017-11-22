<?php
use PHPUnit\Framework\TestCase;

const URL = 'https://www.canddi.com/';
const EMAIL_REGEX = '/[a-z\d._%+-]+@[a-z\d.-]+\.[a-z]{2,4}\b/i';
const POSTCODE_REGEX = '/[A-Z]{1,2}[0-9][0-9A-Z]?\s?[0-9][A-Z]{2}/';
const PHONE_REGEX = '/\+?\d{1,2} \d{2,4} \d{2,4} \d{2,4}/';
const YOUTUBE_REGEX = '/((https):\/\/|)(www\.|)youtube\.com\/(channel\/|user\/)[a-zA-Z0-9\-]{1,}/';
const FACEBOOK_REGEX = '/(?:(?:http|https):\/\/)?(?:www.)?facebook.com\/(?:(?:\w)*#!\/)?(?:pages\/)?(?:[?\w\-]*\/)?(?:profile.php\?id=(?=\d.*))?([\w\-]*)?/';
const LINKEDIN_REGEX = '/(ftp|http|https):\/\/?((www|\w\w)\.)?linkedin.com(\w+:{0,1}\w*@)?(\S+)(:([0-9])+)?(\/|\/(["\w#!:.?+=&%@!\-\/]))?/';
const TWITTER_REGEX = '/((https):\/\/|)?(www\.|)?twitter\.com\/[a-zA-Z0-9\-]{1,}/';


final class WebScrapperTest extends TestCase
{
    public function testShouldReturnEmailAddress()
    {
        $this->assertEquals('hello@canddi.com', WebScrapper::getInformationFromWebsite(URL, EMAIL_REGEX));
    }

    public function testShouldReturnPostCode()
    {
        $this->assertEquals('M1 1FT', WebScrapper::getInformationFromWebsite(URL, POSTCODE_REGEX));
    }

    public function testShouldReturnPhoneNumber()
    {
        $this->assertEquals('+44 161 414 1080', WebScrapper::getInformationFromWebsite(URL, PHONE_REGEX));
    }

    public function testShouldReturnYoutubeChannel()
    {
        $this->assertEquals('https://www.youtube.com/channel/UCU7aljz8YC9IdPfxuxLY39g', WebScrapper::getInformationFromWebsite(URL, YOUTUBE_REGEX));
    }

    public function testShouldReturnFacebookPage()
    {
        $this->assertEquals('http://www.facebook.com/pages/Canddi/126078980739722,https://www.facebook.com/thisiscanddi', WebScrapper::getInformationFromWebsite(URL, FACEBOOK_REGEX));
    }

    public function testShouldReturnLinkedinPage()
    {
        $this->assertEquals('http://www.linkedin.com/company/canddi-campaign-and-digital-intelligence-limited-?goback=%2Efcs_*2_canddi_false_*2_*2_*2_*2_*2_*2_*2_*2_*2_*2_*2_*2&amp;trk=tabs_biz_home",https://www.linkedin.com/company/1079436",', WebScrapper::getInformationFromWebsite(URL, LINKEDIN_REGEX));
    }

    public function testShouldReturnTwitterPage()
    {
        $this->assertEquals('twitter.com/CANDDi,https://twitter.com/canddi', WebScrapper::getInformationFromWebsite(URL, TWITTER_REGEX));
    }
}
