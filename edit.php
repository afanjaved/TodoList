<?php
include("connection2.php");

// Check if item ID and updated todo text are provided
if(isset($_POST["id"]) && isset($_POST["todo"])) {
    $itemId = $_POST["id"];
    $updatedTodo = $_POST["todo"];

    // Prepare and execute the SQL query to update the item
    $query = "UPDATE entries SET todo = '$updatedTodo' WHERE id = $itemId";
    $result = mysqli_query($conn, $query);

    // Check if update was successful
    if($result) {
        // Redirect back to the todo list
        header("Location: todolist.php");
        exit(); // Ensure that no other output is sent to the browser before the redirection
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Item ID or updated todo not provided.";
}
