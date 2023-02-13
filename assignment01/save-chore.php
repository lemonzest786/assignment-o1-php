<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saving the chore data</title>
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
        // capture the form body input using the $_POST array & store in a var
        $choremen = $_POST['choremen'];
        $typechore = $_POST['typechore'];
        $day = $_POST['day'];
        $note = $_POST['note'];

        // calculate the date and time with php
        date_default_timezone_set("America/Toronto");
        $dateCreated = date("y-m-d h:i");

        $yes = true;
        //adding validation before saving the data
        if (empty($choremen)) {
            echo '<p> Choremen is required.</p>';
            $yes = false;
        }

        if (empty($typechore)) {
            echo '<p> typechore is required.</p>';
            $yes = false;
        }
        if (empty($day)) {
            echo '<p> day is required.</p>';
            $yes = false;
        }
        if (empty($note)) {
            echo '<p> note is required.</p>';
            $yes = false;
        }


        if ($yes == true) {
            // connecting to the db using the PDO library
            $db = new PDO('mysql:host=172.31.22.43;dbname=Ronit200535182', 'Ronit200535182', 'nvqBTSUXEw');

            // seting up an SQL INSERT query
            $sql = "INSERT INTO chores (choremen, typechore, day, note, dateCreated) VALUES (:choremen, :typechore, :day, :note, :dateCreated)";

            // mapping each input to the corresponding db column
            $cmd = $db->prepare($sql);
            $cmd->bindParam(':choremen', $choremen, PDO::PARAM_STR, 100);
            $cmd->bindParam(':typechore', $typechore, PDO::PARAM_STR, 100);
            $cmd->bindParam(':day', $day, PDO::PARAM_STR, 100);
            $cmd->bindParam(':note', $note, PDO::PARAM_STR, 4000);
            $cmd->bindParam(':dateCreated', $dateCreated, PDO::PARAM_STR);

            // executing the insert
            $cmd->execute();

            // disconnecting the database
            $db = null;

            // displaying saved message
            echo '<p class="saved">DATA SAVED !!</p>';
        }
        ?>
    </main>
</body>

</html>