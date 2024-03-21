<?php

namespace Webdev\AdminGrid\Model\ResourceModel\Reviews;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'id';
    /**
     * @var string
     */
    protected $_eventPrefix = 'webdev_form_table_collection';
    /**
     * @var string
     */
    protected $_eventObject = 'reviews_collection';

    /**
     * Define resource model
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Webdev\AdminGrid\Model\Reviews', 'Webdev\AdminGrid\Model\ResourceModel\Reviews');

    }
}
