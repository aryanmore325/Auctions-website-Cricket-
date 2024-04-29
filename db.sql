auction

CREATE TABLE playerlist (
    PlayerID INT AUTO_INCREMENT PRIMARY KEY,
    PlayerName VARCHAR(255) NOT NULL,
    Age INT NOT NULL,
    Category ENUM('Batsman', 'Bowler') NOT NULL,
    WicketKeeper ENUM('Yes', 'No') NOT NULL,
    Description TEXT,
    ImagePath VARCHAR(255)
);