<?php
use PHPUnit\Framework\TestCase;

final class WebScrapperTest extends TestCase
{
    public function testShouldReturnEmailAddress()
    {
        $this->assertEquals('hello@canddi.com', WebScrapper::getEmailAddressFromWebsite('http://www.canddi.com'));
    }

    public function testShouldReturnPostCode()
    {
        $this->assertEquals('M1 1FT', WebScrapper::getPostCodeFromWebsite('http://www.canddi.com'));
    }
}
