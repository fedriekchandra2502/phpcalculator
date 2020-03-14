<?php
namespace Console\App\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
require_once 'helpers.php';

class MultiplyNumbersCommand extends Command {

    protected function configure()
    {
        $this->setName('multiply')
             ->setDescription('Multiply all given Numbers')
             ->setHelp('multiply <numbers>...')
             ->addArgument(
                'numbers',
                InputArgument::IS_ARRAY | InputArgument::REQUIRED,
                'The numbers to be multiplied'
             );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $numbers = $input->getArgument('numbers');

        $result = doMath('multiply',$numbers);

        $output->writeln($result);

        return 0;
    }
}
