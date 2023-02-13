<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New choremen</title>
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
        <!--form for entering new choremen-->
        <h2>ENTER NEW CHOREMEN</h2>
        <form action="save-choremen.php" method="post">
            <fieldset>
                <label for="choremen">Name:</label>
                <input type="text" name="choremen" required />
            </fieldset>
            <button class="btnSave">Register</button>
        </form>
    </main>
</body>

</html>