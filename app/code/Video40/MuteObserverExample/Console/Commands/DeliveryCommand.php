<?php

namespace Video40\MuteObserverExample\Console\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Video40\MuteObserverExample\Model\DeliveryTypes;

class DeliveryCommand extends Command
{
    protected $deliveryTypes;
    public function __construct(DeliveryTypes $deliveryTypes)
    {
        parent::__construct(null);
        $this->deliveryTypes = $deliveryTypes;
    }
    protected function configure()
    {
        parent::configure();
        $this->setName("delivery:types:list");
        $this->setDescription("List Delivery Types");
    }
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $types = $this->deliveryTypes->toDataObject();
        $output->writeln($types->getData('types'));
    }
}