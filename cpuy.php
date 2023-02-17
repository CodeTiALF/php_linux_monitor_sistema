<?php
$cpuUsage = shell_exec("top -bn1 | grep load | awk '{printf \"%.2f\", $(NF-2)}'");
echo json_encode(array("cpuUsage" => $cpuUsage));
?>
