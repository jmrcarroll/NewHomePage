<?php

class Functions{

    /**
     * Redirects page from the root of the server.
     *
     * @param string $location
     * @return void
     */
    public static function redirect(string $location = "/index.php")
    {
        if(!headers_sent())
        {
            header("location: {$location}");
        } else {
            echo "<script>window.href ='{$location}';</script>
            <noscript>
                <meta http-equiv = 'refresh' content = '0; url = {$location}' />
            </noscript>";
        }
    }


    /**
     *
     * Function to automatically secure an array.
     * @param array $array
     * @return array
     */
    public static function secureArray(array $array): array
    {
        $securedArray = [];
        foreach ($array as $key =>$value){
            $securedArray[$key] = Databases::SecureString($value);
        }
        return $securedArray;
    }


}