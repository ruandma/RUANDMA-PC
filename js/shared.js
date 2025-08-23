// ---------------------------
// Dropdown do perfil
// ---------------------------
const profileImg = document.querySelector('.profile-img');
const dropdown = document.getElementById('profile-dropdown');

if (profileImg && dropdown) {
    profileImg.addEventListener('click', function (e) {
        e.stopPropagation();
        dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
    });

    document.addEventListener('click', function () {
        dropdown.style.display = 'none';
    });

    dropdown.addEventListener('click', function (e) {
        e.stopPropagation();
    });
}

// ---------------------------
// Redirecionamento registrar/login
// ---------------------------
document.addEventListener('DOMContentLoaded', function () {
    const btnRegistrar = document.getElementById('btn-registrar');
    const btnEntrar = document.getElementById('btn-entrar');

    if (btnRegistrar) {
        btnRegistrar.addEventListener('click', function(e) {
            e.preventDefault();
            window.location.href = '/RUANDMA-PC/php/registrar.php';
        });
    }

    if (btnEntrar) {
        btnEntrar.addEventListener('click', function(e) {
            e.preventDefault();
            window.location.href = '/RUANDMA-PC/php/entrar.php';
        });
    }

    // Corrige links de logout para redirecionar corretamente
    const logoutLinks = document.querySelectorAll('.logout-link');
    logoutLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            fetch('/RUANDMA-PC/php/logout.php')
                .then(() => window.location.href = '/RUANDMA-PC/php/index.php')
                .catch(err => console.error('Erro no logout:', err));
        });
    });
});

// ---------------------------
// Botões de configuração expansíveis
// ---------------------------
const configButtons = document.querySelectorAll('.config-btn');
configButtons.forEach(btn => {
    btn.addEventListener('click', function() {
        const description = this.nextElementSibling;
        this.classList.toggle('open');
        if (description) {
            description.classList.toggle('open');
            description.classList.toggle('active');
        }
    });
});

// ---------------------------
// Modal de imagem do produto (zoom)
// ---------------------------
const produtos = document.querySelectorAll('.produto-container img');
produtos.forEach(img => {
    img.style.cursor = 'pointer';
    img.addEventListener('click', function() {
        const overlay = document.createElement('div');
        overlay.classList.add('produto-popup');
        overlay.style.display = 'flex';

        const popupContent = document.createElement('div');
        popupContent.classList.add('popup-content');

        const modalImg = document.createElement('img');
        modalImg.src = this.src;
        modalImg.alt = this.alt;

        const closeBtn = document.createElement('button');
        closeBtn.classList.add('close-btn');
        closeBtn.innerHTML = '&times;';
        closeBtn.addEventListener('click', () => {
            document.body.removeChild(overlay);
        });

        popupContent.appendChild(closeBtn);
        popupContent.appendChild(modalImg);
        overlay.appendChild(popupContent);
        document.body.appendChild(overlay);

        overlay.addEventListener('click', (e) => {
            if (e.target === overlay) {
                document.body.removeChild(overlay);
            }
        });
    });
});
