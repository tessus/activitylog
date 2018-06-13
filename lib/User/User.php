<?php
namespace OCA\ActivityLog\User;
use JsonSerializable;
use OCP\AppFramework\Db\Entity;

class User extends Entity implements JsonSerializable{

    public $uid;

    public function jsonSerialize() {
        return [
            'uid' => $this->uid
        ];
    }
}
