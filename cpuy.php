/*  Este código em PHP usa a função shell_exec para executar o comando "top -bn1" no terminal.
    O resultado da execução desse comando é armazenado na variável $cpuUsageA. Em seguida, o
    código usa a função json_encode para retornar um objeto JSON contendo a chave "cpuUsageA"
    e o valor da variável $cpuUsageA.  

    Créditos: Este código foi criado por Andre Luis Filus (web@andrefilus.com.br) com
              o auxílio de ChatGPT, uma grande modelo de linguagem treinada pela OpenAI.
     
    Licença: Licença MIT, que permite o uso, cópia, modificação, fusão, publicação, distribuição,
             sublicenciamento e/ou venda de cópias do software sem restrições, desde que sejam
             incluídos os direitos autorais e esta permissão seja incluída em todas as cópias ou
             partes significativas do software.
*/
<?php
// Executa o comando "top -bn1" na linha de comando e armazena a saída na variável $cpuUsageA
$cpuUsageA = shell_exec("top -bn1");
// Cria um array associativo com a chave "cpuUsageA" e o valor da variável $cpuUsageA, e converte para JSON
echo json_encode(array("cpuUsageA" => $cpuUsageA));
?>
