<?php
include("connection2.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles2.css">
    <style>
        .icon {
            cursor: pointer;
            margin-left: 10px;
        }
    </style>
    <title>To do List</title>
</head>
<body>
    <div class="box" id="heading">
        <h1>TO DO LIST BY AFFAN</h1>
    </div>

    <div class="box">
        <!-- PHP code to fetch and display todos -->
        <?php
        $sql = "SELECT id, todo FROM entries";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="item">';
                echo '<input type="checkbox">';
                echo '<p>' . $row['todo'] . '</p>';
                // Delete icon/button
                echo '<span class="icon delete-icon" data-id="' . $row['id'] . '" onclick="deleteItem(this)">❌</span>';
                // Edit icon/button
                echo '<span class="icon edit-icon" data-id="' . $row['id'] . '" onclick="editItem(this)">✏️</span>';
                echo '</div>';
            }
        } else {
            echo '<p class="no-todos">No todos found</p>';
        }
        ?>

        <form class="item" id="addItemForm" action="insert.php" method="post">
            <input type="text" name="newItem" placeholder="New Item" autocomplete="off">
            <button type="submit" name="add" value="add">+</button>
        </form>
    </div>

    <script>
        function deleteItem(element) {
            var itemId = element.getAttribute('data-id');
            
            // Perform AJAX request to delete the item
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // Reload the page or update the list dynamically after successful deletion
                    location.reload(); // For demonstration, reload the page
                }
            };
            xhttp.open("POST", "delete.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("id=" + itemId);
        }

        function editItem(element) {
            var itemId = element.getAttribute('data-id');
            var updatedTodo = prompt("Update the item:", "");
            if (updatedTodo !== null) {
                // Perform AJAX request to update the item in the database
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        // Reload the page or update the list dynamically after successful update
                        location.reload(); // For demonstration, reload the page
                    }
                };
                xhttp.open("POST", "edit.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("id=" + itemId + "&todo=" + encodeURIComponent(updatedTodo));
            }
        }
    </script>
</body>
</html>
