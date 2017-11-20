<?php
use PHPUnit\Framework\TestCase;

final class CompanyExtractorTest extends TestCase
{
    public function testShouldReturnCompanyNameFromEmailAddress()
    {
        $this->assertEquals('test', CompanyExtractor::getCompanyFromEmailAddress('gerard@test.com'));
    }
}
