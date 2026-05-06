const btn = document.getElementById('menuBtn');
const menu = document.getElementById('mobileMenu');

btn.addEventListener('click', () => {
    menu.classList.toggle('hidden');
});

function openCart() {
    document.getElementById('cartDrawer').classList.remove('translate-x-full');
    document.getElementById('cartOverlay').classList.remove('hidden');
    loadCart();
}

function closeCart() {
    document.getElementById('cartDrawer').classList.add('translate-x-full');
    document.getElementById('cartOverlay').classList.add('hidden');
}

async function loadCart() {
    const res = await fetch('/cart/content', {
        credentials: 'same-origin'
    });

    const data = await res.json();

    const container = document.getElementById('cartItems');
    container.innerHTML = '';

    const items = Object.values(data.items); // 🔥 CLAVE

    if (items.length === 0) {
        container.innerHTML = `
            <p class="text-center text-gray-500 text-sm">
                Tu carrito está vacío
            </p>
        `;
        return;
    }

    items.forEach(item => {
        container.innerHTML += `
            <div class="flex gap-4 border-b pb-4">
                <img src="${item.image ? '/storage/' + item.image : '/img/no-image.png'}"
                     class="w-16 h-16 object-cover rounded">

                <div class="flex-1">
                    <h4 class="text-sm font-bold">${item.name}</h4>
                    <p class="text-xs text-gray-500">Cantidad: ${item.qty}</p>
                    <p class="text-sm font-semibold">S/. ${item.price}</p>
                </div>

                <button onclick="removeItem('${item.rowId}')" class="text-red-500">
                    <i class="fa-solid fa-trash"></i>
                </button>
            </div>
        `;
    });

    document.getElementById('cartTotal').innerText = 'S/. ' + data.total;
}

async function removeItem(rowId) {
    await fetch('/cart/remove', {
        method: 'POST',
        credentials: 'same-origin', 
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({ rowId })
    });

    loadCart();

    const res = await fetch('/cart/content', {
        credentials: 'same-origin'
    });

    const data = await res.json();
    document.getElementById('cartCount').innerText = data.items.length;
}