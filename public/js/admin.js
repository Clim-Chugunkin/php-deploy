document.querySelectorAll('.admin-card').forEach(card =>{
    card.addEventListener('click', (e) => {
        if (!(e.target.classList.contains('btn')) && 
                (!(e.target.classList.contains('toggle-featured')))) {
            window.location.href = card.dataset.url;    
        }
        
    });  
});


document.querySelectorAll('.toggle-featured').forEach(btn=>{
    btn.addEventListener('click', (e)=> {
        event.preventDefault();
        const watchId = btn.dataset.id;
        fetch(window.AppConfig.routes.addToPop, {
            method: 'POST',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json', 
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ 
                    watch_id: watchId
                }),
            credentials: 'include' 
        })
        .then(response => response.json())
        .then(data => {
            btn.checked = (data.status === 'added');
        })
    })
});