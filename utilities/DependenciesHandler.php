<?php

class DependenciesHandler
{

    public static function Bootstrap()
    {
        return "<link rel='stylesheet' type='text/css' href='/Dependencies/bootstrap/css/bootstrap.css'>
            <script type='module'>import * as bootstrap from '/Dependencies/bootstrap/js/bootstrap.bundle.js';window.bootstrap = bootstrap;</script>";
    }

    public static function requireJS()
    {
        return "<script src='/Dependencies/requirejs/require.js'></script>";
    }

    public static function jQuery()
    {
        return "<script src='/Dependencies/jquery/jquery-3.6.0.min.js'></script>";
    }
    public static function jQueryUI()
    {
        return "<link rel=\"stylesheet\" href=\"/Dependencies/jquery-ui-1.13.1/jquery-ui.min.css\">
<script src='/Dependencies/jquery-ui-1.13.1/jquery-ui.min.js'></script>";
    }
    public static function tinymce()
    {
        return '<script src="/Dependencies/tinymce/tinymce.min.js" referrerpolicy="origin"></script>';
    }

    public static function DocumentStyling()
    {
        return "<script src='/Dependencies/js/document.js'></script>".
            "<link rel='stylesheet' type='text/css' href='/Dependencies/css/Document.css'>";
    }
}