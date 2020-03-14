<?php
namespace Console\App\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;


class AddNumbersCommand extends Command {

    protected function configure()
    {
        $this->setName('add')
             ->setDescription('Add all given Numbers')
             ->setHelp('add <numbers>...')
             ->addArgument(
                'numbers',
                InputArgument::IS_ARRAY | InputArgument::REQUIRED,
                'The numbers to be added'
             );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $numbersToAdd = $input->getArgument('numbers');
        $result = 0;
        $text = '';
        $args = count($numbersToAdd);
        if($args > 1){
            foreach($numbersToAdd as $key => $value){
                $result += $value;
                if($key  == $args-1){
                  $text .= $value.' ';
                }else {
                  $text .= $value.' + ';
                }
            }
            $text .= '= '.$result;
        } else {
            $result = $numbersToAdd[0];
            $text .= $result;
        }
        $output->writeln($text);
        return 0;
    }
}
