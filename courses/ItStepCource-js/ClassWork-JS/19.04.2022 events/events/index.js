
const button = document.querySelector('.btn');
const block = document.querySelectorAll('div');

// document.addEventListener('click', (event) => {
//     button.innerHTML = `X: ${event.clientX}, Y: ${event.clientY}`;
//     button.style.transform = `translate(${event.clientX}px, ${event.clientY}px)` 
// })


function randomNumber(min = 0, max = 255) {
    return Math.floor(Math.random() * (max - min) + min);
}
function getColor(opacity) {
    return `rgba(${randomNumber()}, ${randomNumber()}, ${randomNumber()}, ${opacity})`;
}

// for(let elem of block) {
//     elem.style.backgroundColor = getColor(0.3); 
//     elem.addEventListener('click', () => {
//         console.log(elem.className);
//         console.log(elem.tagName);
//     })
// }

// let count = 0;
// document.body.addEventListener('click', (event) => {
//     console.log(event.target.tagName);
//     if(event.target.closest('.someblock')) {
//         event.target.style.backgroundColor = getColor(1);
//     }else if(event.target.tagName === 'BUTTON') {
//         event.target.innerHTML = count++;
//     }
// })

document.addEventListener('mousedown', (e) => {
    if(e.which === 1) console.log('Мы нажали на левую кнопку мыши');
    else if(e.which === 2) console.log(`Мы нажали на среднюю кнопку мыши`);
})

document.addEventListener('contextmenu', (e) => {
    e.preventDefault();
    console.log(`мы отключили контекстное меню`);
})

const firstDiv = block[0];
firstDiv.innerHTML = "";
document.addEventListener('keydown', (e) => {
    if(e.ctrlKey && e.key) e.preventDefault(); firstDiv.innerHTML = `CTRL + ${e.key}`;
    // firstDiv.innerHTML += e.key
    // if(firstDiv.innerHTML.length >= 30) firstDiv.innerHTML = '';
})


document.addEventListener('load', () => {
    
})