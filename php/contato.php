<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- SEO -->
    <meta name="description" content="Entre em contato com a RUANDMA PC para saber mais sobre nossos produtos e serviços.">
    <meta name="keywords" content="Contato, Suporte, RUANDMA PC, Atendimento ao cliente">
    <meta name="robots" content="index, follow">
    
    <!-- Open Graph (Redes sociais) -->
    <meta property="og:title" content="Contato - RUANDMA PC">
    <meta property="og:description" content="Entre em contato com a RUANDMA PC para tirar dúvidas ou saber mais sobre nossos produtos.">
    <meta property="og:image" content="../imagens/logomarca/logomarca.png">
    <meta property="og:url" content="https://ruandmapc.com/contato">
    <meta property="og:type" content="website">
    
    <!-- Ícones -->
    <link rel="icon" href="../imagens/logomarca/logomarca.png" type="image/png">

    <!-- Font Awesome (Ícones) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    <!-- CSS Global -->
<link rel="stylesheet" href="../css/index.css">
<link rel="stylesheet" href="../css/loja.css">
<link rel="stylesheet" href="../css/sobre-nos.css">

<!-- CSS Específico da Página -->
<link rel="stylesheet" href="../css/contato.css">
    
    <title>CONTATO - RUANDMA PC</title>
</head>
<body>
        <?php session_start(); ?>

<!-- Header -->
<header role="banner">
    <nav role="navigation" aria-label="Menu principal">
        <!-- Logo e Carrinho -->
        <div class="logo" role="button" aria-label="Abrir carrinho" tabindex="0">
            <img src="../imagens/logomarca/logomarca.png" alt="RUANDMA PC">
            <div class="cart-count" id="cart-count">0</div>
        </div>

        <!-- Menu de navegação principal -->
        <ul class="nav-links">
            <li><a href="/RUANDMA-PC/index.php" aria-current="page" aria-label="Ir para a página inicial">Início</a></li>
            <li><a href="/RUANDMA-PC/php/loja.php" aria-label="Visitar nossa loja">Loja</a></li>
            <li><a href="/RUANDMA-PC/php/sobre-nos.php" aria-label="Saber mais sobre nós">Sobre nós</a></li>
            <li><a href="/RUANDMA-PC/php/contato.php" aria-label="Entrar em contato conosco">Contato</a></li>
        </ul>

        <!-- Perfil do usuário -->
        <div class="profile" style="position: relative;">
            <img src="../imagens/perfil/perfil.png" alt="Foto de Perfil" class="profile-img" onerror="this.src='../imagens/perfil/perfil.png'" tabindex="0">

            <!-- Dropdown do perfil -->
            <div class="profile-dropdown" id="profile-dropdown" style="display: none;">
                <ul>
                    <?php if (isset($_SESSION['usuario_id'])): ?>
                        <li><a href="/RUANDMA-PC/php/minha-conta.php" class="profile-action"><i class="fas fa-user"></i> Minha Conta</a></li>
                        <li><a href="/RUANDMA-PC/php/historico.php" class="profile-action"><i class="fas fa-history"></i> Histórico</a></li>
                        <li><a href="/RUANDMA-PC/php/logout.php" class="profile-action"><i class="fas fa-sign-out-alt"></i> Sair</a></li>
                    <?php else: ?>
                        <li><a href="/RUANDMA-PC/php/registrar.php" class="profile-action"><i class="fas fa-user-plus"></i> Registrar</a></li>
                        <li><a href="/RUANDMA-PC/php/entrar.php" class="profile-action"><i class="fas fa-sign-in-alt"></i> Entrar</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>

        <!-- Botão Hamburger para mobile -->
        <div class="menu-toggle" id="menu-toggle" aria-label="Abrir menu" aria-expanded="false" tabindex="0">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
    </nav>
</header>

    <!-- Seção de Contato Profissional -->
<section class="contato main-content">
    <div class="container">
        <h1><i class="fas fa-paper-plane"></i> Fale Conosco</h1>
        <p class="contato-intro">
            Tem dúvidas, sugestões ou quer um orçamento personalizado?<br>
            Preencha o formulário abaixo ou utilize nossos canais de atendimento. Nossa equipe terá prazer em responder rapidamente!
        </p>
        <div class="contato-flex">
            <!-- Formulário de Contato -->
            <form action="https://formspree.io/f/xwpbblnn" method="POST" id="form-contato" class="contato-form">
    <div class="form-group">
        <label for="nome"><i class="fas fa-user"></i> Nome</label>
        <input type="text" id="nome" name="nome" required placeholder="Seu nome">
    </div>
    <div class="form-group">
        <label for="email"><i class="fas fa-envelope"></i> E-mail</label>
        <input type="email" id="email" name="email" required placeholder="Seu e-mail">
    </div>
    <div class="form-group">
        <label for="assunto"><i class="fas fa-comment-dots"></i> Assunto</label>
        <input type="text" id="assunto" name="assunto" required placeholder="Assunto da mensagem">
    </div>
    <div class="form-group">
        <label for="mensagem"><i class="fas fa-edit"></i> Mensagem</label>
        <textarea id="mensagem" name="mensagem" rows="5" required placeholder="Sua mensagem"></textarea>
    </div>
    <button type="submit" class="btn"><i class="fas fa-paper-plane"></i> Enviar Mensagem</button>
</form>
            
            <!-- Informações de Contato -->
            <div class="informacoes contato-info">
                <h2><i class="fas fa-headset"></i> Atendimento</h2>
                <ul>
                    <li><i class="fas fa-phone-alt"></i> <strong>Telefone:</strong> <a href="tel:+5561986641237">(61) 98664-1237</a></li>
                    <li><i class="fas fa-envelope"></i> <strong>E-mail:</strong> <a href="mailto:ruan.morais.arruda@gmail.com">ruan.morais.arruda@gmail.com</a></li>
                    <li><i class="fas fa-map-marker-alt"></i> <strong>Endereço:</strong> Loja Física Indisponível</li>
                </ul>
                <h2><i class="fas fa-share-alt"></i> Redes Sociais</h2>
                <ul class="redes-sociais">
                    <li>
                        <a href="https://www.instagram.com/ruandma_pc" target="_blank" rel="noopener">
                            <i class="fab fa-instagram"></i> Instagram
                        </a>
                    </li>
                    <!-- Adicione mais redes se desejar -->
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Sidebar (Carrinho) -->
<div class="sidebar" id="cart-sidebar" aria-hidden="true">
    <!-- Cabeçalho -->
    <div class="sidebar-header">
        <h3>Carrinho de Compras</h3>
        <button id="close-btn" class="close-btn" aria-label="Fechar carrinho">✖</button>
    </div>

    <!-- Ações do Carrinho -->
    <div class="cart-actions">
        <button class="cart-btn clear-cart-btn" id="clear-cart-btn" aria-label="Limpar todos os itens do carrinho">
            Limpar Carrinho
        </button>
    </div>

    <!-- Itens do Carrinho -->
    <div id="cart-items" class="cart-items" aria-live="polite"></div>

    <!-- Total -->
    <div class="cart-total">
        <p>Total: <span id="cart-total">R$ 0,00</span></p>
    </div>

    <!-- Finalizar Compra -->
    <div class="cart-actions">
        <button class="cart-btn checkout-btn" aria-label="Finalizar compra">
            Finalizar Compra
        </button>
    </div>
</div>

    <!-- Overlay -->
    <div class="overlay" id="overlay" aria-hidden="true"></div>

    <!-- Footer -->
<footer role="contentinfo">
    <div class="footer-content">
        <ul>
            <li>&copy; 2025 RUANDMA PC - Todos os direitos reservados.</li>
            <li>CNPJ: 00.000.000/0001-00</li>
            <li>Contato: <a href="mailto:ruan.morais.arruda@gmail.com">ruan.morais.arruda@gmail.com</a></li>
            <li>
                <a href="politica-de-privacidade.pdf" download="Politica_de_Privacidade_RUANDMA_PC.pdf" class="footer-link">Política de Privacidade</a> |
                <a href="termos-de-uso.pdf" download="Termos_de_Uso_RUANDMA_PC.pdf" class="footer-link">Termos de Uso</a>
            </li>
        </ul>
    </div>
</footer>

    <script src="../js/cart.js" defer></script>
    <script src="../js/shared.js" defer></script>
</body>
</html>
