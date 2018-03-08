<!DOCTYPE html>
<html>
<head>
    <title>Share counter</title>
</head>
<body>

    <form action="" method="post">
        <label for="url">Url:</label>
        <input type="text" name="url" id="url" />
        <button type="submit">Count shares</button>
    </form>

<?php
include 'config.php';

if (isset($_POST['url'])) {
   $connection = new PDO($dsn, $user, $password, $options); 

}

?>


</body>
</html>
