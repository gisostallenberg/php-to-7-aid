<?php
/*
 * This file is part of the PHP To 7 Aid project.
 *
 * (c) Giso Stallenberg <gisostallenberg@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
namespace GisoStallenberg\phpTo7aid;

use Symfony\Component\Finder\SplFileInfo;

interface ScannerInterface {
    /**
     * prepares the scanner for execution
     * 
     */
    function prepare(SplFileInfo $file);
    
    /**
     * executes the scanner
     * 
     */
    function execute(SplFileInfo $file);
    
    /**
     * indicates any fix can be done even in php5, so the code is future-proof
     */
    function canBeFixedPrePHP7();
}
