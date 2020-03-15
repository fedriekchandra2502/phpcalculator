<?php
namespace Console\App\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
require_once 'helpers.php';

class HistoryClearCommand extends Command {

    protected function configure()
    {
        $this->setName('history:clear')
             ->setDescription('Clear calculator history');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $file = fopen("db.csv","w");
        fclose($file);
        $output->writeln('<info>History cleared!</>');

        return 0;
    }
}
