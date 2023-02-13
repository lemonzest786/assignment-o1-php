<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deleting data</title>
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
        $deleteId = $_POST['deleteId'];
        $db = new PDO('mysql:host=172.31.22.43;dbname=Ronit200535182', 'Ronit200535182', 'nvqBTSUXEw');

        $sql = "SELECT * FROM chores WHERE choreId = $deleteId";
        $cmd = $db->prepare($sql);
        $cmd->execute();
        $vali = $cmd->fetch(PDO::FETCH_ASSOC);;

        $yes = true;

        if ($vali) {
            $sql = "DELETE FROM chores WHERE choreId = $deleteId";

            $cmd = $db->prepare($sql);
            $cmd->execute();

            echo '<p class="saved">DELETED SUCCESSFULLY !!</p>';
            ;
        } else {
            echo 'Error: Entered Id doesnt exists';
        }

        ?>
    </main>
</body>

</html>