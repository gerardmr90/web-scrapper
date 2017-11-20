<?php
use PHPUnit\Framework\TestCase;

final class URLValidatorTest extends TestCase
{
    public function testShouldReturnValidURLFromCompanyName()
    {
        $this->assertEquals('https://www.canddi.com', URLValidator::findValidURLFromCompanyName('canddi'));
    }
}
