<?php

namespace Video40\MuteObserverExample\Console\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Video40\MuteObserverExample\Model\DeliveryTypes;
use Video40\MuteObserverExample\Observer\DeliveryTypesObserver;

class CoreDeliveryCommand extends Command
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
        $this->setName("delivery:types:core");
        $this->setDescription("List Delivery Types");
    }
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        DeliveryTypesObserver::$muted=true;
        $types = $this->deliveryTypes->toDataObject();
        DeliveryTypesObserver::$muted=false;
        $output->writeln($types->getData('types'));
    }
}