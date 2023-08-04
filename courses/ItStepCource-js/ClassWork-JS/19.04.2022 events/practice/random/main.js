const num = document.querySelector('.num');
const button = document.querySelector('.btn');

function randomNum(){
    return Math.floor(Math.random() * (100 - 0) + 0);
}
document.addEventListener('click', (event) =>{
    num.innerHTML = randomNum();
})