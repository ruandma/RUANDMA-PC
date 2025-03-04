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

    function toggleSidebar() {
        sidebar.classList.toggle("open-sidebar");
        overlay.classList.toggle("visible");
        document.body.style.overflow = sidebar.classList.contains("open-sidebar") ? "hidden" : "auto";
    }

    if (sidebar && overlay && closeBtn && clearCartBtn && cartCount && cartItemsContainer && cartTotal && logo) {
        logo.addEventListener("click", toggleSidebar);
        closeBtn.addEventListener("click", toggleSidebar);
        overlay.addEventListener("click", toggleSidebar);

        document.addEventListener("click", function (e) {
            if (!sidebar.contains(e.target) && !logo.contains(e.target)) {
                sidebar.classList.remove("open-sidebar");
                overlay.classList.remove("visible");
                document.body.style.overflow = "auto";
            }
        });

        let cartItems = JSON.parse(localStorage.getItem("cartItems")) || [];

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
            localStorage.setItem("cartItems", JSON.stringify(cartItems));

            // Adiciona eventos às setinhas de aumentar e diminuir
            document.querySelectorAll(".increase-qty").forEach(button => {
                button.addEventListener("click", function (event) {
                    event.stopPropagation(); // Impede que o clique feche a sidebar
                    const index = this.dataset.index;
                    cartItems[index].quantity += 1;
                    updateCartUI();
                });
            });
            
            document.querySelectorAll(".decrease-qty").forEach(button => {
                button.addEventListener("click", function (event) {
                    event.stopPropagation(); // Impede que o clique feche a sidebar
                    const index = this.dataset.index;
                    if (cartItems[index].quantity > 1) {
                        cartItems[index].quantity -= 1;
                    } else {
                        cartItems.splice(index, 1);
                    }
                    updateCartUI();
                });
            });
            
        }

        function addToCart(product) {
            const existingItem = cartItems.find(item => item.id === product.id);
            if (existingItem) {
                existingItem.quantity += 1;
            } else {
                cartItems.push({ ...product, quantity: 1 });
            }
            updateCartUI();
        }

        document.querySelectorAll(".add-to-cart").forEach(button => {
            button.addEventListener("click", function (event) {
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
                flyIcon.innerHTML = '<i class="fas fa-shopping-cart"></i>'; // Ícone do FontAwesome
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
        
                // Aplicar deslocamento como variáveis CSS
                flyIcon.style.setProperty("--cart-x", `${deltaX}px`);
                flyIcon.style.setProperty("--cart-y", `${deltaY}px`);
        
                // Aplicar a animação manualmente (fallback caso CSS não funcione)
                flyIcon.animate([
                    { transform: `translate(0px, 0px) scale(1)`, opacity: 1 },
                    { transform: `translate(${deltaX}px, ${deltaY}px) scale(0.5)`, opacity: 0 }
                ], {
                    duration: 1000,
                    easing: "ease-in-out",
                    fill: "forwards"
                });
        
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

        clearCartBtn.addEventListener("click", function () {
            cartItems = [];
            updateCartUI();
        });

        updateCartUI();
    } else {
        console.error("Erro: Elementos do carrinho não encontrados no DOM.");
    }

    /*** 🎮 CONFIGURAÇÃO DOS PRODUTOS ***/

    // Esconde todos os botões de ação no início
    document.querySelectorAll(".product-actions").forEach(actions => {
        actions.style.display = "none";
    });

    // Seleciona todos os botões de configuração
    const configButtons = document.querySelectorAll(".config-btn");

    configButtons.forEach((button, index) => {
        button.addEventListener("click", function () {
            console.log(`Botão de configuração do produto ${index + 1} clicado.`);

            const targetId = this.getAttribute("data-target");
            const targetElement = document.getElementById(targetId);
            const productArticle = this.closest(".product");
            const productActions = productArticle.querySelector(".product-actions");

            if (!targetElement || !productActions) {
                console.warn(`Elemento não encontrado para o produto ${index + 1}`);
                return;
            }

            // Alterna a visibilidade da descrição
            targetElement.classList.toggle("open");
            this.classList.toggle("open");

            // Exibir os botões APENAS no terceiro produto
            if (index === 2) {
                if (targetElement.classList.contains("open")) {
                    console.log("Configuração aberta, mostrando botões!");
                    productActions.style.display = "flex";
                    productActions.style.opacity = "1"; 
                    productActions.style.visibility = "visible"; 
                    productActions.style.maxHeight = "500px"; // Garantir que o bloco tenha altura
                } else {
                    console.log("Configuração fechada, escondendo botões!");
                    productActions.style.display = "none";
                }
            }            
        });
    });
});