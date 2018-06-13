<?php
namespace OCA\MyApp\Db;

use OCP\IDBConnection;

class AuthorDAO {

    private $db;

    public function __construct(IDBConnection $db) {
        $this->db = $db;
    }

    public function getUsers() {
        $sql = 'SELECT user,timestamp,type,file FROM oc_activity ORDER BY `timestamp` DESC';

        return $db->query($sql);
    }

}
?>
