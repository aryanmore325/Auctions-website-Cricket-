<?php

include('db_config.php');

if (isset($_GET["PlayerID"])) {
    $playerID = $_GET["PlayerID"];
    $sql = "DELETE FROM playerlist WHERE PlayerID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $playerID);
    $stmt->execute();
    $conn->close();
    
    header("Location: display_players.php");
}
