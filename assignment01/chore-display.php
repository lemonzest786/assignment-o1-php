<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Family chore list</title>
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
        <h1>FAMILY CHORES</h1>
        <?php
        //connecting to database
        $db = new PDO('mysql:host=172.31.22.43;dbname=Ronit200535182', 'Ronit200535182', 'nvqBTSUXEw');

        //setting up sql select command
        $sql = "SELECT * FROM chores";

        //executing the select query
        $cmd = $db->prepare($sql);
        $cmd->execute();

        //storing the query results in a array
        $chores = $cmd->fetchAll();

        echo '<table>';
        echo '<thread><th>ID</th><th>Choremen</th><th>Type of Chore</th><th>Day</th><th>Note</th><th>Date</th></thread>';

        //displaying data in a loop
        foreach ($chores as $chore) {
            echo '<tr>
            <td>' . $chore['choreId'] . '</td>
            <td>' . $chore['choremen'] . '</td>
            <td>' . $chore['typechore'] . '</td>
            <td>' . $chore['day'] . '</td>
            <td>' . $chore['note'] . '</td>
            <td>' . $chore['dateCreated'] . '</td>
        </tr>';
        }
        echo '</table>';


        //disconnecting the database
        $db = null;
        ?>
    </main>

    <footer>
        <h3>DELETE DATA</h3>
        <!--deleting the data-->
        <form action="delete-choredata.php" method="post">
            <fieldset>
                <label for="deleteId">Enter ID:</label><br>
                <input type="number" name="deleteId" id="deleteId">
            </fieldset>
            <button>Delete</button>
        </form>
    </footer>
</body>

</html>