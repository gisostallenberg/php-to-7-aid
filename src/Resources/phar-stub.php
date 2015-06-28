#!/usr/bin/env php
<?php
/*
 * This file is part of the PHP To 7 Aid project.
 *
 * (c) Giso Stallenberg <gisostallenberg@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
if (!defined('PHP_VERSION_ID') || PHP_VERSION_ID < 50306) {
    fwrite(STDERR, "PHP needs to be a minimum version of PHP 5.3.6\n");
    exit(1);
}
set_error_handler(function ($severity, $message, $file, $line) {
    if ($severity & error_reporting()) {
        throw new ErrorException($message, 0, $severity, $file, $line);
    }
});
Phar::mapPhar('php-to-7-aid.phar');
require_once 'phar://php-to-7-aid.phar/vendor/autoload.php';

use GisoStallenberg\phpTo7aid\Console\Application;
$application = new Application();
$application->run();
__HALT_COMPILER();
