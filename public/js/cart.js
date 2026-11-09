
// document.addEventListener('DOMContentLoaded', () => {
//     document.querySelectorAll('.type-card').forEach(card => {
//         card.addEventListener('click', (e) => {
//             window.location.href = e.currentTarget.dataset.url;
//         });
//     });
// });

document.querySelectorAll('.garbidge').forEach(card => {
    card.addEventListener('click', (e) => {
        const productId = card.dataset.id;
        // Передаем для записи в корзину
        fetch(window.AppConfig.routes.cartAdd, {
            method: 'POST',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json', 
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ 
                product_id: productId
            }),
            credentials: 'include' 
        })
        .then(response => response.json())
        .then(data=>{
            const counter = document.getElementById('cart-counter');
            if (counter) {
                console.log(data.count);
                counter.textContent = data.count;
            }
        })
    });
});

document.addEventListener('DOMContentLoaded', function () {
    console.log('page showed');
    fetch(window.AppConfig.routes.cartCount, {
    method: 'GET',
    headers: {
        'X-Requested-With': 'XMLHttpRequest',
        'Accept': 'application/json',
    },
    credentials: 'include'
})
.then(response => response.json())
.then(data => {
    const counter = document.getElementById('cart-counter');
    if (counter) {
        counter.textContent = data.positions;
    }
})
.catch(error => console.error('Ошибка загрузки корзины:', error));
});  



//если кликнули по карте а не по кнопке то переходим по ссылке на карте
document.querySelectorAll('.card, .info, .img-watch, .type-card').forEach(card => {
    card.addEventListener('click', (e) => {

    if(! (e.target.classList.contains('garbidge'))){
        window.location.href = card.dataset.url;
    }
});
});