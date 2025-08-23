<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Entrar - RUANDMA PC</title>
  <meta name="description" content="Faça login para acessar sua conta e acompanhar seus pedidos na RUANDMA PC.">
  <link rel="icon" href="../imagens/logomarca/logomarca.png" type="image/png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
  <!-- CSS Global -->
  <link rel="stylesheet" href="../css/index.css">
  <link rel="stylesheet" href="../css/loja.css">
  <link rel="stylesheet" href="../css/sobre-nos.css">
  <link rel="stylesheet" href="../css/contato.css">
  <!-- Mantém o mesmo style do registrar.html -->
  <style>
/* FORMULÁRIO CENTRALIZADO */
.page-wrap { 
    flex: 1; 
    display: flex; 
    align-items: center; 
    justify-content: center; 
    padding: 0 12px; 
    min-height: 100vh; /* garante altura mínima da tela */
}

/* CARTÃO DE AUTENTICAÇÃO */
.auth-card { 
    background: #181f2a;       /* fundo do cartão */
    border-radius: 18px;       
    padding: 40px 32px;        
    max-width: 400px;          
    width: 100%;               
    margin: 48px auto;         
    display: flex; 
    flex-direction: column; 
    gap: 22px;                 
}

/* CABEÇALHO */
.auth-header { 
    margin-top: 20px;
    text-align: center; 
    background: none;      /* remove qualquer fundo */
    box-shadow: none;      /* remove qualquer sombra */
}
.auth-header h1 { 
    font-size: 2.2rem;
    font-weight: 700;
    color: #00ff99;
    padding: 0;            
    margin: 0; 
}
.auth-header p { 
    color: #bfc8d6; 
    margin-top: 8px; /* espaço entre título e descrição */
}

/* FORMULÁRIO */
.auth-form { 
    display: flex; 
    flex-direction: column; 
    gap: 18px; 
}

/* CAMPOS */
.field { 
    display: flex; 
    flex-direction: column; 
    gap: 6px; 
}
.field label { 
    font-size: 1rem; 
    color: #bfc8d6; 
    font-weight: 500; 
}

/* CONTROLES */
.control { position: relative; }
.control input { 
    width: 100%; 
    height: 48px; 
    border-radius: 12px; 
    border: 1px solid #2a3240; 
    background: #10151c; 
    color: #fff; 
    padding: 0 44px 0 12px; 
    font-size: 1.08rem; 
}

/* BOTÃO DE VISIBILIDADE DA SENHA */
.toggle-visibility { 
    position: absolute; 
    right: 8px; 
    top: 50%; 
    transform: translateY(-50%); 
    background: transparent; 
    border: 0; 
    color: #bfc8d6; 
    cursor: pointer; 
    width: 32px; 
    height: 32px; 
    font-size: 1.2rem; 
    display: flex; 
    align-items: center; 
    justify-content: center; 
}

.terms {
    display: flex;
    justify-content: center;  /* centraliza todo o bloco */
}

.terms input[type="checkbox"] {
    width: 16px;
    height: 16px;
    margin-right: 12px;
    margin-top: 8px;
}

.terms label {
    text-align: center;
    display: inline-block;    
    line-height: 1.3;
    max-width: 100%;     /* ou remova esta linha */
    cursor: default;       
    user-select: text;     
    white-space: normal;  /* permite quebrar linhas naturalmente */
}

.link-terms {
    color: #007BFF;       /* azul igual ao footer */
    text-decoration: underline;
    cursor: default;       /* cursor normal */
    user-select: text;     /* permite seleção/copiar */
}

.terms a { 
    color: #00ff99; 
    text-decoration: none; 
}
.terms a:hover { 
    text-decoration: underline; 
}

/* Estilo específico para mobile */
@media (max-width: 768px) {
.terms {
    display: flex;
    justify-content: center;  /* centraliza todo o bloco */
}

.terms input[type="checkbox"] {
    width: 16px;
    height: 16px;
    margin-right: 12px;
    margin-top: 8px;
}

.terms label {
    text-align: center;
    display: inline-block;    
    line-height: 1.3;
    max-width: 200px;
    cursor: default;       /* cursor normal */
    user-select: text;     /* permite seleção/copiar */
}

.link-terms {
    color: #007BFF;       /* azul igual ao footer */
    text-decoration: underline;
    cursor: default;       /* cursor normal */
    user-select: text;     /* permite seleção/copiar */
}

.terms a { 
    color: #00ff99; 
    text-decoration: none; 
}
.terms a:hover { 
    text-decoration: underline; 
}
}

/* AÇÕES */
.actions { 
    display: flex; 
    flex-direction: column; 
    gap: 10px; 
    margin-top: 10px; 
}

/* BOTÕES */
.btn { 
    height: 46px; 
    border-radius: 12px; 
    border: 0; 
    cursor: pointer; 
    font-weight: 600; 
    font-size: 1.08rem; 
    display: flex;
    align-items: center;
    justify-content: center;
}

/* BOTÃO PRINCIPAL */
.btn-primary { 
    background: #00ff99; 
    color: #0a0f14; 
}

.btn-secondary {
    border: none;        /* remove a borda */
    background: none;    /* remove o fundo cinza */
    color: #fff;      /* mantém a cor azul */
    box-shadow: none;    /* remove sombra se houver */
}

.btn-secondary:hover {
    background: none;    /* evita efeito de hover cinza */
    color: #0056b3;      /* tom mais escuro ao passar o mouse */
}


/* RESPONSIVO PARA MOBILE */
@media (max-width: 480px) {
    .auth-card {
        padding: 32px 20px;
        max-width: 100%;
    }
    .auth-header h1, 
    .btn {
        font-size: 1.6rem; /* mantém consistência dos tamanhos no mobile */
    }
    .btn {
        height: 44px;
    }
}

.btn i {
    margin-right: 8px; /* espaço entre o ícone e o texto em todos os botões */
}

.no-underline {
    text-decoration: none; /* remove sublinhado do link inteiro */
}

.underline-text {
    text-decoration: underline; /* só o texto “Registrar” terá sublinhado */
}

.btn-secondary i {
    margin-right: 4px; /* espaço entre ícone e texto */
}

@media (max-width: 480px) {
  .auth-card {
    margin: -50% auto 20px auto; /* top ajustado e bottom controlado */
  }

  .page-wrap {
    margin-bottom: 0;   /* remove margens extras */
    padding-bottom: 0;  /* remove padding extra */
  }

  footer {
    margin-top: 10px;   /* controla a distância do conteúdo para o rodapé */
  }
}

/* Remove o “mostrar senha” nativo do Chrome/Edge */
input[type="password"]::-ms-reveal,
input[type="password"]::-ms-clear,
input[type="password"]::-webkit-credentials-auto-fill-button,
input[type="password"]::-webkit-inner-spin-button,
input[type="password"]::-webkit-search-decoration {
    display: none !important;
}

/* Oculta o olhinho nativo do navegador */
input[type="password"]::-webkit-textfield-decoration-container,
input[type="password"]::-webkit-password-suggest-button {
    display: none !important;
}

</style>
</head>
<body>
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

<!-- FORMULÁRIO -->
<main class="page-wrap">
  <section class="auth-card">
    <header class="auth-header">
      <h1>Entrar na sua conta</h1>
      <p>Acesse sua conta para acompanhar pedidos e ofertas.</p>
    </header>

    <!-- Mensagens de erro ou sucesso via sessão -->
<?php
if (session_status() === PHP_SESSION_NONE) session_start();
?>

<?php if (!empty($_SESSION['erro_login'])): ?>
  <div class="login-error" style="color:red; text-align:center; margin-top:10px; font-weight:bold; display:flex; align-items:center; justify-content:center; gap:5px;">
    <i class="fas fa-circle-exclamation" style="color:red;"></i>
    <span>
      <?php 
        echo $_SESSION['erro_login']; 
        unset($_SESSION['erro_login']); // limpa após exibir
      ?>
    </span>
  </div>
<?php endif; ?>

<?php if (!empty($_SESSION['sucesso_login'])): ?>
  <div class="login-success" style="color:green; text-align:center; margin-top:10px; font-weight:bold; display:flex; align-items:center; justify-content:center; gap:5px;">
    <span style="color:green; font-size:18px;">&#x2714;</span> <!-- Ícone de sucesso -->
    <span><?php 
      echo $_SESSION['sucesso_login']; 
      unset($_SESSION['sucesso_login']);
    ?></span>
  </div>
<?php endif; ?>

    <!-- FORMULÁRIO -->
    <form class="auth-form" id="form-login" action="../php/login.php" method="POST" novalidate>
      <div class="field">
        <label for="login">E-mail ou WhatsApp</label>
        <div class="control">
          <input id="login" name="login" type="text" placeholder="E-mail ou WhatsApp" required />
        </div>
      </div>

      <div class="field">
        <label for="senha">Senha</label>
        <div class="control">
          <input id="senha" name="senha" type="password" minlength="8" placeholder="Mínimo 8 caracteres" required />
          <button type="button" class="toggle-visibility" data-toggle="#senha">
            <i class="fa-regular fa-eye"></i>
          </button>
        </div>
      </div>

      <div class="actions">
        <button type="submit" class="btn btn-primary">
          <i class="fas fa-sign-in-alt"></i> Entrar
        </button>

        <a href="registrar.php" class="btn btn-secondary no-underline">
          <i class="fa-solid fa-user-plus"></i> <span class="underline-text">Registrar</span>
        </a>
      </div>
    </form>
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

  <!-- SCRIPT DE VISIBILIDADE E VALIDAÇÃO -->
  <script>
document.addEventListener('DOMContentLoaded', function() {
  // Toggle de visibilidade da senha
  document.querySelectorAll('.toggle-visibility').forEach(btn => {
    btn.addEventListener('click', () => {
      const input = document.querySelector(btn.dataset.toggle);
      if (!input) return;

      if (input.type === 'password') {
        input.type = 'text';
        btn.innerHTML = '<i class="fa-regular fa-eye-slash"></i>';
      } else {
        input.type = 'password';
        btn.innerHTML = '<i class="fa-regular fa-eye"></i>';
      }
    });
  });

  // Validação simples de campos antes do envio
  const form = document.getElementById('form-login');
  const loginError = document.getElementById('loginError');

  if (form) {
    form.addEventListener('submit', function(e) {
      const login = document.getElementById('login').value.trim();
      const senha = document.getElementById('senha').value.trim();

      // Limpa mensagem de erro
      loginError.style.display = 'none';
      loginError.textContent = '';

      if (!login || !senha) {
        e.preventDefault();
        loginError.textContent = 'Preencha todos os campos antes de entrar.';
        loginError.style.display = 'block';
      }
    });
  }

  // Exibir mensagem de erro passada via URL (ex: ?erro=Mensagem)
  const params = new URLSearchParams(window.location.search);
  const erro = params.get('erro');
  if (erro) {
    loginError.textContent = erro;
    loginError.style.display = 'block';
  }
});
</script>

<script src="../js/cart.js" defer></script>
<script src="../js/shared.js" defer></script>
</body>
</html>
