<?php

namespace UserStory4\Module3\Controller;

use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\RouterInterface;
use Magento\Framework\App\ActionFactory;

class Router implements RouterInterface
{
    private $actionFactory;
    public function __construct(ActionFactory $actionFactory)
    {
        $this->actionFactory = $actionFactory;
    }
    private function getPathChunksOfContactUsPage()
    {
        $frontName = 'contact';
        $controller = 'index';
        $action = 'index';
        return [$frontName, $controller, $action];
    }
    public function match(RequestInterface $request)
    {
        //this functions runs everytime magento2 is unable to redirect a route. Hence this is used for custom routing.

        [$frontName, $controller, $action] = $this->getPathChunksOfContactUsPage();

        $request->setModuleName($frontName)->setControllerName($controller)->setActionName($action);

        $actionInstance = $this->actionFactory->create(\Magento\Framework\App\Action\Forward::class, ['request' => $request]);

        $request->setDispatched(true);
        //     //When you call $request->setDispatched(true), 
        //     //you're indicating to the framework 
        //     //that it should not continue searching for a controller to handle the request or perform any further routing. 
        //     //Instead, Magento will proceed with executing the specified controller action and generating the response.
        //     //Otherwise if it does not successfully finds the controller it will go on searching for infinitely
        return $actionInstance;

    }
}