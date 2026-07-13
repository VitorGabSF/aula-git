<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-card {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }
        .login-card h2 {
            margin-bottom: 20px;
            color: #333;
        }
        .login-card input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box; /* Garante que o padding não aumente a largura */
        }
        .login-card button {
            width: 100%;
            padding: 10px;
            background-color: #5c67f2;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        .login-card button:hover {
            background-color: #4a54e1;
        }
        .login-card .footer-links {
            margin-top: 15px;
            font-size: 14px;
        }
        .login-card .footer-links a {
            color: #5c67f2;
            text-decoration: none;
        }
    </style>
</head>
<body>

    <div class="login-card">
        <h2>Login</h2>
        <form action="<?php BASE_URL ?>" method="POST">
            <input type="email" placeholder="Seu e-mail" required>
            <input type="password" placeholder="Sua senha" required>
            <button type="submit">Entrar</button>
        </form>
        <div class="footer-links">
            <a href="#">Esqueceu a senha?</a>
        </div>
    </div>

</body>
</html>