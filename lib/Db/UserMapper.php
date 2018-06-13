<?php
namespace OCA\ActivityLog\Db;

use OCP\IDBConnection;
use OCP\AppFramework\Db\Mapper;

class UserMapper extends Mapper {

    public function __construct(IDBConnection $db) {
        parent::__construct($db, 'users', '\OCA\ActivityLog\Db\User');
    }


    public function getUsers() {
        $sql = 'SELECT uid FROM *PREFIX*users';
        $arr=$this->findEntities($sql);
        return $arr;
    }

}
