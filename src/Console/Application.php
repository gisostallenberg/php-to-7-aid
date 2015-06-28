<?php
/*
 * This file is part of the PHP To 7 Aid project.
 *
 * (c) Giso Stallenberg <gisostallenberg@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
namespace GisoStallenberg\phpTo7aid\Console;

use Symfony\Component\Console\Application as BaseApplication;
/**
 * @author Giso Stallenberg <gisostallenberg@gmail.com>
 */
class Application extends BaseApplication
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        error_reporting(-1);
        parent::__construct('PHP To 7 Aid', '0.0.0');
    }

    public function getLongVersion()
    {
        $version = parent::getLongVersion().' by <comment>Giso Stallenberg</comment>';
        $commit = '@git-commit@';
        if ('@'.'git-commit@' !== $commit) {
            $version .= ' ('.substr($commit, 0, 7).')';
        }
        return $version;
    }
}
