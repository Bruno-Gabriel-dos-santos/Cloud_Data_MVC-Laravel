<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Página de Erro</title>
<style>
    body, html {
        height: 100%;
        margin: 0;
        font-family: Arial, sans-serif;
    }

    .fundo-azul-escuro {
        background-color: #080f35; /* Fundo azul escuro */
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .mensagem-erro {
        background-color: rgba(255, 255, 255, 0.8); /* Fundo branco transparente opaco */
        padding: 20px;
        border-radius: 10px;
        text-align: center;
    }

    .mensagem-erro h2 {
        color: #1a1a2e; /* Cor do título */
    }

    .mensagem-erro p {
        color: #1a1a2e; /* Cor do texto */
    }
</style>
</head>
<body>

<div class="fundo-azul-escuro">
    <div class="mensagem-erro">
        <h2>Erro</h2>
        <p>A rota desejada não existe.</p>
    </div>
</div>

</body>
</html>
