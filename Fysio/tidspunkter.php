<?php
    // -------------------------------------------------------------------------
    //   This script must take care of all API requests, and return a response
    // -------------------------------------------------------------------------

    // Remember to change the login information for the database, inside of mysql.php
    include_once("mysql.php");

    // Function used to execute the MySQL query, and convert the response to JSON format
    function CallMySQL($sqlQuery) {
        // Get access to the global variable $mySQL from the mysql.php script
        global $mySQL;

        $json = [];
        $tider = [];


        $result = $mySQL->query($sqlQuery);
        while($row = $result->fetch_object()){
            $tider[] = $row;
        }
        
        $json["tider"] = $tider;
        return json_encode($json);
    }

    $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : "";

    if($action == "ledigeTider") {
        $sql = "SELECT timeslot FROM bookingsList WHERE dato='$dato'";
        $data = json_decode(CallMySQL($sql));
        foreach($data as $timeslot){
            foreach($user as $info){
            echo $info->id.'<br>';
        }
    }
    }

?>