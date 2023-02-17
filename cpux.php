<?php
$cpuUsageA = shell_exec("top -bn1");
echo json_encode(array("cpuUsageA" => $cpuUsageA));
?>
