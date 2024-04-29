<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auction | APL 23-24</title>
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="favicon/site.webmanifest">      
    <style>
        body {
            display: flex;
            justify-content: center;
            font-family: Helvetica, sans-serif;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: #F0F4F7;
        }

        .player-card-container {
            text-align: center;
            padding: 20px;
            border: 3px solid #192655;
            border-radius: 10px;
            width: 350px;
            background: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .player-card {
            margin: 0;
            padding: 20px;
        }

        .player-pic {
            border-radius: 50%;
            width: 150px;
            height: 150px;
            object-fit: cover;
        }

        .button-container {
            display: flex;
            justify-content: space-between;
        }

        .button-container button {
            padding: 10px 20px;
            margin: 5px;
        }
        h1{
            color: #192655;
        }
        button{
            background: #192655;
            color: #fff;
        }
        @media only screen and (max-width: 768px)  {
            .player-card-container{
                margin: 10px;
                padding: 0px 10px 20px 10px;
            }
            h1{
                font-size: 20px;
            }
            h3{
                font-size: 15px;
            }
        }
    </style>
</head>

<body>
    <?php
    include('db_config.php');

    $sql = "SELECT PlayerID, PlayerName, Category, WicketKeeper, Description, ImagePath FROM playerlist";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $players = $result->fetch_all(MYSQLI_ASSOC);

        $currentIndex = isset($_POST['currentIndex']) ? (int)$_POST['currentIndex'] : 0;

        if (isset($_POST['next'])) {
            $currentIndex = ($currentIndex + 1) % count($players);
        } elseif (isset($_POST['previous'])) {
            $currentIndex = ($currentIndex - 1 + count($players)) % count($players);
        }

        $currentPlayer = $players[$currentIndex];
        ?>

        <div class="player-card-container">
        <h1>Ashiward Premier League 2023-24 </h1><hr>
            <div class="player-card">
                <h3>Ashiward Auction 23-24</h3>
                <img class="player-pic" src="<?php echo $currentPlayer['ImagePath']; ?>" alt="Player's Picture">
                <h2><?php echo $currentPlayer['PlayerName']; ?></h2>
                <p>Category: <?php echo $currentPlayer['Category']; ?></p>
                <p>Wicket Keeper: <?php echo $currentPlayer['WicketKeeper']; ?></p>
                <p><?php echo $currentPlayer['Description']; ?></p>
            </div>

            <form method="post">
                <input type="hidden" name="currentIndex" value="<?php echo $currentIndex; ?>">
                <div class="button-container">
                    <button type="submit" name="previous">Previous</button>
                    <button type="submit" name="next">Next</button>
                </div>
            </form>
        </div>

    <?php
    } else {
        echo "No players found.";
    }

    $conn->close();
    ?>
</body>

</html>
