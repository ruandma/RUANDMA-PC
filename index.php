<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">
    <!-- SEO -->
    <meta name="description" content="RUANDMA PC - Os melhores computadores para gamers, editores e profissionais de tecnologia.">
    <!-- Open Graph -->
    <meta property="og:title" content="RUANDMA PC">
    <meta property="og:description" content="Os melhores computadores para gamers e profissionais!">
    <meta property="og:image" content="imagens/logomarca/logomarca.png">
    <meta property="og:url" content="https://ruandmapc.com"> 
    <meta property="og:type" content="website">
    <meta property="og:image:alt" content="Logotipo da RUANDMA PC">
    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="RUANDMA PC">
    <meta name="twitter:description" content="Os melhores computadores para gamers e profissionais!">
    <meta name="twitter:image" content="imagens/logomarca/logomarca.png">
    <meta name="twitter:image:alt" content="Logotipo da RUANDMA PC">
    <!-- Favicon -->
    <link rel="shortcut icon" href="imagens/logomarca/logomarca.png" type="image/png">
    <link rel="apple-touch-icon" sizes="180x180" href="imagens/logomarca/logomarca.png">
    <!-- Fontes -->
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link rel="preconnect" href="https://fonts.gstatic.com"  crossorigin>
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Poppins:wght@400;600&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    </noscript>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/contato.css">
    <meta name="theme-color" content="#ffffff"> 
    <title>RUANDMA PC</title>
</head>
<body>
        <?php session_start(); ?>

<!-- Header -->
<header role="banner">
    <nav role="navigation" aria-label="Menu principal">
        <!-- Logo e Carrinho -->
        <div class="logo" role="button" aria-label="Abrir carrinho" tabindex="0">
            <img src="imagens/logomarca/logomarca.png" alt="RUANDMA PC">
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
            <img src="imagens/perfil/perfil.png" alt="Foto de Perfil" class="profile-img" onerror="this.src='imagens/perfil/perfil.png'" tabindex="0">

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


<!-- Main Content -->
<main>
    <section class="products" aria-label="Nossos produtos">
        <!-- Produto 1 -->
        <article class="product">
            <img src="imagens/pcs/TGT-GAMING-V1.webp" alt="TGT GAMING V1" loading="lazy">
            <h3>TGT GAMING V1</h3>
            <p class="price indisponivel">Indisponível</p>
            <button class="config-btn" data-target="config1" aria-label="Mostrar configurações">
                Configuração <span class="arrow">↓</span>
            </button>
            <div id="config1" class="config-description" aria-hidden="true">
                <ul>
                    <li>Fonte: TGT 500W</li>
                    <li>Placa-mãe: Intel B85</li>
                    <li>Processador: Intel Core i3 4170</li>
                    <li>Placa de Vídeo: AMD Radeon HD 6750 1GB</li>
                    <li>Memória RAM: 12GB DDR3</li>
                    <li>Armazenamento: SSD 1TB</li>
                    <li>Gabinete: TGT-BKGF01 RGB</li>
                    <li>Wi-Fi e Bluetooth integrados</li>
                    <li>Cooler do processador RGB</li>
                    <li>3 Cooler RGB</li>
                    <li>Cabo Y USB 2.0</li>
                </ul>
            </div>
        </article>
        <!-- Produto 2 -->
        <article class="product">
            <img src="imagens/pcs/TGT-GAMING-V2.webp" alt="TGT GAMING V2" loading="lazy">
            <h3>TGT GAMING V2</h3>
            <p class="price indisponivel">Indisponível</p>
            <button class="config-btn" data-target="config2" aria-label="Mostrar configurações">
                Configuração <span class="arrow">↓</span>
            </button>
            <div id="config2" class="config-description" aria-hidden="true">
                <ul>
                    <li>Fonte: TGT 500W</li>
                    <li>Placa-mãe: Intel KS-H81</li>
                    <li>Processador: Intel Core i3 4170</li>
                    <li>Placa de Vídeo: AMD Radeon RX 550 4GB</li>
                    <li>Memória RAM: 12GB DDR3</li>
                    <li>Armazenamento: SSD 1TB</li>
                    <li>Gabinete: TGT-SKL-WT01 LED ARGB</li>
                    <li>Wi-Fi e Bluetooth integrados</li>
                    <li>Cooler do processador RGB</li>
                    <li>6 Coolers ARGB</li>
                    <li>Cabo Y USB 2.0</li>
                </ul>
            </div>
        </article>
        <!-- Produto 3 -->
        <article class="product">
            <img src="imagens/pcs/TGT-GAMING-V3.webp" alt="TGT GAMING V3" loading="lazy">
            <h3>TGT GAMING V3</h3>
            <p class="price indisponivel">Indisponível</p>
            <button class="config-btn" data-target="config3" aria-label="Mostrar configurações">
                Configuração <span class="arrow">↓</span>
            </button>
            <div id="config3" class="config-description" aria-hidden="true">
                <ul>
                    <li>Fonte: TGT 500W</li>
                    <li>Placa-mãe: Intel KS-H81</li>
                    <li>Processador: Intel Core i7 4790</li>
                    <li>Placa de Vídeo: AMD Radeon RX 550 4GB</li>
                    <li>Memória RAM: 12GB DDR3</li>
                    <li>Armazenamento: SSD 1TB NVMe</li>
                    <li>Gabinete: TGT-SKL-WT01 LED ARGB</li>
                    <li>Wi-Fi e Bluetooth integrados</li>
                    <li>Cooler do processador RGB</li>
                    <li>6 Coolers ARGB</li>
                    <li>Cabo Y USB 2.0</li>
                </ul>
            </div>
        </article>
    </section>
</main>

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

    <!-- Scripts -->
    <script src="js/cart.js" defer></script>
    <script src="js/shared.js" defer></script>
</body>
</html>