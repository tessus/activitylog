<?php
namespace OCA\ActivityLog\Db;

use OCP\IDBConnection;
use OCP\AppFramework\Db\Mapper;

class ActivityMapper extends Mapper {

    public function __construct(IDBConnection $db) {
        parent::__construct($db, 'activity', '\OCA\ActivityLog\Db\Activity');
    }


    public function findAll() {
        $sql = 'SELECT user,timestamp,type,file FROM *PREFIX*activity';
        $arr=$this->findEntities($sql);
        $out="";
        $arrQ    = explode("|", $_GET['q']);
        $Quser = $arrQ[0];
        $Qtimestamp   = $arrQ[1];
        $Qtype = $arrQ[2];
        $Qfile   = $arrQ[3];
        foreach ($arr as $key => $value) {

          $user = $value->user;
          $timestamp = $value->timestamp;
          $type = $value->type;
          $file = $value->file;
          if (isset($Quser) && $Quser != "" && !(stripos($user, $Quser) !== false)) {
              continue;
          }

          //01/01/2015 - 01/31/2015
          if (isset($Qtimestamp) && $Qtimestamp != "") {


              $dateArray       = explode(" - ", $Qtimestamp);
              $dataArrayParsed = array();
              array_push($dataArrayParsed, strval(strtotime(str_replace("/", "-", $dateArray[0]))));
              array_push($dataArrayParsed, strval(strtotime(str_replace("/", "-", $dateArray[1]))));
              if (!($dataArrayParsed[0] <= $timestamp && $dataArrayParsed[1] >= $timestamp)) {
                  continue;
              }
          }
          if (isset($Qtype) && $Qtype != "" && !(stripos(ucwords(strtolower(str_replace("_", " ", $type))), $Qtype) !== false)) {
              continue;
          }
          if (isset($Qfile) && $Qfile != "" && !(stripos($file, $Qfile) !== false)) {
              continue;
          }
          $out.= "<tr>";
          $out.= "<td>".$user."</td>";
          $out.= "<td>".date("F j, Y, g:i a", $timestamp)."</td>";
          $out.= "<td>".ucwords(strtolower(str_replace("_", " ", $type)))."</td>";
          $out.= "<td>".$file."</td>";
          $out.= "</tr>";
        }

        return $out;

    }

}
