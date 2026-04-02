<?php
/*
$host="sql106.infinityfree.com";
$dbname="if0_36899048_milkatv";
$user = "if0_36899048";
$pass = "MRkSRiqH7x8Z";
*/

$host="localhost";
$dbname="scciptv";
$user = "root";
$pass = "";


try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
} catch (PDOException $e) { ?>

    <!-- EXIBE PAGINA DE ERRO DE BANCO DE DADOS -->
    <!DOCTYPE html>
    <html lang="pt-BR">
    <head>
    <meta charset="UTF-8">
    <title>Erro de Banco de Dados</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Segoe UI", Arial, sans-serif;
    }

    body {
      background: #ffffff;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }

    .container {
      text-align: center;
      max-width: 500px;
      padding: 30px;
    }

    .icon {
      font-size: 70px;
      margin-bottom: 20px;
      animation: pulse 1.5s infinite;
    }

    h1 {
      font-size: 28px;
      color: #0f172a;
      margin-bottom: 10px;
    }

    p {
      color: #64748b;
      font-size: 16px;
      margin-bottom: 25px;
    }

    .btn {
      background: #2563eb;
      color: #fff;
      padding: 12px 20px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      font-size: 14px;
      transition: 0.3s;
    }

    .btn:hover {
      background: #1d4ed8;
    }

    @keyframes pulse {
      0% { transform: scale(1); opacity: 0.7; }
      50% { transform: scale(1.1); opacity: 1; }
      100% { transform: scale(1); opacity: 0.7; }
    }

    /* Responsivo */
    @media (max-width: 500px) {
      h1 {
        font-size: 22px;
      }

      p {
        font-size: 14px;
      }

      .icon {
        font-size: 50px;
      }
    }
    </style>
    </head>
    <body>
    <div class="container">
        <div class="icon">⚠️</div>

        <h1>Erro de Conexão</h1>

        <p>
            Não foi possível conectar ao banco de dados.<br>
            Contate o administrador do sistema: <b>(74)981370420</b>
        </p>

        <button class="btn" onclick="location.reload()">
        Tentar novamente
        </button>
        
        <!-- <script>alert("<?php echo $e->getMessage() ?>")</script> apenas para testes exibe alerta com tipo de erro-->
        
        </div>
        
    </body>
    </html>
    
<?php 
}
