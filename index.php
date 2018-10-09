<?php
    session_start();
    include_once("conn.php");
    
    $result = mysqli_query($mysqli, "SELECT * FROM addressbook ORDER BY id DESC");
    
    $name = $phone = $address = $id = "";

    if(isset($_SESSION["id"])){
        $id = $_SESSION["id"];
        $row = mysqli_query($mysqli, "SELECT * FROM addressbook WHERE id=$id");
        
        $arr = mysqli_fetch_array($row);
        
        $name = $arr['name'];
        $phone = $arr['phone'];
        $address = $arr['address'];
        
        unset($_SESSION["id"]);
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Address Book</title>
    </head>
    <body>
        <?php if(isset($_SESSION["success"])): ?>
        <div>
            <p><?php echo $_SESSION["success"] ?> is successfully added</p>    
        </div>
        <?php unset($_SESSION["success"]) ?>
        <?php endif; ?>
        <table>
            <tr>
                <th>Name</th> <th>Phone</th> <th>Address</th> <th>Option</th>
            </tr>
            <?php
                while($data = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    echo "<tr>";
                    echo  "<td>".$data["name"]."</td>";
                    echo "<td>".$data["phone"]."</td>";
                    echo "<td>".$data["address"]."</td>";
                    echo "<td><a href='edit.php?id=$data[id]'>Edit</a> | <a href='delete.php?id=$data[id]'>Delete</a></td>
                        </tr>";
                }
            ?>
        </table>
        <form action="add.php" method="post">
            <table>
                <tr>
                    <td>Name</td>
                    <td><input type="text" name="name" value=<?php echo $name; ?>></td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td><input type="text" name="phone" value=<?php echo $phone; ?>></td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td><input type="text" name="address" value=<?php echo $address; ?>></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="id" value=<?php echo $id; ?>></td>
                    <td><input type="submit" name="submit" value="apply"></td>
                </tr>
            </table>
        </form>
    </body>
</html>