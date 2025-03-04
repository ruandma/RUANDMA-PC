// Variável global para o carrinho (carregada do localStorage)
let cart = JSON.parse(localStorage.getItem("cart")) || [];

// Função para adicionar um item ao carrinho
function addToCart(productData) {
    const existingItem = cart.find((item) => item.id === productData.id);
    if (existingItem) {
        existingItem.quantity += 1;
    } else {
        cart.push({ ...productData, quantity: 1 });
    }
    saveCartToLocalStorage();
    updateCartUI();
}

// Função para remover um item do carrinho
function removeFromCart(productId) {
    cart = cart.filter((item) => item.id !== productId);
    saveCartToLocalStorage();
    updateCartUI();
}

// Função para limpar o carrinho
function clearCart() {
    cart = [];
    saveCartToLocalStorage();
    updateCartUI();
}

// Função para salvar o carrinho no localStorage
function saveCartToLocalStorage() {
    localStorage.setItem("cart", JSON.stringify(cart));
}

// Função para atualizar a interface do carrinho
function updateCartUI() {
    const cartItems = document.getElementById("cart-items");
    const cartCount = document.getElementById("cart-count");
    const cartTotal = document.getElementById("cart-total");

    if (!cartItems || !cartCount || !cartTotal) return;

    // Limpa os itens atuais
    cartItems.innerHTML = "";

    let total = 0;

    cart.forEach((item) => {
        const cartItemElement = document.createElement("div");
        cartItemElement.classList.add("cart-item");
        cartItemElement.innerHTML = `
            <img src="${item.image}" alt="${item.name}" class="cart-item-img">
            <div class="item-details">
                <p>${item.name} (x${item.quantity})</p>
                <p class="item-price">R$ ${item.price.toFixed(2)}</p>
                <button class="remove-item" data-product-id="${item.id}">Remover</button>
            </div>
        `;
        cartItems.appendChild(cartItemElement);

        total += item.price * item.quantity;

        // Adiciona evento para remover o item
        const removeButton = cartItemElement.querySelector(".remove-item");
        removeButton.addEventListener("click", () => removeFromCart(item.id));
    });

    // Atualiza o contador e o total do carrinho
    cartCount.textContent = cart.reduce((sum, item) => sum + item.quantity, 0);
    cartTotal.textContent = `R$ ${total.toFixed(2)}`;
}