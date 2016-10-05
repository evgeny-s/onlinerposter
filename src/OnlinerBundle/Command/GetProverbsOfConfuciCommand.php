<?php
namespace OnlinerBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class ProcessDeferredOrdersCommand
 */
class GetProverbsOfConfuciCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this->setName('crawler:get-proverbs-of-confuci');
        $this->setDescription('Get Proverbs Of Confuci');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->getContainer()->get('onliner.proverbs_collector')->collectConfuci();
    }
}
