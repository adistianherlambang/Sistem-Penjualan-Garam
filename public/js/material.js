// Minimal Vanilla JS for Material Design POS
document.addEventListener('DOMContentLoaded', () => {
    // Mobile Drawer Toggle
    const menuBtn = document.getElementById('menu-toggle-btn');
    const drawer = document.querySelector('.app-drawer');
    if (menuBtn && drawer) {
        menuBtn.addEventListener('click', () => {
            drawer.classList.toggle('open');
        });
    }

    // Auto calculate for Production form
    const packQuantityInput = document.getElementById('pack_quantity');
    const rawUsedPreview = document.getElementById('raw_used_preview');
    if (packQuantityInput && rawUsedPreview) {
        const updateRawPreview = () => {
            const packs = parseInt(packQuantityInput.value) || 0;
            const grams = packs * 300;
            let display = grams + ' gram';
            if (grams >= 1000000) {
                display = (grams / 1000000).toLocaleString('id-ID', { maximumFractionDigits: 2 }) + ' ton';
            } else if (grams >= 1000) {
                display = (grams / 1000).toLocaleString('id-ID', { maximumFractionDigits: 2 }) + ' kg';
            }
            rawUsedPreview.textContent = display;
        };
        packQuantityInput.addEventListener('input', updateRawPreview);
        updateRawPreview();
    }

    // Auto calculate for Purchase form
    const weightValInput = document.getElementById('purchase_weight_value');
    const weightUnitSelect = document.getElementById('purchase_weight_unit');
    const priceUnitInput = document.getElementById('purchase_price_unit');
    const totalPriceInput = document.getElementById('purchase_total_price');

    if (weightValInput && priceUnitInput && totalPriceInput) {
        const updatePurchaseTotal = () => {
            const weight = parseFloat(weightValInput.value) || 0;
            const price = parseFloat(priceUnitInput.value) || 0;
            totalPriceInput.value = Math.round(weight * price);
        };
        weightValInput.addEventListener('input', updatePurchaseTotal);
        priceUnitInput.addEventListener('input', updatePurchaseTotal);
    }

    // Auto calculate for Sale POS form
    const saleProductSelect = document.getElementById('sale_product_id');
    const salePackQtyInput = document.getElementById('sale_pack_quantity');
    const salePriceInput = document.getElementById('sale_price_per_pack');
    const saleTotalDisplay = document.getElementById('sale_total_display');
    const salePaidInput = document.getElementById('sale_paid_amount');
    const saleChangeDisplay = document.getElementById('sale_change_display');

    if (salePackQtyInput && salePriceInput && saleTotalDisplay) {
        const updateSaleMath = () => {
            const qty = parseInt(salePackQtyInput.value) || 0;
            const price = parseFloat(salePriceInput.value) || 0;
            const total = qty * price;
            saleTotalDisplay.textContent = 'Rp ' + total.toLocaleString('id-ID');

            if (salePaidInput && saleChangeDisplay) {
                const paid = parseFloat(salePaidInput.value) || 0;
                const change = paid - total;
                saleChangeDisplay.textContent = 'Rp ' + (change >= 0 ? change.toLocaleString('id-ID') : '0 (Kurang)');
            }
        };

        if (saleProductSelect) {
            saleProductSelect.addEventListener('change', (e) => {
                const selected = e.target.options[e.target.selectedIndex];
                if (selected && selected.dataset.price) {
                    salePriceInput.value = selected.dataset.price;
                }
                updateSaleMath();
            });
        }

        salePackQtyInput.addEventListener('input', updateSaleMath);
        salePriceInput.addEventListener('input', updateSaleMath);
        if (salePaidInput) {
            salePaidInput.addEventListener('input', updateSaleMath);
        }
    }
});
