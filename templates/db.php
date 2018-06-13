<?php
// db/db.php


namespace OCA\ActivityLog;

use OCP\IDBConnection;

class ActivityLogDB {

    private $db;
    private $activityManager;

    public function __construct(IManager $activityManager, IDBConnection $connection) {
		    $this->activityManager = $activityManager;
		    $this->db = $connection;
	   }

    public function getAll() {
        $sql = 'SELECT * FROM `oc_users`';
        //$query = $this->db->getQueryBuilder();
        //$query->select('*')->from('activity');
        //$stmt->execute();

        //$row = $stmt->fetch();

        //$stmt->closeCursor();
    }

}
error_reporting(E_ALL);
ini_set('display_errors', 'on');
$obj = new ActivityLogDB();
$obj->getAll();
