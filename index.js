document.addEventListener("DOMContentLoaded", function () {
    console.log("Script carregado!");

    // Seleciona os elementos principais do carrinho
    const sidebar = document.getElementById("cart-sidebar");
    const overlay = document.getElementById("overlay");
    const closeBtn = document.getElementById("close-btn");
    const clearCartBtn = document.getElementById("clear-cart-btn");
    const cartCount = document.getElementById("cart-count");
    const cartItemsContainer = document.getElementById("cart-items");
    const cartTotal = document.getElementById("cart-total");
    const logo = document.querySelector(".logo");

    if (!sidebar || !overlay || !closeBtn || !clearCartBtn || !cartCount || !cartItemsContainer || !cartTotal || !logo) {
        console.error("Erro: Alguns elementos do carrinho não foram encontrados no DOM.");
        return;
    }

    let cartItems = JSON.parse(localStorage.getItem("cartItems")) || [];

    function toggleSidebar() {
        sidebar.classList.toggle("open-sidebar");
        overlay.classList.toggle("visible");
        document.body.style.overflow = sidebar.classList.contains("open-sidebar") ? "hidden" : "auto";
    }

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

    function updateCartUI() {
        cartItemsContainer.innerHTML = "";
        let total = 0;

        cartItems.forEach((item, index) => {
            const cartItemElement = document.createElement("div");
            cartItemElement.classList.add("cart-item");
            cartItemElement.innerHTML = `
                <img src="${item.image}" alt="${item.name}" class="cart-item-img">
                <div class="item-details">
                    <p class="item-name">${item.name}</p>
                    <p class="item-price">R$ ${item.price.toFixed(2)}</p>
                </div>
                <div class="item-quantity">${item.quantity}</div>
                <button class="remove-item" data-index="${index}" aria-label="Remover ${item.name} do carrinho">&times;</button>
            `;
            cartItemsContainer.appendChild(cartItemElement);
            total += item.price * item.quantity;
        });

        cartTotal.textContent = `R$ ${total.toFixed(2)}`;
        cartCount.textContent = cartItems.reduce((sum, item) => sum + item.quantity, 0);
        localStorage.setItem("cartItems", JSON.stringify(cartItems));
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
        button.addEventListener("click", function () {
            const product = {
                id: this.dataset.productId,
                name: this.dataset.productName,
                price: parseFloat(this.dataset.productPrice),
                image: this.dataset.productImage
            };
            addToCart(product);
        });
    });

    cartItemsContainer.addEventListener("click", function (e) {
        if (e.target.classList.contains("remove-item")) {
            const index = e.target.dataset.index;
            cartItems.splice(index, 1);
            updateCartUI();
        }
    });

    clearCartBtn.addEventListener("click", function () {
        cartItems = [];
        updateCartUI();
    });

    updateCartUI();

    // Código para os botões de configurar produtos
    const configButtons = document.querySelectorAll(".config-btn");

    configButtons.forEach(button => {
        button.addEventListener("click", function () {
            const targetId = this.getAttribute("data-target");
            const targetElement = document.getElementById(targetId);
            const productActions = targetElement ? targetElement.nextElementSibling : null; // Encontrar os botões do produto

            if (targetElement) {
                targetElement.classList.toggle("open");
                this.classList.toggle("open");

                // Exibe os botões de ação (adicionar ao carrinho e comprar agora)
                if (productActions) {
                    productActions.style.display = targetElement.classList.contains("open") ? "block" : "none";
                }
            }
        });
    });
});
