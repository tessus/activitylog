<?php
namespace OCA\ActivityLog\Db;

use OCP\IDb;
use OCP\AppFramework\Db\Mapper;

class UserMapper extends Mapper {

    public function __construct(IDb $db) {
        parent::__construct($db, 'users', '\OCA\ActivityLog\Db\User');
    }


    public function getUsers() {
        $sql = 'SELECT uid FROM *PREFIX*users';
        $arr=$this->findEntities($sql);
        return $arr;
    }

}
