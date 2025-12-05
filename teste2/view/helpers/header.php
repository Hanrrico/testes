
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ary Bordados e Costuras Criativas</title>
    <link rel="stylesheet" href="/teste/public/assets/css/style.css">
</head>
<body>

<!-- Navbar -->
<header class="navbar">
    <a href="/public/view/index.php" class="navbar-brand">Ary Bordados e Costuras Criativas</a>
    <nav>
        <ul>
            <li><a href="../public/index.php">Home</a></li>
            <li><a href="../public/carrinho.php">Carrinho</a></li>
            <?php
            if (!isset($_SESSION)) {
                session_start();
            }
            if(isset($_SESSION['usuario'])):
                if($_SESSION['usuario']['permissao'] === 'admin'): ?>
                    <li><a href="/public/view/cadastro_produto.php">Cadastrar Produto</a></li>
                    <li><a href="/public/view/gerenciar_usuarios.php">Gerenciar Usuários</a></li>
                <?php endif; ?>
                <li><a href="/public/ajax/logout.php">Sair</a></li>
            <?php else: ?>
                <li><a href="/public/view/login.php">Login</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>

<!-- Jumbotron (sem duplicação do nome) -->
<section class="jumbotron">
    <div class="jumbotron-text">
        <h2>Costuras criativas e bordados personalizados para você!</h2>
        <p>Explore nossa coleção e encontre peças únicas feitas com carinho.</p>
    </div>
    <img src="/teste/public/assets/img/logo.png" alt="Logo Ary Bordados" class="jumbotron-img">
</section>

<hr>
</body>
</html>
