<?php
/**
 * Created by PhpStorm.
 * User: sam
 * Date: 24/06/16
 * Time: 16:34
 */

namespace Application\Model;


abstract class DomainEntityAbstract
{
    /**
     * @var int
     */
    protected $_id;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->_id;
    }

}