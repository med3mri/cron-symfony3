<?php
namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use AppBundle\Services\CrontabManager;
class CronCommand extends ContainerAwareCommand {

    protected function configure() {
        $this
                ->setName('crontabcreate')
                ->setDescription('');
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
    	$path = $this->getContainer()->getParameter('pathfile');
	$pathcommande = realpath($this->getContainer()->get('kernel')->getRootDir(). '/../bin/console');
        $crontab = new CrontabManager();
        $job = $crontab->newJob();
        $job->on('15 * * * *')->doJob("php $pathcommande crontabfile >> $path");
        $crontab->add($job);
        $crontab->save();
    }

}
