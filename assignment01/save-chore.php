<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saving the chore data</title>
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
    // capture the form body input using the $_POST array & store in a var
    $choremen = $_POST['choremen'];
    $typechore = $_POST['typechore'];
    $day = $_POST['day'];
    $note = $_POST['note'];

    // calculate the date and time with php
    date_default_timezone_set("America/Toronto");
    $dateCreated = date("y-m-d h:i");

    // lesson 4 - add validation before saving. Check 1 at a time for descriptive errors.
    $ok = true;  // start with no validation errors

    if (empty($choremen)) {
        echo '<p class="error">Choremen is required.</p>';
        $ok = false; // error happened - bad data
    }

    if (empty($typechore)) {
        echo '<p class="error">typechore is required.</p>';
        $ok = false; // error happened - bad data
    }
    if (empty($day)) {
        echo '<p class="error">day is required.</p>';
        $ok = false; // error happened - bad data
    }
    if (empty($note)) {
        echo '<p class="error">note is required.</p>';
        $ok = false; // error happened - bad data
    }

    // only save to db if $ok has never been changed to false
    if ($ok == true) {
        // connect to the db using the PDO library
        $db = new PDO('mysql:host=172.31.22.43;dbname=Ronit200535182', 'Ronit200535182', 'nvqBTSUXEw');
      
       // set up an SQL INSERT
        $sql = "INSERT INTO chores (choremen, typechore, day, note, dateCreated) VALUES (:choremen, :typechore, :day, :note, :dateCreated)";

        // map each input to the corresponding db column
        $cmd = $db->prepare($sql);
        $cmd->bindParam(':choremen', $choremen, PDO::PARAM_STR, 100);
        $cmd->bindParam(':typechore', $typechore, PDO::PARAM_STR, 100);
        $cmd->bindParam(':day', $day, PDO::PARAM_STR, 100);
        $cmd->bindParam(':note', $note, PDO::PARAM_STR, 4000);
        $cmd->bindParam(':dateCreated', $dateCreated, PDO::PARAM_STR);

        // execute the insert
        $cmd->execute();

        // disconnect
        $db = null;

        // displaying saved message
        echo '<p class="saved">DATA SAVED !!</p>';
    }
    ?>
    </main>
</body>
</html>