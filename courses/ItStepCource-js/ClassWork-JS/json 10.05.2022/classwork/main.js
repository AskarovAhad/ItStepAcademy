fetch('./user.json')
    .then(data => {
        if(data.ok){
            return data.json();
        }
    })
    .then(data => {
        document.body.innerHTML = `<ul>`;
        for(let [key, value] of Object.entries(data)){
            document.body.innerHTML += `<li>${key}: ${value}</li>`;
        }
        document.body.innerHTML += `</li>`;
    }).catch(err =>{
        throw new Error('Возникла какая-то ошибка')
    });