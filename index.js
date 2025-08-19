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

            document.querySelectorAll(".increase-qty").forEach(button => {
                button.addEventListener("click", function (event) {
                    event.stopPropagation();
                    const index = this.dataset.index;
                    cartItems[index].quantity += 1;
                    updateCartUI();
                });
            });
            
            document.querySelectorAll(".decrease-qty").forEach(button => {
                button.addEventListener("click", function (event) {
                    event.stopPropagation();
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

                const cartIcon = document.querySelector(".logo img");
                const buttonRect = this.getBoundingClientRect();
                const cartRect = cartIcon.getBoundingClientRect();

                const flyIcon = document.createElement("div");
                flyIcon.classList.add("cart-fly-icon");
                flyIcon.innerHTML = '🛒';
                document.body.appendChild(flyIcon);

                flyIcon.style.position = "fixed";
                flyIcon.style.left = `${buttonRect.left + buttonRect.width / 2 - 20}px`;
                flyIcon.style.top = `${buttonRect.top}px`;
                flyIcon.style.opacity = "1";
                flyIcon.style.zIndex = "1000";

                const deltaX = cartRect.left - buttonRect.left;
                const deltaY = cartRect.top - buttonRect.top;

                flyIcon.style.setProperty("--cart-x", `${deltaX}px`);
                flyIcon.style.setProperty("--cart-y", `${deltaY}px`);

                flyIcon.animate([
                    { transform: `translate(0px, 0px) scale(1)`, opacity: 1 },
                    { transform: `translate(${deltaX}px, ${deltaY}px) scale(0.5)`, opacity: 0 }
                ], {
                    duration: 1000,
                    easing: "ease-in-out",
                    fill: "forwards"
                });

                window.scrollTo({
                    top: cartRect.top - 50,
                    behavior: "smooth"
                });

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

    // Alterna a exibição das configurações dos produtos
    document.querySelectorAll(".config-btn").forEach(button => {
        button.addEventListener("click", function () {
            const targetId = this.getAttribute("data-target");
            const configDiv = document.getElementById(targetId);
            const arrow = this.querySelector(".arrow");

            if (configDiv) {
                const isHidden = configDiv.getAttribute("aria-hidden") === "true";
                configDiv.setAttribute("aria-hidden", !isHidden);
                configDiv.classList.toggle("active", isHidden);
                if (arrow) arrow.textContent = isHidden ? "↑" : "↓";
            }
        });
    });

    // Esconde todos os botões de ação (caso ainda existam no HTML)
    document.querySelectorAll(".product-actions").forEach(actions => {
        actions.style.display = "none";
    });
});