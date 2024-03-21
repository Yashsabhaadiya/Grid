<?php

namespace Webdev\AdminGrid\Model;

class Reviews extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{

    const CACHE_TAG = 'form_customer_reviews';
    /**
     * @var string
     */
    protected $_cacheTag = 'form_customer_reviews';
    /**
     * @var string
     */
    protected $_eventPrefix = 'form_customer_reviews';

    /**
     *
     */
    protected function _construct()
    {
        $this->_init('Webdev\AdminGrid\Model\ResourceModel\Reviews');
    }

    /**
     * @return string[]
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    /**
     * @return array
     */
    public function getDefaultValues()
    {
        $values = [];
        return $values;
    }
}
