

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
    <form class="form form2" action="{{route('login')}}" name="log" method="post">
		@csrf
		

        <h3>Bruno Cloud Data</h3>

		@error('erro')
			<div class="alert alert-danger">Erro no sistema</div>
		@enderror
        <label for="username">Nickname</label>
        <input type="text" placeholder="Digite seu nick" id="idinputnick" name="nick">
		@error('nick')
			<div class="alert alert-danger">O campo Nick esta incorreto ou não foi preenchido</div>
		@enderror
        <label for="password">Senha</label>
        <input type="password" placeholder="Digite sua Senha" id="idinputsenha" name="senha">
		@error('senha')
			<div class="alert alert-danger">O campo Senha esta incorreto ou não foi preenchido</div>
		@enderror
        <button type="submit" class="black">Login</button>
        <div class="social">
          <div class="go" style="cursor: pointer;" onclick="funccadastrar()"> Cadastrar</div>
          <div class="fb" style="cursor: pointer;" onclick="funccontato()"> Contato</div>
        </div>
    </form>
	<script src="{{asset('js/trocanome.js')}}"></script>
</body>
</html>