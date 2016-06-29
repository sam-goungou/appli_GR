<?php
/**
 * Created by PhpStorm.
 * User: sam
 * Date: 24/06/16
 * Time: 16:36
 */

namespace Application\Model;

use Zend\Db\Adapter\Adapter;

abstract class DataMapperAbstract
{
    /**
     * @var Adapter
     */
    protected $_dbCon;

    public function __construct(Adapter $dbAdapter)
    {
        $this->_dbCon = $dbAdapter;
    }
}