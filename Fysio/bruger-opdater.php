<?php
    include("mysql.php");
    session_start();
        if(!isset($_SESSION['number'])) {
        header('location: login.php?error=noLogin');
        exit;
    }
    include_once 'components/header.php';

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
            echo '<div class="form-form-register"><h1 style="text-align:center"> Hej '.$info->firstname.' '.$info->lastname.'</h1><br>';
            if (isset($_GET["status"])) {
                if ($_GET["status"] == "success") {
                    echo "<p class='update_success'>Din information blev opdateret</p>";
                }
                else if ($_GET["status"] == "fail_empty") {
                    echo "<p class='update_fail'>Udfyld alle felter</p>";
                }
            }
        
            echo '<form  action="opdater-backend.php" name="register" method="post">
            Fornavn: <input type="text" name="name" value="'.$info->firstname.'"><br>
            Efternavn: <input type="text" name="lastname" value="'.$info->lastname.'"><br>
            Email: <input type="text" name="email" value="'.$info->email.'"><br>
            <button class="update-button" type="submit" name="update">Opdater</button>
            </form></div>';
        }
     }

     
          include_once 'components/footer.php';
?>