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
if (!empty($_POST["url"])) { 
    $url = $_POST["url"];

    if (!filter_var($url, FILTER_VALIDATE_URL)) {
        if (strpos($url,'http') === false){
            $url = "http://$url";
        }
    }
    
    
    require_once("config.php");
    require_once("utils.php");


    // Twitter counter
    require_once("TwitterAPIExchange.php");

    $twitter_url = "https://api.twitter.com/1.1/search/tweets.json";
    $requestMethod = 'GET';
    $getfield = "?q=$url&result_type=recent&count=100&include_entities=false&include_user_entities=false";

    $twitter = new TwitterAPIExchange($twitter_settings);
    $result = json_decode(
        $twitter->setGetfield($getfield)
        ->buildOauth($twitter_url, $requestMethod)
        ->performRequest()
    );
    $twitter_count = sizeof($result->statuses);
    

    // Facebook counter
    $facebook_url = "http://graph.facebook.com/?id=$url";
    $result = json_decode(file_get_contents($facebook_url));
    $facebook_count = $result->share->share_count;
    

    // Pinterest counter
    $pinterest_url = "https://api.pinterest.com/v1/urls/count.json?callback=jsonp&url=$url";
    $result = jsonp_decode(file_get_contents($pinterest_url));
    $pinterest_count = $result->count;


    // Saving data to database
    $db = new PDO($dsn, $user, $password, $options);

    $count_sql = "SELECT count(*) FROM results WHERE url = ?";
    $stmt = $db->prepare($count_sql);
    $stmt->execute([$url]);
    $existsUrl = $stmt->fetchColumn();

    if ($existsUrl==0) {
        $insert_sql = "INSERT INTO results(url, twitter_count, facebook_count, pinterest_count) VALUES (?, ?, ?, ?)";
        $stmt = $db->prepare($insert_sql);
        $stmt->execute([$url, $twitter_count, $facebook_count, $pinterest_count]);
    
    } else {
        $insert_sql = "UPDATE results SET twitter_count = ?, facebook_count = ?, pinterest_count = ? WHERE url = ?";
        $stmt = $db->prepare($insert_sql);
        $stmt->execute([$twitter_count, $facebook_count, $pinterest_count, $url]);
    }

}
?>
</body>
</html>
