<<<<<<< HEAD
var addtocart;
var cartcount;

addtocart = document.querySelector('#add-to-cart');
cartcount = document.querySelector('#cart-count');
cartcount = 0


addtocart.addEventListener('click', function(){
    cartcount = cartcount + 1;
    console.log(cartcount);
    document.querySelector('#cart-count').textContent = cartcount;
=======
var addtocart;
var cartcount;

addtocart = document.querySelector('#add-to-cart');
cartcount = document.querySelector('#cart-count');
cartcount = 0


addtocart.addEventListener('click', function(){
    cartcount = cartcount + 1;
    console.log(cartcount);
    document.querySelector('#cart-count').textContent = cartcount;
>>>>>>> commit
})