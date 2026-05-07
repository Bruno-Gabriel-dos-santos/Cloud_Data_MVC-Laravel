<!DOCTYPE HTML>
<!--
	Aerial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->

<html>
	<head>
		<title>Bruno Cloud Data</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
		

	</head>

	<body class="is-preload" style="background-color:grey;">
		<div id="wrapper">
			<div id="bg"></div>
			
			<div id="main">
			
				<!-- Header -->
					<header id="header">
						<h1>Bruno Cloud Data</h1>
						<p>Economico &nbsp;&bull;&nbsp; Seguro &nbsp;&bull;&nbsp; Pratico</p>
						<form action="arquivos.php" name="log" method="post">
							<p class="par">Nick</p>
							<input class="tipoinput" id="idinputnick" type="text" name="nick">
							<p class="par">Senha</p>
							<input class="tipoinput" id="idinputsenha" type="text" name="senha"> 
							<button class="tipobotao" id="loguin" style="display: inline;color: white;font-size: 18px;" type="submit">Loguin</button>
						</form>
						<button class="tipobotao" id="cadastro" style="display: inline;color: white;font-size: 18px;" onclick="funccadastrar()">cadastrar</button>

						<nav>
							<ul>
								<li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
								<li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
								<li><a href="#" class="icon brands fa-dribbble"><span class="label">Dribbble</span></a></li>
								<li><a href="#" class="icon brands fa-github"><span class="label">Github</span></a></li>
								<li><a href="#" class="icon solid fa-envelope"><span class="label">Email</span></a></li>
							</ul>
							<?php
								session_start();
									if(isset($_SESSION["erro"])){
										if($_SESSION["erro"]==1){
											// erro
											echo '<div style="width:200px;height:30px;background-color:rgba(200,0,0,0.25);margin:auto;border-radius:4px;margin-top:20px;"><p style="text-align:center;"> Erro no Nick ou senha</p></div>';
											$_SESSION["erro"]==0;
										}
									}else{
										$_SESSION["erro"]==0;
										echo $_SESSION["erro"];
									}

																?>
						</nav>
					</header>
					
					
					
				<!-- Footer -->
					<footer id="footer">
						<span class="copyright">&copy; Serviço prestado por  <a href="http://html5up.net">Bruno Gabriel dos Santos</a>.</span>
					</footer>

			</div>
		</div>
		<script>
			window.onload = function() { document.body.classList.remove('is-preload'); }
			window.ontouchmove = function() { return false; }
			window.onorientationchange = function() { document.body.scrollTop = 0; }
		</script>
		<script src="assets/js/trocanome.js"></script>

	</body>
</html>
