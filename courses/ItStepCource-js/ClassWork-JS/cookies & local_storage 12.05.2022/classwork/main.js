
// document.cookie = 'user=John; path=/; max-age=200000';
// console.log(document.cookie);

// setCookie('user', 'John', {expires: new Date('2022-05-13')});
// console.log(getCookie('user'));

// setCookie('somecookie', {"test": "field"});
// console.log(getCookie('somecookie'));



// const signInForm = document.querySelector('#signInForm');
// const loginInp = signInForm.login;

// signInForm.addEventListener('submit', e => {
//     e.preventDefault();
//     let user =  loginInp.value;
//     setCookie('user', user, {"max-age": 10});
// })
// console.log(`Hello ${getCookie('user')}`);


// localStorage.setItem('test', 1);
// let item = localStorage.getItem('test');
// console.log(item);

// for(let i = 0; i < localStorage.length; i++){
//     let key = localStorage.key(i);
//     console.log(`${key}: ${localStorage.getItem(key)}`);;
// }

// for(let i in localStorage){
//     if(!localStorage.hasOwnProperty(i)){
//         continue;
//     }
//     console.log(i);
// }

// let keys = Object.keys(localStorage)
// for(let i of keys){
//     console.log(i);
// }


const inputArea = document.querySelector('#inputArea');
inputArea.value = localStorage.getItem('value');
inputArea.addEventListener('input', () => {
    localStorage.setItem('value', inputArea.value);
}) 
inputArea.value = localStorage.getItem('value');

