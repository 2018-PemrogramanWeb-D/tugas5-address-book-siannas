<?php
    session_start();
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        
        include_once("conn.php");
        
        if($id = $_POST['id']){
            $result = mysqli_query($mysqli, "UPDATE addressbook SET name='$name',phone='$phone',address='$address' WHERE id=$id");
        }else{
            $result = mysqli_query($mysqli, "INSERT INTO addressbook(name,phone,address) VALUES('$name','$phone','$address')");
        
            $_SESSION["success"] = $name;
        }

        header("Location: ./index.php");
    }
?>