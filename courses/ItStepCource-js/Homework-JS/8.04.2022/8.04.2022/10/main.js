var num = +prompt('enter num');
var count = 0;
for(let i = 2; i < num; i++){
    if(num % i == 0){
        count++;
    }
}
if(count > 0){
    alert('no');
}
else{
    alert('yes');
}