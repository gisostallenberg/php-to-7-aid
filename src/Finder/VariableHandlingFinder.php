<?php
/*
 * This file is part of the PHP To 7 Aid project.
 *
 * (c) Giso Stallenberg <gisostallenberg@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
namespace GisoStallenberg\phpTo7aid\Finder;

use GisoStallenberg\phpTo7aid\AbstractFinder;
use Symfony\Component\Finder\SplFileInfo;

/**
 * Class that tries to find usage of variable-variables and variable properties
 * In PHP7 resolving variables has changed from 'logic' to from left to right
 * { and } should be added by the programmer in cases where logic surpasses the left to right
 */
class VariableHandlingFinder extends AbstractFinder {
    /**
     * prepares the finder for execution
     * 
     */
    public function prepare(SplFileInfo $file)
    {
        
    }
    
    /**
     * executes the finder
     * 
     */
    public function execute(SplFileInfo $file)
    {
        
    }
}