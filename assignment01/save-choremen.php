<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saving your Registration...</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<header>
        <nav>
            <ul>
                <img id="logo" src="logo.png" alt="logo">
                <li><a href="./choremen.php">New Choremen</a></li>
                <li><a href="./enter-chore.php">Enter Chores</a></li>
                <li><a href="./chore-display.php">Display Chores</a></li>
            </ul>
        </nav>
    </header>
    
    <main>
    <?php
    // capture user data from form POST
    $choremen = $_POST['choremen'];

        // connect
        $db = new PDO('mysql:host=172.31.22.43;dbname=Ronit200535182', 'Ronit200535182', 'nvqBTSUXEw');

        // set up SQL insert
        $sql = "INSERT INTO choremens (choremen) VALUES (:choremen)";

        // set up and fill the parameter values for safety
        $cmd = $db->prepare($sql);
        $cmd->bindParam(':choremen', $choremen, PDO::PARAM_STR, 100);

        // execute the sql command
        $cmd->execute();

        // disconnect
        $db = null;

        // show confirmation
        echo 'Successfully registered!';
        
    ?>
    </main>
</body>
</html>