<?php
/*
 * This file is part of the PHP To 7 Aid project.
 *
 * (c) Giso Stallenberg <gisostallenberg@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
namespace GisoStallenberg\phpTo7aid\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class RunCommand extends Command {
        /**
     * @see Command
     */
    protected function configure()
    {
        $this
            ->setName('run')
            ->setDefinition(
                array(
                    new InputArgument('path', InputArgument::OPTIONAL, 'The path where your PHP5 code resides', getcwd() ),
                    new InputOption('additionals', '', InputOption::VALUE_REQUIRED | InputOption::VALUE_IS_ARRAY, 'Director(y)(ies) where other solver or fixers might be found', null),
                    new InputOption('excludes', '', InputOption::VALUE_REQUIRED | InputOption::VALUE_IS_ARRAY, 'Director(y)(ies) that you want to exclude from the scan', null),
                )
            )
            ->setDescription('Finds, and possibly fixes, backward incompatible changes made in PHP 7 in the given directories.')
            //->setHelp()
            ;
    }
    
    /**
     * @see Command
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('nothing implemented yet');
        // does nothing yet
    }
}