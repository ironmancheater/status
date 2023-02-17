<?php
function getServerPingTime($host) {
  $timeStart = microtime(true);

  $fsock = fsockopen($host, 80, $errno, $errstr, 10);
  if (!$fsock) {
    return false;
  }

  $timeEnd = microtime(true);

  fclose($fsock);

  return round(($timeEnd - $timeStart) * 1000, 2);
}

$host = 'since1996.xyz';
$pingTime = getServerPingTime($host);
$lastmain = "never";

if ($pingTime !== false) {
  echo "Status: Online. | Last maintenance: $lastmain | $pingTime ms";
} else {
  echo "Could not connect to $host";
}
?>

