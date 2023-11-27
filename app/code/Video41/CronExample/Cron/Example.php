<?php

namespace Video41\CronExample\Cron;
use Psr\Log\LoggerInterface;

class Example{
    protected $logger;
    public function __construct(LoggerInterface $logger){
        $this->logger = $logger;
    }
    public function execute(){
        $this->logger->info("Starting running cron example");
        sleep(2);
        $this->logger->info("cron example finished");
    }
}