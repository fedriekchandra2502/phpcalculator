<?php
namespace Console\App\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
require_once 'helpers.php';

class DivideNumbersCommand extends Command {

    protected function configure()
    {
        $this->setName('divide')
             ->setDescription('Divide all given Numbers')
             ->setHelp('divide <numbers>...')
             ->addArgument(
                'numbers',
                InputArgument::IS_ARRAY | InputArgument::REQUIRED,
                'The numbers to be divided'
             );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $numbers = $input->getArgument('numbers');

        $result = doMath('divide',$numbers);

        $output->writeln($result);

        return 0;
    }
}
