<?php
include("connection2.php");

echo "insert"; // This will help to confirm that this part of the code is being executed

if(isset($_POST["add"]) && $_POST["add"] != "") {
    echo "inside"; // This will help to confirm if the condition is being met

    $tdo = $_POST["newItem"];
    $query = "INSERT INTO entries (todo) VALUES ('$tdo')";
    $result = mysqli_query($conn, $query);

    if($result) {
        header("Location: todolist.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}else{
    echo "gand";
}

