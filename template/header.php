<?php
include_once($_SERVER['DOCUMENT_ROOT']."/utilities/DependenciesHandler.php");
/**
 *
 * JCarroll 6/04/22
 * Basic template for calling Bootstrap, jquery and setting up the header for the page
 * @var string $title
 * @var string $NavOption
 *
 */
if(!isset($title)) $title = "John Carroll";
if(!isset($NavOption)) $NavOption = "Home";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>
    <?= DependenciesHandler::Bootstrap();?>
    <?= DependenciesHandler::jQuery();?>
    <style>
    </style>
</head>
<header class="bg-secondary">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ul class="nav nav-pills justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link active">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">Projects</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
<body>