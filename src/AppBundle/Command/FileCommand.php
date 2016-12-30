<?php

namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
class FileCommand extends ContainerAwareCommand {

    protected function configure() {
        $this
                ->setName('crontabfile')
                ->setDescription('');
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        $output->writeln(
               date("Y-m-d H:i") 
        );
    }

}
