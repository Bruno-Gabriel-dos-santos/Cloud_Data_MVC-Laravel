

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Design by foolishdeveloper.com -->
    <title>Bruno Cloud Data</title>
 
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
		
	<link rel="stylesheet" href="{{ asset('css/cs2.css') }}">
	<meta name="csrf-token" content="{{ csrf_token() }}">
  
 
</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <div class="form" id="janela">
		
		
		<div id="form">
				<h3>Cadastro Bruno Cloud Data</h3>

				
				<label for="username">Nickname</label>
				<input type="text" placeholder="Digite seu nick" id="nick" name="nick">
				
				
				<label for="password">Senha</label>
				<input type="password" placeholder="Digite sua Senha" id="senha" name="senha">

				<label for="capcha">Captcha</label>
				<img class="center" src="{{ route('captcha') }}">
				<input class="tipoinput" id="capcha"> 

				<button onclick="cad()" style="color:black">Cadastrar</button>

		</div>
		<div class="nada" id="resultado"><h3 id="resultadoparag"></h3></div>

        <div class="social">
          <div class="go" style="cursor: pointer;" onclick="inicio()">Inicio</div>
          <div class="fb" style="cursor: pointer;" onclick="funccontato()"> Contato</div>
        </div>


</div>
	<script src="{{asset('js/cadastro.js')}}"></script>
	<script src="{{asset('js/trocanome.js')}}"></script>
</body>
</html>