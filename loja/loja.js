document.addEventListener("DOMContentLoaded", function () {
    console.log("Script carregado!");

    /*** 🛒 CONFIGURAÇÃO DO CARRINHO DE COMPRAS ***/
    const sidebar = document.getElementById("cart-sidebar");
    const overlay = document.getElementById("overlay");
    const closeBtn = document.getElementById("close-btn");
    const clearCartBtn = document.getElementById("clear-cart-btn");
    const cartCount = document.getElementById("cart-count");
    const cartItemsContainer = document.getElementById("cart-items");
    const cartTotal = document.getElementById("cart-total");
    const logo = document.querySelector(".logo");

    // Função para alternar a visibilidade da sidebar
    function toggleSidebar() {
        sidebar.classList.toggle("open-sidebar");
        overlay.classList.toggle("visible");
        document.body.style.overflow = sidebar.classList.contains("open-sidebar") ? "hidden" : "auto";
    }

    if (sidebar && overlay && closeBtn && clearCartBtn && cartCount && cartItemsContainer && cartTotal && logo) {
        logo.addEventListener("click", toggleSidebar);
        closeBtn.addEventListener("click", toggleSidebar);
        overlay.addEventListener("click", toggleSidebar);

        // Fecha a sidebar ao clicar fora dela
        document.addEventListener("click", function (e) {
            if (!sidebar.contains(e.target) && !logo.contains(e.target)) {
                sidebar.classList.remove("open-sidebar");
                overlay.classList.remove("visible");
                document.body.style.overflow = "auto";
            }
        });

        // Carrega os itens do carrinho do localStorage
        let cartItems = JSON.parse(localStorage.getItem("cartItems")) || [];

        // Atualiza a interface do carrinho
        function updateCartUI() {
            cartItemsContainer.innerHTML = "";
            let total = 0;
    
            cartItems.forEach((item, index) => {
                const cartItemElement = document.createElement("div");
                cartItemElement.classList.add("cart-item");
                cartItemElement.innerHTML = `
                    <img src="${item.image}" alt="${item.name}">
                    <div class="cart-item-details">
                        <p>${item.name}</p>
                        <p class="cart-item-price"><strong>R$ ${item.price.toFixed(2)}</strong></p>
                    </div>
                    <div class="quantity-controls">
                        <button class="decrease-qty" data-index="${index}">⬅️</button>
                        <span>${item.quantity}</span>
                        <button class="increase-qty" data-index="${index}">➡️</button>
                    </div>
                `;
                cartItemsContainer.appendChild(cartItemElement);
                total += item.price * item.quantity;
            });

            cartTotal.textContent = `R$ ${total.toFixed(2)}`;
            cartCount.textContent = cartItems.reduce((sum, item) => sum + item.quantity, 0);
            clearCartBtn.style.display = cartItems.length > 0 ? "block" : "none";

            // Salva os itens do carrinho no localStorage
            localStorage.setItem("cartItems", JSON.stringify(cartItems));

            // Adiciona eventos às setinhas de aumentar e diminuir
            document.querySelectorAll(".increase-qty").forEach(button => {
                button.addEventListener("click", function (event) {
                    event.stopPropagation(); // Impede que o clique feche a sidebar
                    const index = parseInt(this.dataset.index);
                    cartItems[index].quantity += 1;
                    updateCartUI();
                });
            });

            document.querySelectorAll(".decrease-qty").forEach(button => {
                button.addEventListener("click", function (event) {
                    event.stopPropagation(); // Impede que o clique feche a sidebar
                    const index = parseInt(this.dataset.index);
                    if (cartItems[index].quantity > 1) {
                        cartItems[index].quantity -= 1;
                    } else {
                        cartItems.splice(index, 1);
                    }
                    updateCartUI();
                });
            });
        }

        // Adiciona um produto ao carrinho
        function addToCart(product) {
            const existingItem = cartItems.find(item => item.id === product.id);
            if (existingItem) {
                existingItem.quantity += 1;
            } else {
                cartItems.push({ ...product, quantity: 1 });
            }
            updateCartUI();
        }

        // Adiciona eventos aos botões "Adicionar ao Carrinho"
        document.querySelectorAll(".add-to-cart").forEach(button => {
            button.addEventListener("click", function () {
                const product = {
                    id: this.dataset.productId,
                    name: this.dataset.productName,
                    price: parseFloat(this.dataset.productPrice),
                    image: this.dataset.productImage
                };

                addToCart(product);

                /*** 🚀 ANIMAÇÃO DO CARRINHO ***/
                const cartIcon = document.querySelector(".logo img"); // Ícone do carrinho no topo
                const buttonRect = this.getBoundingClientRect();
                const cartRect = cartIcon.getBoundingClientRect();

                // Criar um clone do ícone do carrinho
                const flyIcon = document.createElement("div");
                flyIcon.classList.add("cart-fly-icon");
                flyIcon.innerHTML = '🛒'; // Ícone do carrinho
                document.body.appendChild(flyIcon);

                // Posicionar o ícone sobre o botão clicado
                flyIcon.style.position = "fixed";
                flyIcon.style.left = `${buttonRect.left + buttonRect.width / 2 - 20}px`;
                flyIcon.style.top = `${buttonRect.top}px`;
                flyIcon.style.opacity = "1";
                flyIcon.style.zIndex = "1000";

                // Calcular deslocamento
                const deltaX = cartRect.left - buttonRect.left;
                const deltaY = cartRect.top - buttonRect.top;

                // Aplicar a animação manualmente
                flyIcon.animate(
                    [
                        { transform: `translate(0px, 0px) scale(1)`, opacity: 1 },
                        { transform: `translate(${deltaX}px, ${deltaY}px) scale(0.5)`, opacity: 0 }
                    ],
                    {
                        duration: 1000,
                        easing: "ease-in-out",
                        fill: "forwards"
                    }
                );

                // Rolar a página junto com o carrinho
                window.scrollTo({
                    top: cartRect.top - 50,
                    behavior: "smooth"
                });

                // Remover o ícone após a animação
                setTimeout(() => {
                    flyIcon.remove();
                }, 1000);
            });
        });

        // Limpa o carrinho
        clearCartBtn.addEventListener("click", function () {
            cartItems = [];
            updateCartUI();
        });

        // Atualiza a interface do carrinho ao carregar a página
        updateCartUI();
    } else {
        console.error("Erro: Elementos do carrinho não encontrados no DOM.");
    }

    /*** 🔽 EXPANDIR/RETRAIR DESCRIÇÃO ***/
const descricaoBtn = document.querySelector(".descricao-btn");
const dualshock4 = document.querySelector(".dualshock4");
const descricaoProduto = document.querySelector(".descricao-produto");
const botoesCompra = document.querySelector(".botoes-compra");

if (descricaoBtn && dualshock4 && descricaoProduto && botoesCompra) {
    descricaoBtn.addEventListener("click", function () {
        // Alterna a classe 'open' na descrição
        descricaoProduto.classList.toggle("open");

        // Alterna a visibilidade dos botões de compra
        if (descricaoProduto.classList.contains("open")) {
            botoesCompra.style.display = "flex";
            botoesCompra.classList.add("open");
            dualshock4.style.height = "350px"; // Altura fixa para o estado "aberto"
        } else {
            botoesCompra.style.display = "none";
            botoesCompra.classList.remove("open");
            // Define altura diferente para mobile e desktop
            if (window.innerWidth <= 480) {
                dualshock4.style.height = "155px"; // Mobile
            } else {
                dualshock4.style.height = "170px"; // Desktop
            }
        }

        // Altera o texto do botão de descrição
        descricaoBtn.textContent = descricaoProduto.classList.contains("open") ? "Descrição ↑" : "Descrição ↓";
    });
} else {
    console.error("Erro: Elementos da descrição não encontrados no DOM.");
}

    /*** ALTERAR VISIBILIDADE DO PRODUTO AO CLICAR NO BOTÃO "ACESSÓRIO" ***/
    const acessorioBtn = document.getElementById("acessorio-btn");
    const categoriaBtns = document.querySelectorAll(".categoria-btn");

    if (acessorioBtn && categoriaBtns) {
        acessorioBtn.addEventListener("click", function () {
            if (dualshock4.style.display === "none") {
                dualshock4.style.display = "block"; // Exibe o produto
            } else {
                dualshock4.style.display = "none"; // Esconde o produto
            }
        });

        // Esconde o produto ao clicar em outras categorias
        categoriaBtns.forEach(function (btn) {
            btn.addEventListener("click", function () {
                if (btn.id !== "acessorio-btn") {
                    dualshock4.style.display = "none"; // Esconde o produto apenas se outro botão for clicado
                }
            });
        });
    }
});