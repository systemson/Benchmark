<?php

namespace Amber\Benchmark\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Formatter\OutputFormatterStyle;

class RunCommand extends Command{

    protected function configure(){
        $this->setName('test')
                ->setDescription('Run bechmark tests');
                //->addArgument('times', InputArgument::REQUIRED, 'Times to run the benchmark)');
    }

    protected function execute(InputInterface $input, OutputInterface $output){

        //$input = $input->getArgument('times');

        $output->writeln('Starting Benchmark framework');
        try {
            $result = new \Amber\Benchmark\Tests\BetaTest();
            $result->test();
            $output->writeln($result->output());
        } catch (\Throwable $e) {
            $output->writeln($e);
        }
        $output->writeln('The Benchmark test ended with status');
    }
}
