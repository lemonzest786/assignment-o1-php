<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saving your Registration...</title>
    <link rel="stylesheet" href="style.css" />
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
        // capturing user data from form POST
        $choremen = $_POST['choremen'];

        // connecting to database
        $db = new PDO('mysql:host=172.31.22.43;dbname=Ronit200535182', 'Ronit200535182', 'nvqBTSUXEw');

        // setting up SQL INSERT    
        $sql = "INSERT INTO choremens (choremen) VALUES (:choremen)";

        // setting up and fill the parameter values for safety
        $cmd = $db->prepare($sql);
        $cmd->bindParam(':choremen', $choremen, PDO::PARAM_STR, 100);

        // executing the sql command
        $cmd->execute();

        // disconnecting
        $db = null;

        // displaying confirmation
        echo 'Successfully registered!';

        ?>
    </main>
</body>

</html>