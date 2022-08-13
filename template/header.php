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
<body>
<header class="bg-secondary">
    <nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand mx-auto mx-lg-3">John Carroll</a>
        <button class="navbar-toggler p-0 border-0" data-bs-target="#MainNav" data-bs-toggle="collapse"><span class="navbar-toggler-icon"></span></button>
        <div id="MainNav" class="navbar-collapse collapse ">
            <ul class="navbar-nav nav justify-content-end me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link <?= ($NavOption ==="Home") ? "active":"" ?>" href="/">Home</a></li>
                <?= ($NavOption ==="Admin") ? "<li class='nav-item'><a class='nav-link active' href='/admin/'>Admin</a></li>":"" ?>"
                <li class="nav-item"><a class="nav-link <?= ($NavOption ==="Blog") ? "active":"" ?>" href="/blog/">Blog</a></li>
                <li class="nav-item"><a class="nav-link <?= ($NavOption ==="Project") ? "active":"" ?>" href="/projects/">Projects</a></li>
            </ul>
        </div>
    </div>
    </nav>
</header>
