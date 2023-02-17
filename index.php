<!DOCTYPE html>
<html>
<head>
	<title>Uso de CPU</title>
</head>
<body>
	<h1>Uso de CPU</h1>
	<pre id="cpu-usage"></pre>
	<hr>
	<pre id="cpu-usageA"></pre>

	<script>
		function updateCpuUsage() {
			var xhr = new XMLHttpRequest();

			xhr.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					var data = JSON.parse(this.responseText);
					document.getElementById("cpu-usage").innerHTML = "Uso de CPU: " + (data.cpuUsage)*100 + "%";
				}
			};

			xhr.open("GET", "https://smallweb.com.br/lab/cpux.php", true);
			xhr.send();
		}

		setInterval(updateCpuUsage, 100); // atualiza a cada 1 segundo

		function updateCpuUsageA() {
			var xhr = new XMLHttpRequest();

			xhr.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					var data = JSON.parse(this.responseText);
					document.getElementById("cpu-usageA").innerHTML = data.cpuUsageA;
				}
			};

			xhr.open("GET", "https://smallweb.com.br/lab/cpuy.php", true);
			xhr.send();
		}
		setInterval(updateCpuUsageA, 1000); // atualiza a cada 1 segundo
	</script>
</body>
</html>
