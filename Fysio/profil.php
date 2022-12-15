<?php
    include("mysql.php");
    session_start();
    include_once 'components/header.php';
    include_once 'model/bookinglist.php';
        if(!isset($_SESSION['number'])) {
        header('location: login.php?error=noLogin');
        exit;
    }
    $number = $_SESSION['number'];

    function CallMySQL($sqlQuery) {
        global $mySQL;

        $json = [];
        $users = [];
        $number = $_SESSION['number'];

        $sqlQuery = "SELECT * FROM userTable WHERE number='$number'";
        $result = $mySQL->query($sqlQuery);
        while($row = $result->fetch_object()){
            $users[] = $row;
        }

        $json["users"] = $users;
        return json_encode($json);
    }

    $bookings = new BookingList($number);
        $sql = "SELECT * FROM userTable";
        $data = json_decode(CallMySQL($sql));
        foreach($data as $user){
            foreach($user as $info){
            echo '<section class="profile"><h1 style="text-align:center; margin-top: 5vh;"> Velkommen '.$info->firstname.' '.$info->lastname.'!</h1>
            <div class="picInfo">
                <ul>
                    <li>'.$info->firstname.' '.$info->lastname.'</li>
                    <li>Tlf: '.$info->number.'</li>
                    <li>Email: '.$info->email.'</li>
                </ul>
                <p class="redOp"><a href="bruger-opdater.php">Rediger dine oplysninger</a></p>
        </div>';
    }

    if (isset($_GET["deleteBooking"])) {
        if ($_GET["deleteBooking"] == "success") {
            echo "<p style='text-align:center; color:green;'>Bestillingen blev aflyst!</p>";
        }
    } 


        echo'<div class="mineAftaler">
        <div class="kommendeAftaler">
        <h3>Mine aftaler</h3>
                ';
                foreach($bookings->bookings as $b) {
                    echo '<div class="aftaleTop">';
                    echo '<div class="aftaleDato">';
                    echo $b["dato"]." Klokken:".$b["timeslot"]; 
                    echo '</div>';
                    echo '
                    <form method="post" action="deletebooking.php">
                    <button class="sletbookingBtn" name="notbutton" type="submit" >Slet booking</button><input name="button"
                    class="hide" value="'.$b["id"].'" /></form></div>';
                }


            echo'</div>';
            echo'<div class="gamleAftaler">';
            echo ' <h3>Mine tidligere aftaler</h3>
            ';
            foreach($bookings->oldbookings as $b) {
                echo '<div class="aftaleTop">';
                echo '<div class="aftaleDato">';
                echo $b["dato"]." Klokken:".$b["timeslot"]; 
                echo '</div>';
                echo '</div>';}

            
            echo'</div>';
            echo'</div>

            </section>';
        }

     
          include_once 'components/footer.php';
?>