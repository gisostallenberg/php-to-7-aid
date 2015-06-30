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
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

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
        $this->loadSolvers($input, $output);
        $this->loadFinders($input, $output);

        $codefinder = Finder::create()
            ->files()
            ->name('*.php')
            ->in($input->getArgument('path') );
        
        foreach ($codefinder as $projectfile) {
            $this->prepareSolvers($projectfile, $input, $output);
            $this->prepareFinders($projectfile, $input, $output);
            
            $this->executeSolvers($projectfile, $input, $output);
            $this->executeFinders($projectfile, $input, $output);
        }
    }

    private function loadSolvers(InputInterface $input, OutputInterface $output)
    {
        $this->solvers = $this->loadClasses('Solver', $input, $output);
    }

    private function loadFinders(InputInterface $input, OutputInterface $output)
    {
        $this->finders = $this->loadClasses('Finder', $input, $output);
    }
        
    private function loadClasses($type, InputInterface $input, OutputInterface $output)
    {
        $classes = array();
        foreach (Finder::create()
            ->files()
            ->name('*' . $type . '.php')
            ->in(array_merge(
                array(
                    __DIR__ . '/../../' . $type . '/',
                ),
                $input->getOption('additionals')
                )
            ) as $file) {

            require $file->getRealPath();
            $class = 'GisoStallenberg\\phpTo7aid\\' . $type . '\\' . $file->getBasename('.php');
            $classes[] = new $class();
        }

        return $classes;
    }

    private function prepareSolvers(SplFileInfo $file, InputInterface $input, OutputInterface $output)
    {
        foreach ($this->solvers as $solver) {
            $solver->prepare($file);
        }
    }

    private function prepareFinders(SplFileInfo $file, InputInterface $input, OutputInterface $output)
    {
        foreach ($this->finders as $finder) {
            $finder->prepare($file);
        }
    }

    private function executeFinders(SplFileInfo $file, InputInterface $input, OutputInterface $output)
    {
        foreach ($this->finders as $finder) {
            $finder->execute($file);
        }
    }

    private function executeSolvers(SplFileInfo $file, InputInterface $input, OutputInterface $output)
    {
        foreach ($this->solvers as $solver) {
            $solver->execute($file);
        }
    }
}