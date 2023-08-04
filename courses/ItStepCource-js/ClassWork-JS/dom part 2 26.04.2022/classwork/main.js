// document.body.setAttribute('class', 'dark');
// document.querySelector('.dark').style.backdroundColor = '#333';
// console.log(document.body.hasAttribute('class'));
// console.log(document.body.hasAttribute('id'));

// console.log(document.body.getAttribute('class'));

// const p = document.createElement('p');
// p.setAttribute('class', 'red');
// p.innerHTML = 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veritatis dolorum nostrum eum accusamus minima nesciunt ipsa dicta earum est obcaecati, amet nulla ea aut sunt odit, quas debitis ad deleniti?';
// p.style.color = 'red';
// document.body.prepend(p);

// console.log(document.querySelector('div'.dataset.sortByName));




// const fruits = ['banana', 'apple', 'pear', 'orange', 'strawberry', 'pineapple', 'melon'];
// function createListOfFruits(){
//     const list = document.createElement('ul');
//     for(let fruit of fruits){
//         const li = document.createElement('li');
//         li.append(fruit);
//         list.append(li);
//     }
// }
// document.body.append(list);

// const sortBtn = document.querySelector('#sortBtn');
// createListOfFruits();
// sortBtn.addEventListener('click', () =>{
//     fruits.sort((a, b) => a > b ? 1 : -1);
// })

// const fruits = ['banana', 'apple', 'pear', 'orange', 'strawberry', 'pineapple', 'melon'];
const fruits = [
    {name: 'banana', price: 5000},
    {name: 'pear', price: 20000},
    {name: 'orange', price: 30000},
    {name: 'strawberry', price: 35000},
    {name: 'apple', price: 12000}, 
    {name: 'melon', price: 25000},
    {name: 'pineapple', price: 50000}
]

// const sortBtn = document.querySelector('#sortBtn');
const sortBtns = document.querySelector('#sortBtns');
function createListOfFruits(){
    let list = '<ul>';
    for(let fruit of fruits){
        let li = `<li><span>${fruit.name}</span>: <span>${fruit.price}</span></ll>`;
        list += li;
    } 
    list += `</ul>`;
    return list;
}

document.querySelector('.blocklist').innerHTML = createListOfFruits();
sortBtns.addEventListener('click', e => {
    if(!e.target.hasAttribute('data-sort-by')) return;
    let sortName = e.target.dataset.sortBy;
    switch(sortName){
        case 'price': fruits.sort((a,b) => a.price - b.price); break;
        case 'name': fruits.sort((a,b) => a.name > b.name ? 1 : -1); break;
    }
    document.querySelector('.blocklist').innerHTML = createListOfFruits();
})
// sortBtn.addEventListener('click', () => {
//     fruits.sort((a,b) => a > b ? 1 : -1);
//     document.querySelector('.blocklist').innerHTML = createListOfFruits();
// })


/*---------------------------------*/


const squareBlock = document.querySelector('.squareblock');
console.log(`Расстояние контента слева от рамки: ${squareBlock.clientLeft}`); 
console.log(`Расстояние контента сверху от рамки: ${squareBlock.clientTop}`);

console.log(`Ширина клиентской части контента: ${squareBlock.clientWidth}`);
console.log(`Высота клиентской части контента: ${squareBlock.clientHeight}`);

console.log(`Расстояние блока от края браузера слева: ${squareBlock.offsetLeft}`);
console.log(`Расстояние блока от края браузера сверху: ${squareBlock.offsetTop}`);

console.log(`Полная ширина блока включая рамки: ${squareBlock.offsetWidth}`);
console.log(`Полная высота блока включая рамки: ${squareBlock.offsetHeight}`);

console.log(`Полная высота блока с учетом скроллинга ${squareBlock.scrollHeight}`);
console.log(`Полная ширина блока с учетом скроллинга ${squareBlock.scrollWidth}`);

console.log(`Расстояние от верхушки скролла${squareBlock.scrollTop}`);
console.log(`Расстояние от левого края до скролла${squareBlock.scrollLeft}`);

const expand = document.querySelector('#expandBtn');

expand.addEventListener('click', () =>{
    squareBlock.style.height = `${squareBlock.scrollHeight + 60}px`; 
})  