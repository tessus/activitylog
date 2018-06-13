<?php
namespace OCA\ActivityLog\Db;
use JsonSerializable;
use OCP\AppFramework\Db\Entity;

class Activity extends Entity implements JsonSerializable{

    public $user;
    public $timestamp;
    public $type;
    public $file;

    public function jsonSerialize() {
        return [
            'user' => $this->user,
            'timestamp' => $this->timestamp,
            'type' => $this->type,
            'file' => $this->file
        ];
    }
}
