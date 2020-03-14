<?php
namespace Console\App\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
require_once 'helpers.php';

class PowNumbersCommand extends Command {

    protected function configure()
    {
        $this->setName('pow')
             ->setDescription('Exponent the given number')
             ->setHelp('pow <base> <exp>')
             ->addArgument(
                'base',
                InputArgument::REQUIRED,
                'The base number'
             )
             ->addArgument(
                'exp',
                InputArgument::REQUIRED,
                'The exponent number'
             );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $numbers = [$input->getArgument('base'), $input->getArgument('exp')];

        $result = doMath('pow',$numbers);

        $output->writeln($result);

        return 0;
    }
}
