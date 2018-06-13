<?php
echo "%activitylog%";
//$db     = new mysqli("localhost", "nextuser", "nextpassword", "nextdatabase");
$result = $db->query("SELECT user,timestamp,type,file FROM oc_activity ORDER BY `timestamp` DESC");
if ($_GET['q'] == "*") {
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        $i = 0;
        foreach ($row as $key) {
            if ($row['type'] != "calendar" && $i % 2 == 0) {
                if ($i == 2) {
                    echo "<td>" . date("F j, Y, g:i a", $key) . "</td>";


                } elseif ($i == 4) {
                    echo "<td>" . ucwords(strtolower(str_replace("_", " ", $key))) . "</td>";
                } else {
                    echo "<td>" . $key . "</td>";
                }
            }
            $i++;
        }
        echo "</tr>";
    }
} else {
    $arr    = explode("|", $_GET['q']);
    $utente = $arr[0];
    $data   = $arr[1];
    $azione = $arr[2];
    $file   = $arr[3];
    while ($row = mysqli_fetch_array($result)) {
        if (isset($utente) && $utente != "" && !(stripos($row['user'], $utente) !== false)) {
            continue;
        }

        //01/01/2015 - 01/31/2015
        if (isset($data) && $data != "") {


            $dateArray       = explode(" - ", $data);
            $dataArrayParsed = array();
            array_push($dataArrayParsed, strval(strtotime(str_replace("/", "-", $dateArray[0]))));
            array_push($dataArrayParsed, strval(strtotime(str_replace("/", "-", $dateArray[1]))));
            if (!($dataArrayParsed[0] <= $row['timestamp'] && $dataArrayParsed[1] >= $row['timestamp'])) {
                continue;
            }
        }
        if (isset($azione) && $azione != "" && !(stripos(ucwords(strtolower(str_replace("_", " ", $row['type']))), $azione) !== false)) {
            continue;
        }
        if (isset($file) && $file != "" && !(stripos($row['file'], $file) !== false)) {
            continue;
        }
        echo "<tr>";
        $i = 0;
        foreach ($row as $key) {
            if ($row['type'] != "calendar" && $i % 2 == 0) {

                if ($i == 2) {
                    echo "<td>" . date("F j, Y, g:i a", $key) . "</td>";

                } elseif ($i == 4) {
                    echo "<td>" . ucwords(strtolower(str_replace("_", " ", $key))) . "</td>";
                } else {
                    echo "<td>" . $key . "</td>";
                }
            }
            $i++;
        }
        echo "</tr>";
    }
}




mysqli_close($db);
echo "%activitylog%";
?>
