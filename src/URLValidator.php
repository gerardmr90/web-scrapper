<?php
const DOMAIN_EXTENSIONS = ['.com/', '.de/', '.net/','.co.uk/', '.org/', '.info/', '.nl/', '.eu/', '.es/'];

final class URLValidator
{
    public static function findValidURLFromCompanyName($company)
    {
        $counter = 0;

        do {
            $url = 'https://www.'.$company.DOMAIN_EXTENSIONS[$counter];
            $headers = @get_headers($url);
            $counter++;
        } while ($counter<sizeof(DOMAIN_EXTENSIONS) && $headers[0] != "HTTP/1.0 200 OK" && $headers[0] != "HTTP/1.1 200 OK");

        if ($headers[0] != "HTTP/1.1 200 OK" && $headers[0] != "HTTP/1.0 200 OK") {
            return 'Website not found';
        } else {
            return $url;
        }
    }
}
