<?php

namespace Cron\Analyser\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Framework\App\Config\ScopeConfigInterface;

class Data extends AbstractHelper
{
    /**
     * @var EncryptorInterface
     */
    protected $encryptor;

    /**
     * @param Context $context
    
     */
    public function __construct(
        Context $context
    )
    {
        parent::__construct($context);
    }
    /*
     * @return string
     */
    public function getThreshold($scope = ScopeConfigInterface::SCOPE_TYPE_DEFAULT)
    {
        $secret = $this->scopeConfig->getValue(
            'analyser/general/threshold',
            $scope
        );
        
        return $secret;
    }
}