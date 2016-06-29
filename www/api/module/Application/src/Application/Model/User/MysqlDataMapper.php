<?php
/**
 * Created by PhpStorm.
 * User: sam
 * Date: 24/06/16
 * Time: 16:19
 */

namespace Application\Model\User;

use Application\Model\DataMapperAbstract;

class MYSQLDataMapper extends DataMapperAbstract
{
    /**
     * @param User $user
     */
    public function saveUser(User $user)
    {
        $qi = function($name) { return $this->_dbCon->platform->quoteIdentifier($name); };
        $fp = function($name) { return $this->_dbCon->driver->formatParameterName($name); };
        
        $data = array(
            'id' => $user->getId(),
            'username' => $user->getUsername(),
            'password' => $user->getPassword()
        );

        if (null === ($id = $user->getId()))
        {
            unset($data['userid']);

            $sql = 'INSERT INTO `users` VALUES ('. $fp('id') .','. $fp('username') .','. $fp('password') .')';
            
            $statement = $this->_dbCon->query($sql);

            $statement->execute($data);
        }
        else
        {
            $sql = 'UPDATE `users` SET '. $qi('id') .' = '. $fp('id')
                    .', '. $qi('username') .' = '. $fp('username')
                    .', '. $qi('password') .' = '. $fp('password')
                    .'WHERE `users`.' . $qi('id') .' = ' .$fp('id');

            $statement = $this->_dbCon->query($sql);

            $statement->execute($data);

        }
    }


    /**
     * @param $id
     * @return User
     */
    public function fetchUserById($id)
    {
        $qi = function($name) { return $this->_dbCon->platform->quoteIdentifier($name); };
        $fp = function($name) { return $this->_dbCon->driver->formatParameterName($name); };

        $sql = 'SELECT * FROM `users` WHERE '. $qi('id') .' = '. $fp('id');

        $statement = $this->_dbCon->query($sql);
        $parameter = array('id' => $id);

        $result = $statement->execute($parameter);
        $row = $result->current();

        return $this->mapObject($row);

    }


    /**
     * @param $username
     * @return User
     */
    public function fetchUserByUsername($username)
    {
        $qi = function($name) { return $this->_dbCon->platform->quoteIdentifier($name); };
        $fp = function($name) { return $this->_dbCon->driver->formatParameterName($name); };

        $sql = 'SELECT * FROM `users` WHERE ' . $qi('username') . ' = ' . $fp('username');

        $statement = $this->_dbCon->query($sql);
        $parameter = array('username' => $username);

        $result = $statement->execute($parameter);
        $row = $result->current();

        return $this->mapObject($row);
    }


    /**
     * @param $row
     * @return User
     */
    public function mapObject($row)
    {
        $entry = new User();

        $entry->setId($row['id']);
        $entry->setUsername($row['username']);
        $entry->setPassword($row['password']);

        return $entry;
    }

}