/*  Este é um código PHP que coleta informações sobre o uso da CPU, 
    tempo de atividade e uso de memória livre de um sistema operacional 
    Linux usando comandos de shell do Linux.

    Créditos: Este código foi criado por Andre Luis Filus (web@andrefilus.com.br) com
              o auxílio de ChatGPT, uma grande modelo de linguagem treinada pela OpenAI.
    
    Licença: Licença MIT.
*/
<?php
// Obtém o uso da CPU usando o comando "top" do Linux
$cpuUsage = shell_exec("top -bn1 | grep load | awk '{printf \"%.2f\", $(NF-2)}'"); 
// Obtém o tempo de atividade usando o comando "uptime" do Linux
$uptime = shell_exec("uptime | awk '{print $3,$4,$5}'"); 
// Obtém o uso de memória livre usando o comando "free" do Linux
$freeMem = shell_exec("free -m | awk 'NR==2{printf \"%s/%sMiB (%.2f%%)\",$3, $2, $3*100/$2}'"); 
// Codifica as informações coletadas em um objeto JSON e as exibe
echo json_encode(array("cpuUsage" => $cpuUsage, "uptime" => $uptime, "freeMem" => $freeMem));
?>
