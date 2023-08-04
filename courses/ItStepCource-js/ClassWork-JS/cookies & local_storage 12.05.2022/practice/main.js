const content = document.querySelector('#content');
fetch('https://jsonplaceholder.typicode.com/users')
.then(data => {
    if(data.ok) return data.json();
})
.then(users => {
    let res = '<div class = "user-wrapper">';
    users.forEach(user => {
        res += `<div class = "user-name" data-id="${user.id}"">${user.name}</div>`;
    })
    res += '</div>';
    content.innerHTML = res;

    content.addEventListener('click', event => {
        if(t.dataset.id){
            let userInfo = res.filter(user => {
                return user.id === t.dataset.id;
            });
        }
    })
})

