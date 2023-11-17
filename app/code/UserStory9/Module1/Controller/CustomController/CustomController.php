<?php

namespace UserStory9\Module1\Controller\CustomController;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Config\ScopeConfigInterface;

class CustomController extends Action
{
    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * @var ScopeConfigInterface
     */
    protected $scopeConfig;

    /**
     * Constructor.
     *
     * @param Context $context
     * @param PageFactory $resultPageFactory
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        ScopeConfigInterface $scopeConfig
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * Execute action.
     *
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        $enable = $this->scopeConfig->getValue('generalsection/custom_configuration/enable', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);

        if ($enable == true) { // Assuming "Yes" is stored as true
            $textToDisplay = $this->scopeConfig->getValue('generalsection/custom_configuration/text_to_display', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);

            // Your logic to display or use $textToDisplay goes here

            echo $textToDisplay;
        }
        $resultPage = $this->resultPageFactory->create();

        return $resultPage;    
    }
}
