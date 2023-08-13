<?php
session_start();

// Verifica se o usuário enviou o formulário
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Define o PIN correto
    $pinCorreto = "2008";

    // Verifica se o PIN inserido está correto
    if ($_POST["pin"] === $pinCorreto) {
        // PIN correto, armazena o status de autenticação na sessão
        $_SESSION["autenticado"] = true;
        header("Location: index.php"); // Redireciona para a página protegida
        exit();
    } else {
        // PIN incorreto, exibe uma mensagem de erro
        $mensagemErro = "PIN inválido. Por favor, tente novamente.";
    }
}

// Verifica se o usuário está autenticado
if (isset($_SESSION["autenticado"]) && $_SESSION["autenticado"]) {
    // O usuário está autenticado, exibe o conteúdo protegido
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GPT-4</title>
  <!-- Adicionando o CSS do Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <!-- Estilo CSS personalizado para adicionar a cor de fundo e ajustar a largura do iframe -->
  <style>
    body {
      background-color: #181818;
      margin: 0;
      padding: 0;
    }
    iframe {
      width: 100%;
      height: 100vh; /* Para ocupar 100% da altura da tela */
      border: 0;
    }
  </style>
</head>

<body>
  <iframe src="https://ideias-chatgpt4-gratis.hf.space"></iframe>

  <!-- Adicionando o JS do Bootstrap (opcional, apenas se quiser recursos interativos) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>


<?php
} else {
    // O usuário não está autenticado, exibe o formulário de PIN
?>
<!DOCTYPE html>
<html>
<head>
    <title>Acesso com PIN</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-4 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title text-center mb-4">ChatGPT Free</h3>
                    <?php if (isset($mensagemErro)) : ?>
                        <div class="alert alert-danger" role="alert"><?php echo $mensagemErro; ?></div>
                    <?php endif; ?>
                    <form method="POST">
                        <div class="mb-3">
                            <label for="pin" class="form-label">INSIRA O PIN:</label>
                            <input type="password" class="form-control" id="pin" name="pin" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Acessar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
}
?>
