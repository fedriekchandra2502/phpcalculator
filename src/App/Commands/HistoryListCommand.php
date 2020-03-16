<?php
namespace Console\App\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
require_once 'helpers.php';

class HistoryListCommand extends Command {

    protected function configure()
    {
        $this->setName('history:list')
             ->setDescription('Show calculator history')
             ->setHelp('history:list [options] [--] [<commands>...]')
             ->addArgument(
                'commands',
                InputArgument::IS_ARRAY,
                'Filter the history by command'
             )
             ->addOption(
                 'driver',
                 'D',
                 InputOption::VALUE_REQUIRED,
                 'Driver for storage connection',
                 'database'
             );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $optionValue = $input->getOption('driver');
        $commands = $input->getArgument('commands');

        if($optionValue == 'file' || $optionValue == 'database') {

            $datas = [];
            $filterData = [];

            if(file_exists("db.csv")){

                $file = fopen("db.csv","r");

                while( !feof($file) ) {
                    $datas[] = fgetcsv($file);
                }

                fclose($file);

            }


            foreach ($datas as $value) {

                if(empty($value)) continue;

                if( in_array( strtolower($value[0]), array_map('strtolower',$commands) ) ) {
                    $filterData[] = $value;
                }

            }

            if($datas == null || empty($datas[0])){
                $output->writeln('<info>History is empty.</>');
            } else {
                if($commands == null){
                    printHistoryList($datas, $output);
                }else {
                    printHistoryList($filterData, $output);
                }
            }

        } else {
            //show data from DB
        }

        return 0;
    }
}
