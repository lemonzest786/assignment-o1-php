<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Chore</title>
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

        <h2>ADD NEW COMPLETED CHORES</h2>
        <form action="save-chore.php" method="post">
            <fieldset>
                <label for="choremen">Choremen:</label>
                <select name="choremen" id="choremen">
                    <?php
                    // connecting the database
                    $db = new PDO('mysql:host=172.31.22.43;dbname=Ronit200535182', 'Ronit200535182', 'nvqBTSUXEw');

                    // using SELECT to fetch the data
                    $sql = "SELECT * FROM choremens";

                    // running the query
                    $cmd = $db->prepare($sql);
                    $cmd->execute();
                    $choremens = $cmd->fetchAll();

                    // loop through the data to create a list item
                    foreach ($choremens as $choremen) {
                        echo '<option>' . $choremen['choremen'] . '</option>';
                    }


                    ?>
                </select>
            </fieldset>

            <fieldset>
                <label for="typechore">Type of chore:</label>
                <select name="typechore" id="typechore">
                    <?php

                    // using SELECT to fetch the data
                    $sql = "SELECT * FROM typechores";

                    // running the query
                    $cmd = $db->prepare($sql);
                    $cmd->execute();
                    $typechores = $cmd->fetchAll();

                    // loop through the data to create a list item
                    foreach ($typechores as $typechore) {
                        echo '<option>' . $typechore['typechore'] . '</option>';
                    }


                    ?>
                </select>
            </fieldset>

            <fieldset>
                <label for="day">Day:</label>
                <select name="day" id="day">
                    <?php


                    // using SELECT to fetch the data
                    $sql = "SELECT * FROM days";

                    // running the query
                    $cmd = $db->prepare($sql);
                    $cmd->execute();
                    $days = $cmd->fetchAll();

                    // loop through the data to create a list item
                    foreach ($days as $day) {
                        echo '<option>' . $day['day'] . '</option>';
                    }

                    // disconnecting the database
                    $db = null;
                    ?>
                </select>
            </fieldset>

            <fieldset>
                <label for="note">Note:</label>
                <textarea name="note" id="note" required maxlength="4000"></textarea>
            </fieldset>
            <button class="btnSave">Save</button>
        </form>
    </main>
</body>

</html>