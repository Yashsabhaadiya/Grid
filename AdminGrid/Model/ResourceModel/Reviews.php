<?php

namespace Webdev\AdminGrid\Model\ResourceModel;

class Reviews extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    protected function _construct() {
        $this->_init('form_table', 'id');
    }
}
