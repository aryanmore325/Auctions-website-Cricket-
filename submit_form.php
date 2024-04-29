<?php
include('db_config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $playerName = $_POST["playerName"];
    $age = $_POST["age"];
    $category = $_POST["category"];
    $wicketKeeper = $_POST["wicketKeeper"];
    $description = $_POST["description"];
    

    $sql = "INSERT INTO playerlist (PlayerName, Age, Category, wicketKeeper, Description) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sisss", $playerName, $age, $category, $wicketKeeper, $description);
    $stmt->execute();
    
    $playerID = $conn->insert_id;

    $targetDir = "uploads/";
    $imagePath = $targetDir . "player_" . $playerID . ".jpg"; 

    if (move_uploaded_file($_FILES["profilePic"]["tmp_name"], $imagePath)) {
        $sql = "UPDATE playerlist SET ImagePath = ? WHERE PlayerID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $imagePath, $playerID);
        $stmt->execute();
    }

    header("Location: Register?success=true");
}

$conn->close();
?>
