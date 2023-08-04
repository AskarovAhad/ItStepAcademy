let a = +prompt('etner 1st num');
let b = +prompt('etner 2nd num');
let max_num = a > b ? a : b;
let min_num = a < b ? a : b;
b = min_num;
while(b != 1){
    if(max_num % b == 0 && min_num % b == 0){
        console.log(b);
    }
    b--;
}