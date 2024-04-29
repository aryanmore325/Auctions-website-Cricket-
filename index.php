<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Player Registration | APL 23-24</title>
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="favicon/site.webmanifest">  
    <!-- style -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h5>Ashiward Premier League 2023-24</h5><hr>
        <h3>PLAYER REGISTRATION FORM</h3>
        <form action="submit_form.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="profilePic">Upload Picture *</label>
                <input type="file" id="profilePic" name="profilePic" accept="image/*" required>
            </div>

            <div class="form-group">
                <label for="playerName">Player Name *</label>
                <input type="text" id="playerName" name="playerName" required>
            </div>

            <div class="form-group">
                <label for="age">Age *</label>
                <input type="number" id="age" name="age" required>
            </div>

            <div class="form-group">
                <label for="category">Category *</label>
                <select id="category" name="category" required>
                    <option value="Batsman">Batsman</option>
                    <option value="Bowler">Bowler</option>
                </select>
            </div>

            <div class="form-group">
                <label for="wicketKeeper">Wicket Keeper *</label>
                <select id="wicketKeeper" name="wicketKeeper" required>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>

            <div class="form-group">
                <label for="description">About *</label>
                <textarea id="description" name="description" rows="4" cols="50" placeholder="Add Your Cricket Skills That Will Be Highlighted While Action" required></textarea>
            </div>

            <div class="form-group">
                <input type="submit" value="Submit">
            </div>
        </form>
    </div>
</body>
</html>
