<?php

/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylor@laravel.com>
 */

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);

// This file allows us to emulate Apache's "mod_rewrite" functionality from the
// built-in PHP web server. This provides a convenient way to test a Laravel
// application without having installed a "real" web server software here.
if ($uri !== '/' && file_exists(__DIR__.'/public'.$uri)) {
    return false;
}

// $path = file_get_contents(__DIR__.'/.env.example');
// $foldername = 'reantamchet';
// $appurl = 'APP_URL=http://localhost/'.$foldername;
// $host = $_SERVER['HTTP_HOST'];
// file_put_contents(__DIR__.'/.env', str_replace(
//     $appurl, 'APP_URL=http://'.$host.'/'.$foldername,$path
// ));

require_once __DIR__.'/public/index.php';
