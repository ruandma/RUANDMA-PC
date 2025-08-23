<?php
require_once "conexao.php";

$mensagem = "";
$tipo = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = trim($_POST["nome"]);
    $email = trim($_POST["email"]);
    $whatsapp = trim($_POST["whatsapp"]);
    $senha = password_hash($_POST["senha"], PASSWORD_DEFAULT);

    $sql = "SELECT * FROM usuarios WHERE email = :email OR whatsapp = :whatsapp";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":whatsapp", $whatsapp);
    $stmt->execute();
    $usuarioExistente = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuarioExistente) {
        $mensagem = "E-mail ou WhatsApp já cadastrado!";
        $tipo = "erro";
    } else {
        $sql = "INSERT INTO usuarios (nome, email, whatsapp, senha) VALUES (:nome, :email, :whatsapp, :senha)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":whatsapp", $whatsapp);
        $stmt->bindParam(":senha", $senha);

        if ($stmt->execute()) {
            $mensagem = "Conta registrada com sucesso!";
            $tipo = "sucesso";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrar - RUANDMA PC</title>
  <meta name="description" content="Crie sua conta para comprar com mais rapidez e acompanhar seus pedidos na RUANDMA PC.">
  <link rel="icon" href="../imagens/logomarca/logomarca.png" type="image/png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
    <!-- CSS Global -->
<link rel="stylesheet" href="../css/index.css">
<link rel="stylesheet" href="../css/loja.css">
<link rel="stylesheet" href="../css/sobre-nos.css">
<link rel="stylesheet" href="../css/contato.css">
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

.registrar-icon {
  margin-right: 8px; /* espaço só para o ícone do registrar */
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
    <!-- CABEÇALHO -->
    <header class="auth-header">
      <h1>Crie sua conta</h1>
      <p>Compre mais rápido, acompanhe pedidos e receba ofertas.</p>
    </header>

    <!-- FORMULÁRIO -->
    <form class="auth-form" id="form-registro" action="../php/registrar.php" method="POST" onsubmit="return validarRegistro()">
      
      <div class="field">
        <label for="nome">Nome Completo</label>
        <div class="control">
          <input id="nome" name="nome" type="text" placeholder="Seu nome" required />
        </div>
      </div>

      <div class="field">
        <label for="whatsapp">Número de WhatsApp</label>
        <div class="control">
          <input id="whatsapp" name="whatsapp" type="text" placeholder="(61) 99999-9999" required />
        </div>
      </div>

      <div class="field">
        <label for="email">E-mail</label>
        <div class="control">
          <input id="email" name="email" type="email" placeholder="voce@exemplo.com" required />
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

      <div class="field">
        <label for="confirmar">Confirmar senha</label>
        <div class="control">
          <input id="confirmar" name="confirmar" type="password" placeholder="Repita a senha" required />
          <button type="button" class="toggle-visibility" data-toggle="#confirmar">
            <i class="fa-regular fa-eye"></i>
          </button>
        </div>
      </div>

      <div class="terms">
        <input type="checkbox" id="acceptTerms" name="acceptTerms" required />
        <label for="acceptTerms">
          Li e aceito os <span class="link-terms">Termos de Uso</span> <br>
          e a <span class="link-terms">Política de Privacidade</span>.
        </label>
      </div>

      <div id="registro-mensagem" style="text-align:center; margin-bottom: 10px; font-weight:bold; color: <?= $tipo === 'erro' ? 'red' : 'green' ?>;">
    <?php if ($tipo === 'erro'): ?>
        <i class="fas fa-circle-exclamation"></i>
    <?php elseif ($tipo === 'sucesso'): ?>
        <i class="fas fa-check-circle"></i>
    <?php endif; ?>
    <?= $mensagem ?>
</div>

      <button type="submit" class="btn btn-primary">
        <i class="fas fa-user-plus registrar-icon"></i> Registrar
      </button>

      <a href="entrar.php" class="btn btn-secondary">
        <i class="fa-solid fa-right-to-bracket"></i> Já tenho conta
      </a>
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

    <script>
document.addEventListener('DOMContentLoaded', function() {

    // Toggle de visibilidade da senha
    document.querySelectorAll('.toggle-visibility').forEach(btn => {
        btn.addEventListener('click', () => {
            const input = document.querySelector(btn.dataset.toggle);
            if (input.type === 'password') {
                input.type = 'text';
                btn.innerHTML = '<i class="fa-regular fa-eye-slash"></i>';
            } else {
                input.type = 'password';
                btn.innerHTML = '<i class="fa-regular fa-eye"></i>';
            }
        });
    });

    // Validação do formulário
    const form = document.getElementById('form-registro');
    const checkbox = document.getElementById('acceptTerms');

    form.addEventListener('submit', function(e) {
        // Remove mensagens antigas
        document.querySelectorAll('#termsError, #senhaError').forEach(msg => msg.remove());

        let valido = true;

        // Checkbox
        if (!checkbox.checked) {
            e.preventDefault();
            const msg = document.createElement('p');
            msg.id = 'termsError';
            msg.style.color = 'red';
            msg.style.textAlign = 'center';
            msg.style.marginTop = '10px';
            msg.textContent = 'Você precisa aceitar os Termos de Uso e a Política de Privacidade.';
            form.appendChild(msg);
            checkbox.focus();
            valido = false;
        }

        // Senhas
        const senha = document.getElementById('senha').value;
        const confirmar = document.getElementById('confirmar').value;
        if (senha !== confirmar) {
            e.preventDefault();
            const msg = document.createElement('p');
            msg.id = 'senhaError';
            msg.style.color = 'red';
            msg.style.textAlign = 'center';
            msg.style.marginTop = '10px';
            msg.textContent = 'As senhas não conferem.';
            form.appendChild(msg);
            valido = false;
        }

        return valido;
    });
});
</script>


    <!-- Scripts -->
    <script src="../js/cart.js" defer></script>
    <script src="../js/shared.js" defer></script>
</body>
</html>
