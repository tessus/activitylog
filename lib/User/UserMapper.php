<?php
namespace OCA\ActivityLog\User;

use OCP\IDBConnection;
use OCP\AppFramework\Db\Mapper;

class UserMapper extends Mapper {

    public function __construct(IDBConnection $db) {
        parent::__construct($db, 'users', '\OCA\ActivityLog\User\User');
    }


    public function getUsers() {
        $sql = 'SELECT uid FROM *PREFIX*users';
        $arr=$this->findEntities($sql);
        return $arr;
    }

}
