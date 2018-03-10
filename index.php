<?php
if (isset($_POST["url"])) { 
    $url = $_POST["url"];

    if (!filter_var($url, FILTER_VALIDATE_URL)) {
        if (strpos($url,'http') === false){
            $url = "http://$url";
        }
    }

} else {
    $url = "";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Share counter</title>
</head>
<body>

    <form action="" method="post">
        <label for="url">Url:</label>
        <input type="text" name="url" id="url" value="<?php echo $url; ?>" />
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
