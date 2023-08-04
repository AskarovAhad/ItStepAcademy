// let num = console.log('enter num');
// if(num > 0){
//     alert(`${num} > 0`)
// }
// else if(num < 0){
//     alert(`${num} < 0`)
// } 
// else if(num == 0){
//     alert('0 == 0');
// } 


// let num = prompt('enter num');
// alert(Math.abs(num));


// let h = prompt('enter h');
// let m = prompt('enter m');
// let s = prompt('enter s');
// if(h <= 23 && h >=0 && m<=59 && m>=0 && s <=59 && s>= 0){
//     alert('GOOD JOB');
// }
// else{
//     alert('date err');
// }

// let x = +prompt('enter x');
// let y = +prompt('enter y');
// if(x == 0 && y == 0){
//     alert('вы в нулевой точке');
// }
// else if(x > 0 && y > 0){
//     alert('вы в первой четверти');
// }
// else if(x < 0 && y < 0){
//     alert('вы в третьей четверти');
// }
// else if(x < 0 && y > 0){
//     alert('вы во второй четверти');
// }
// else if(x > 0 && y < 0){
//     alert('вы в четвертой четверти');
// }
// else if(y === 0){
//     alert('вы на оси y');
// }
// else if(x === 0){
//     alert('вы на оси X');
// }









/*=============*/
// let num1 = +prompt('enter 1ts num');
// let num2 = +prompt('enter 2nd num');
// alert((num1>num2 || num1 == num2) ? num1 : num2);


// let num = +prompt('enter num');
// alert((num % 5 == 0) ? 'YES' : 'NO');


// let planet = prompt('enter planet');
// alert((planet.toLowerCase() === 'земля') ? 'Привет, землянин!' : 'Привет, инопланетянин!');

/*============================*/
// let num = +prompt('enter num');
// while(num>=0){
//     console.log('#');
//     num--;
// }

// let num = +prompt('enter num');
// while(num!=0){
//     console.log(num);
//     num--;
// }


//!!
// let num = +prompt('enter num');
// let pow = +prompt('enter pow');
// while(pow!=0){
//     num*=num;
//     pow--;
// }
// console.log(num);



// let num1 = +prompt('enter 1st num');
// let num2 = +prompt('enter 2nd num');
// let del;
// if(num1 < num2){
//     del = num1;
// }else{
//     del = num2;
// }
// while(del!=1){
//     if(num1 % del == 0 && num2 % del == 0){
//         console.log(del);
//     }
//     del--;
// }

/*=============*/
// let ans;
// do{
//     ans = +prompt('enter true answer 2*2+2')
// }while(ans!=6);

// let num;
// do{
//     num = prompt('enter num')
//     num = 1000 / num;
// }while(num < 50);