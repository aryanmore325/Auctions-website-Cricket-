<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Player Information | APL 23-24</title>
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="favicon/site.webmanifest">      
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            text-align: center;
        }
        h2 {
            color: #192655;
            text-align: center;
            padding: 20px;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #192655;
            color: #f4f4f4;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        a {
            text-decoration: none;
            background-color: #192655;
            color: #f4f4f4;
            padding: 5px 10px;
            border-radius: 5px;
        }
        a:hover {
            color: #FFBA86;
        }
        @media screen and (max-width: 768px) {
            h2{
                font-size: 15px;
            }
            table{
                font-size: 9px;
            }
            .hideid{
                display: none;
            }
        }
    </style>    
</head>
<body>
    <?php
    include('db_config.php');

    function player_list() {
        global $conn;

        $sql = "SELECT PlayerID, PlayerName, Age, Category, WicketKeeper, Description, ImagePath FROM playerlist";
        $result = $conn->query($sql);

        $Users = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $Users[] = $row;
            }
        }

        return $Users;
    }
    
    $players = player_list();
    $totalPlayers = count($players);

    ?>
    <h2>Player Information Table</h2>
    <small>Total Players: <?php echo $totalPlayers; ?></small><br><br>
    <input type="text" id="nameFilter" oninput="filterTable()" placeholder="Search by Name">
    <input type="text" id="categoryFilter" oninput="filterTable()" placeholder="Search by Category">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Category</th>
                <th>Wicket Keeper</th>
                <th class="hideid">Description</th>
                <th class="hideid">Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($players as $player) { ?>
                <tr>
                    <td><?php echo $player['PlayerID']; ?></td>
                    <td><?php echo $player['PlayerName']; ?></td>
                    <td><?php echo $player['Age']; ?></td>
                    <td><?php echo $player['Category']; ?></td>
                    <td><?php echo $player['WicketKeeper']; ?></td>
                    <td class="hideid"><?php echo $player['Description']; ?></td>
                    <td class="hideid"><img src="<?php echo $player["ImagePath"]; ?>" width='60'></td>
                    <td>
                        <a href='delete.php?PlayerID=<?php echo $player["PlayerID"]; ?>'>Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <script>
        function filterTable() {
            var nameInput = document.getElementById("nameFilter").value.toLowerCase();
            var categoryInput = document.getElementById("categoryFilter").value.toLowerCase();
            var tableRows = document.querySelectorAll("table tbody tr");

            tableRows.forEach(function (row) {
                var nameCell = row.querySelector("td:nth-child(2)").textContent.toLowerCase();
                var categoryCell = row.querySelector("td:nth-child(4)").textContent.toLowerCase();

                var nameMatch = nameCell.includes(nameInput);
                var categoryMatch = categoryCell.includes(categoryInput);

                if (nameMatch && categoryMatch) {
                    row.style.display = "table-row";
                } else {
                    row.style.display = "none";
                }
            });
        }
    </script>
</body>
</html>
