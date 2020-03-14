<?php
namespace Console\App\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;


class SubtractNumbersCommand extends Command {

    protected function configure()
    {
        $this->setName('subtract')
             ->setDescription('Subtract all given Numbers')
             ->setHelp('subtract <numbers>...')
             ->addArgument(
                'numbers',
                InputArgument::IS_ARRAY | InputArgument::REQUIRED,
                'The numbers to be subtracted'
             );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $numbersToSubtract = $input->getArgument('numbers');
        $result = 0;
        $text = '';
        $args = count($numbersToSubtract);

        if($args > 1){

            foreach($numbersToSubtract as $key => $value){

                if($key == 0){
                    $result = $value;
                }else {
                    $result -= $value;
                }

                if($key  == $args-1){
                  $text .= $value.' ';
                }else {
                  $text .= $value.' - ';
                }

            }

            $text .= '= '.$result;

        } else {
            $result = $numbersToSubtract[0];
            $text .= $result;
        }

        $output->writeln($text);

        return 0;
    }
}
