document.addEventListener('DOMContentLoaded', function () {
    const select = document.getElementById('package_id');
    const description = document.getElementById('package-description');

    if (select && description) {
        select.addEventListener('change', function () {
            const selected = select.options[select.selectedIndex];
            const price = selected.getAttribute('data-price');
            const name = selected.getAttribute('data-name');

            if (price && name) {
                description.textContent = `Paquete seleccionado: "${name}", Precio: $${parseFloat(price).toFixed(2)}`;
            } else {
                description.textContent = 'Seleccione un paquete para ver su precio.';
            }
        });
    }
});
