<?php
/**
 * Created by PhpStorm.
 * User: sam
 * Date: 24/06/16
 * Time: 16:17
 */

namespace Application\Model\User;

use Application\Model\DomainEntityAbstract;

class User extends DomainEntityAbstract
{
    /**
     * @var string
     */
    private $_username;

    /**
     * @var string
     */
    private $_password;

    /**
     * @return string
     */

    /**
     * User constructor.
     * @param null $id
     * @param null $username
     * @param null $pass
     */
    public function __construct($id = null, $username = null, $pass = null)
    {
        $this->_id = $id;
        $this->_username = $username;
        $this->_password = $pass;
    }

    public function getUsername()
    {
        return $this->_username;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->_password;
    }

    /**
     * @param $id
     * @return User
     */
    public function setId($id)
    {
        $this->_id = $id;
        return $this;
    }

    /**
     * @param $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->_username = $username;
        return $this;
    }

    /**
     * @param $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->_password = $password;
        return $this;
    }

}