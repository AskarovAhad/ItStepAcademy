let num = +prompt('enter num');
let pow = +prompt('enter pow');
let result = num;
while(pow>1){
    result = result*num;
    pow--;
}
alert(result);