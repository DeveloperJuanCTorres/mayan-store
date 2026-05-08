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
        let image = fallbackImage;
        try {
            if (item.images) {
                const images = JSON.parse(item.images);

                if (images.length > 0) {
                    image = images[0];
                }
            }

        } catch (e) {
            console.error('Error cargando imágenes', e);
        }

        container.innerHTML += `
            <div class="flex gap-4 border-b border-[#eee] pb-5">
                <img
                    src="${image}"
                    class="w-20 h-20 object-cover rounded-2xl bg-[#f5f5f5] border border-[#eee]">

                <div class="flex-1">
                    <h4 class="text-sm font-semibold text-[#1a1a1a] leading-snug">
                        ${item.name}
                    </h4>

                    <p class="text-xs text-[#777] mt-2 uppercase tracking-[0.15em]">
                        Cantidad: ${item.qty}
                    </p>

                    <p class="text-base font-semibold text-[#c8a96b] mt-3">
                        S/. ${parseFloat(item.price).toFixed(2)}
                    </p>

                </div>

                <button
                    onclick="removeItem('${item.rowId}')"
                    class="w-10 h-10 rounded-full border border-[#eee] flex items-center justify-center hover:bg-red-500 hover:text-white transition-all duration-300">

                    <i class="fa-solid fa-trash text-sm"></i>

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