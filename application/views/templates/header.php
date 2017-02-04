<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Title</title>

        <style>
            body {
                padding: 60px;
                min-width: 1000px;
            }
/*            @media (max-width: 980px) {
                body {
                    padding-top: 0;
                }
            }*/
        </style>

        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="/css/mycss.css">

        <script src="/js/jquery-3.1.1.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="dropdown pull-right">
                <button class="btn dropdown-toggle" type="button" data-toggle="dropdown">Change Avatar Profile
                    <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="#">HTML</a></li>                    
                    <li class="divider"></li>
                    <li><a href="#">Create a New Avatar</a></li>
                    <li><a href="#">Edit Existing Avatar</a></li>
                </ul>
            </div>
        </div>
        <?php
        