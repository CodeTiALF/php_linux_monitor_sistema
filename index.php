<!DOCTYPE html>
<html>
<head>
	<title>Uso de CPU</title>
</head>
<body>
	<div id="DisplayCPU" >
		<h1>Uso de CPU</h1>
		<div id="DisplayCPUitens">
		<pre><span id="cpu-usage"></span><br /><span id="free-mem"></span><br /><span id="uptime"></span></pre>
		</div>
	</div>
	<div id="separador" ></div>
	<div id="painelClamAV" >
		<div >
    		<pre id="catClamAV"></pre>
    		<pre id="catClamAVvar"></pre>
		</div>
		<pre id="lsClamAV"></pre>
	</div>
	<div id="separador" ></div>
	<pre id="cpu-usageA"></pre>
	
	<script>
		function updateCpuUsage() {
			var xhr = new XMLHttpRequest();

			xhr.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					var data = JSON.parse(this.responseText);
					document.getElementById("cpu-usage").innerHTML = "CPU: " + "2core " + data.cpuUsage + " (" + ((data.cpuUsage)*100)/2 + "%)" ;
					document.getElementById("uptime").innerHTML = "Tempo de atividade: " + data.uptime;
                    document.getElementById("free-mem").innerHTML = "Memória: " + data.freeMem;
                }
			};

			xhr.open("GET", "https://seudominio/lab/cpux.php", true);
			xhr.send();
		}

		setInterval(updateCpuUsage, 100); // atualiza a cada 0.1 segundo

		function updateLsClamAV() {
			var xhr = new XMLHttpRequest();

			xhr.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					var data = JSON.parse(this.responseText);
					document.getElementById("lsClamAV").innerHTML = data.lsClamAV;
				}
			};

			xhr.open("GET", "https://seudominio/lab/lsClamAV.php", true);
			xhr.send();
		}
		setInterval(updateLsClamAV, 1000); // atualiza a cada 1 segundo	

		function updateCatClamAV() {
			var xhr = new XMLHttpRequest();

			xhr.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					var data = JSON.parse(this.responseText);
                	if ( data.catClamAV == null) {
					document.getElementById("catClamAV").innerHTML = "ClamAV /home/smallweb em andamento";
                    } else {
                    document.getElementById("catClamAV").innerHTML = data.catClamAV;
                    }
                	if ( data.catClamAVvar == null) {
					document.getElementById("catClamAVvar").innerHTML = "ClamAV /home/smallweb em andamento";
                    } else {
                    document.getElementById("catClamAVvar").innerHTML = data.catClamAVvar;
                    }
				}
			};

			xhr.open("GET", "https://seudominior/lab/catClamAV.php", true);
			xhr.send();
		}
		setInterval(updateCatClamAV, 1000); // atualiza a cada 1 segundo	


		function updateCpuUsageA() {
			var xhr = new XMLHttpRequest();

			xhr.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					var data = JSON.parse(this.responseText);
					document.getElementById("cpu-usageA").innerHTML = data.cpuUsageA;
				}
			};

			xhr.open("GET", "https://seudominio/lab/cpuy.php", true);
			xhr.send();
		}
		setInterval(updateCpuUsageA, 1000); // atualiza a cada 1 segundo

		
	</script>
</body>
    <style>
    body {
    min-width: 760px;
  	background-color: #000;
  	color: #00c171;
	}

	#DisplayCPU {
	display: flex;
    flex-wrap: nowrap;
    align-content: center;
    align-items: center;
    justify-content: flex-start;
	}
	#DisplayCPUitens { margin-left: 16px;}
	#cpu-usage, #uptime, #free-mem {
	font-size: 16px;
	}
	
	#painelClamAV {
    display: flex;
    flex-direction: row;
    flex-wrap: nowrap;
    align-content: center;
    justify-content: flex-start;
    align-items: center;
}
	#catClamAV, #catClamAVvar, #lsClamAV {
	/* padding: 10px; */
	font-size: 11px;
	margin-left: 16px;
	}

	#separador {
	border: 1px dashed #225a07;
	
	}
</style>
</html>

