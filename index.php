<h1>Hello world</h1>

 <?php
function getIpAddress() {
    if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ipAddresses = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
        return trim(end($ipAddresses));
    }
    else {
        return $_SERVER['REMOTE_ADDR'];
    }
}
 $ip = getIpAddress();
 $country = file_get_contents('http://ipinfo.io/'.$ip); //fetch the country
$date = date(DATE_RFC822);
$country = json_decode($country, true)["country"]; //turn the IP string (API) into an array
$data = "<tr><td>".$date."</td><td>".$ip."</td><td>".$country."</td></tr>"; //format a log entry
 file_put_contents('./log.txt', $data, FILE_APPEND | LOCK_EX); //write to the log file
 ?>
