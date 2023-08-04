let a = +prompt('enter 1st num');
let b = +prompt('enter 2nd num');
var max = a > b ? a : b;
var min = a < b ? a : b;
for(let i = min + 4; i < max; i = i + 4){
    console.log(i);
}