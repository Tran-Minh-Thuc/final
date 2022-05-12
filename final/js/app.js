// var minSlider = document.getElementById('min');
// var maxSlider = document.getElementById('max');

// var outputMin = document.getElementById('min-value');
// var outputMax = document.getElementById('max-value');

// outputMin.innerHTML = minSlider.value;
// outputMax.innerHTML = maxSlider.value;

// minSlider.oninput = function() {
//     outputMin.innerHTML = this.value;
// }

// maxSlider.oninput = function() {
//     outputMax.innerHTML = this.value;
// }

const getElement = (selection) => {
    const element = document.querySelector(selection);
    if (element) return element;
    throw new Error(
        `Please check "${selection}" selector, no such element exist`
    );
};

const toggleNav = getElement('.toggle-nav');
const sidebarOverlay = getElement('.sidebar-overlay');
const closeBtn = getElement('.sidebar-close');

toggleNav.addEventListener('click', () => {
    sidebarOverlay.classList.add('show');
});
closeBtn.addEventListener('click', () => {
    sidebarOverlay.classList.remove('show');
});

const cartOverlay = getElement('.cart-overlay');
const closeCartBtn = getElement('.cart-close');
const toggleCartBtn = getElement('.toggle-cart');
const productCartBtnList = [...document.querySelectorAll('.product-cart-btn')];

toggleCartBtn.addEventListener('click', () => {
    cartOverlay.classList.add('show');
});
closeCartBtn.addEventListener('click', () => {
    cartOverlay.classList.remove('show');
});