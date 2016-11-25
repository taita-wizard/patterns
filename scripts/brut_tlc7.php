<?php
header('Content-Type: text/html; charset=utf-8');
set_time_limit(0);
$path = "C:/res/";
$start = microtime(true);

$alph = "abcdefghijklmnopqrstuvwxyz";
$param = 6;
$j = $k = $found = 0;
if (isset($_GET['param']) && isset($_GET['j']) && isset($_GET['k'])) {
    $param = (int)$_GET['param'];
    $j = (int)$_GET['j'];
    $k = (int)$_GET['k'];
}
echo "перебор: " . str_pad($param, 2, "0", STR_PAD_LEFT) . "_" . $alph[$j] . $alph[$k] . "[a-z]<br>";
if ($param >= 34) {
    die("done");
}

$fp = fopen($path . "res.txt", "a");
for ($h = 0; $h < strlen($alph); $h++) {
    $name = "https://www.tlc7.ru/uploads/shop/bi/" . str_pad($param, 2, "0",
            STR_PAD_LEFT) . "_" . $alph[$j] . $alph[$k] . $alph[$h] . ".mp3";
    if (get_status($name) == 200) {
        fwrite($fp, $name . "\r\n");
        $found = true;
        // расскомментить срочку ниже для скачивания файлов
        file_put_contents($path, file_get_contents($name));
        break;
    }
}

if (!$found) {
    $k++;
    if ($k == strlen($alph)) {
        $j++;
        if ($j == strlen($alph)) {
            $param++;
            $j = 0;
        }
        $k = 0;
    }
} else {
    $param++;
    $k = $j = 0;
}

fclose($fp);

function get_status($url)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    return $httpcode;
}

echo 'Время выполнения скрипта: ' . (microtime(true) - $start) . ' сек.';
?>

<script>
    setTimeout('location="http://test/oleg/?param=<?php echo $param; ?>&j=<?php echo $j;?>&k=<?php echo $k;?>";', 10);
</script>