<?php

namespace UserStory4\Module2\Controller;

use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\RouterInterface;
use Magento\Framework\App\ActionFactory;

class Router implements RouterInterface
{
    private $actionFactory;
    private $pascalCasePattern = "/^[A-Z][A-Za-z0-9]*$/";
    public function __construct(ActionFactory $actionFactory)
    {
        $this->actionFactory = $actionFactory;
    }
    private function splitPathIntoChunks($path)
    {
        $pathChunks = preg_split('/(?=[A-Z])/', $path);
        $isValidPath = false;
        $frontName = null;
        $controller = null;
        $action = null;
        if (count($pathChunks) !== 4) {
            //here we count length of array === 4 since preg_split splits the n pascal-cased words into an array of n+1 element.
            // so if we need to check if the path can be divided into 3 parts we can do (count($pathChunks) !== 4)
            return [$frontName, $frontName, $controller, $isValidPath];
        }
        $isValidPath = true;
        $frontName = strtolower($pathChunks[1]);
        $controller = strtolower($pathChunks[2]);
        $action = strtolower($pathChunks[3]);
        return [$frontName, $controller, $action, $isValidPath];

    }
    public function match(RequestInterface $request)
    {
        $path = trim($request->getPathInfo(), '/');

        $isPascalCase = preg_match($this->pascalCasePattern, $path);

        if ($isPascalCase) {

            [$frontName, $controller, $action, $isValidPath] = $this->splitPathIntoChunks($path);

            if (!$isValidPath) {
                return null;
            }

            $request->setModuleName($frontName)->setControllerName($controller)->setActionName($action);

            $actionInstance = $this->actionFactory->create(\Magento\Framework\App\Action\Forward::class, ['request' => $request]);

            $request->setDispatched(true);
            //When you call $request->setDispatched(true), 
            //you're indicating to the framework 
            //that it should not continue searching for a controller to handle the request or perform any further routing. 
            //Instead, Magento will proceed with executing the specified controller action and generating the response.
            //Otherwise if it does not successfully finds the controller it will go on searching for infinitely

            return $actionInstance;
        }
        return null;


    }
}