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



}