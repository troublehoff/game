<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Astatroth\HexGrid\Grid;

class TestGridCommand extends Command
{
    protected static $defaultName = 'app:test-grid';

    protected function configure()
    {
        $this
            ->setDescription('Test hex grid library')
            ->addArgument('arg1', InputArgument::OPTIONAL, 'arg 1')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $arg1 = $input->getArgument('arg1');

        if ($arg1) {
            $io->note(sprintf('You passed an argument: %s', $arg1));
        }

        $grid = new Grid();

        $tileCoords = $grid->hexagon(0,0, 2, true);

        dump($tileCoords);

        dump($grid->neighbors(3, -3));



        return Command::SUCCESS;
    }
}
