// function min (a , b){
//     // return a < b ? a : b;
//     // return a < b && a || b;
//     // return Math.min(a,b);
// }


// const pow = (a,b) =>a ** b;
// const pow1 = (a,b) => Math.pow(a,b);


// const calc = (n1,n2,sign) =>{
//     switch(sign){
//         case '+' : n1 + n2; break;
//         case '-' : n1 - n2; break;
//         case '*' : n1 * n2; break;
//         case '/' : n1 / n2; break;
//     }
// }
// console.log(calc(2,3,'+'));


// function simpleNum(a){
//     if(a % 1 == 0 && a % a == 0){
//         return true;
//     }
//     else{
//         return false
//     }
// }


// function multitable(){
//     for(i = 2; i < 10; i++){
//         for(j = 1; j < 10; j++){
//             console.log(`${i} * ${j} = ${i * j} `);
//         }
//         console.log(`\n`);
//     }
// }
// multitable();


function perc(a,b){
    return a - Math.floor(a / b) * b; 
}
console.log(perc(3,7));


function numsum(){
    let sum = 0;
    for(i = 0; i < arguments.length; i++){
        sum += arguments[i];
    }
    return sum;
}
console.log(numsum(1,2,3,4,5));


function minnums(){
    return Math.min(...arguments);
}
console.log(minnums(5,569,41,958,9566,259));


function boolnum(start, end, bool, callback){
    for(let i = start; i < end; i++){
        callback(i, bool);
    }
}
loop(1, 100, true, function(wtf) {
    if(!division(wtf, 2)) console.log(wtf);
}