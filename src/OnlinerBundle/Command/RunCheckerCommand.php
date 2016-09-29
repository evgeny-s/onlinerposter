<?php
namespace OnlinerBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class ProcessDeferredOrdersCommand
 */
class RunCheckerCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this->setName('onliner:commenter:run-checker');
        $this->setDescription('Run Onliner Checker');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->getContainer()->get('onliner.commenter')->runChecker();
    }
}
