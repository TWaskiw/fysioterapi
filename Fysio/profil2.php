<?php
    include("mysql.php");
    session_start();
        if(!isset($_SESSION['number'])) {
        header('location: login.php?error=noLogin');
        exit;
    }
    include_once 'header.php';

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
    
        $sql = "SELECT * FROM userTable";
        $data = json_decode(CallMySQL($sql));
        foreach($data as $user){
            foreach($user as $info){
            echo '<div><h1 style="text-align:center; margin-top: 25vh;"> Velkommen '.$info->firstname.' '.$info->lastname.'!</h1><br>
            <div class="picInfo">
                <ul>
                    <li>'.$info->firstname.' '.$info->lastname.'</li>
                    <li>Tlf: '.$info->number.'</li>
                    <li>Email: '.$info->email.'</li>
                </ul>
                <p class="redOp"><a href="bruger-opdater.php">Rediger dine oplysninger</a></p>
        </div>
        <h3>Mine Aftaler</h3>
        <div class="mineAftaler">
        <div class="aftaleTop">  
        <div class="aftaleDato">
                <p>D. 15. Dec. 2022 | Kl. 12:30</p>
            </div>
            <p>Hos Mark Skals</p>
            <p>Adresse: Rentemestervej 8 Odense</p>
            </div> 
            <div class="aftaleBot">
                <button class="aflysTid"><i class="fa-solid fa-trash-can"></i>Aflys tid</button>
            </div>
        </div>
            
            </div>';

            }
        }

     
          include_once 'footer.php';
?>