<?php
use PHPUnit\Framework\TestCase;

const EMAIL_REGEX = '/[a-z\d._%+-]+@[a-z\d.-]+\.[a-z]{2,4}\b/i';
const POSTCODE_REGEX = '/[A-Z]{1,2}[0-9][0-9A-Z]?\s?[0-9][A-Z]{2}/';
const PHONE_REGEX = '/\+?\d{1,2} \d{2,4} \d{2,4} \d{2,4}/';

final class WebScrapperTest extends TestCase
{
    public function testShouldReturnEmailAddress()
    {
        $this->assertEquals('hello@canddi.com', WebScrapper::getInformationFromWebsite('http://www.canddi.com/', EMAIL_REGEX));
    }

    public function testShouldReturnPostCode()
    {
        $this->assertEquals('M1 1FT', WebScrapper::getInformationFromWebsite('http://www.canddi.com/', POSTCODE_REGEX));
    }

    public function testShouldReturnPhoneNumber()
    {
        $this->assertEquals('+44 161 414 1080', WebScrapper::getInformationFromWebsite('http://www.canddi.com/', PHONE_REGEX));
    }
}
