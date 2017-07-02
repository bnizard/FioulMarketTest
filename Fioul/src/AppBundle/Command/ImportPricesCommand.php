<?php
/**
 * Created by PhpStorm.
 * User: nizard
 * Date: 28/06/17
 * Time: 12:34
 */

namespace AppBundle\Command;

use AppBundle\Entity\Fioul;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;

class ImportPricesCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            // the name of the command (the part after "bin/console")
            ->setName('import:prices')

            ->addArgument('file', InputArgument::REQUIRED, 'The csv file')

            // the short description shown while running "php bin/console list"
            ->setDescription('Import fuel prices from a csv file')

            // the full command description shown when running the command with
            // the "--help" option
            ->setHelp('This command allows you to import fuel prices')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $file = $input->getArgument('file');
        $em = $this->getContainer()->get('doctrine.orm.entity_manager');
        if (($handle = fopen($file, "r")) !== FALSE) {
            $i = 0;
            while (($row = fgets($handle)) !== FALSE) {
                if ($row && $i)
                {
                    $fioul = new Fioul();
                    $tab = explode(',', $row);
                    if ($tab[0])
                        $fioul->setPostalCodeId($tab[0]);
                        
                    if ($tab[1])
                        $fioul->setAmount($tab[1]);
                        
                    if ($tab[2])
                    {
                        $format = 'Y-m-d';
                        $tab[2] = trim(str_replace("\"", "", $tab[2]));
                        $date = \DateTime::createFromFormat($format, $tab[2]);
                        $fioul->setDate($date::createFromFormat('Y-m-d', $tab[2]));
                    }

                    $em->persist($fioul);

                    if (!$i % 20) {
                        $em->flush();
                        $em->clear();
                    }
                }
                $i++;
                $output->write('.');
            }
            $em->flush();
            $em->clear();
            $output->writeln('END');
        }
    }
}