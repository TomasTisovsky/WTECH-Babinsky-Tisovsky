window.addEventListener('resize', function () {
    if (window.innerWidth <= 992) {
        var container = document.getElementById('shopping-cart-body');
        var specialDiv = container.querySelector('.cart-summary');
        container.appendChild(specialDiv);
    }
});
