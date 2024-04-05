<?php
include("connection2.php");

// Check if item ID is provided
if(isset($_POST["id"])) {
    $itemId = $_POST["id"];

    // Prepare and execute the SQL query to delete the item
    $query = "DELETE FROM entries WHERE id = $itemId";
    $result = mysqli_query($conn, $query);

    // Check if deletion was successful
    if($result) {
        // Redirect back to the todo list
        header("Location: todolist.php");
        exit(); // Ensure that no other output is sent to the browser before the redirection
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Item ID not provided.";
}

