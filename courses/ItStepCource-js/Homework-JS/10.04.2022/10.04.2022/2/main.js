function factorial(value){
    var result = 1;
    while(value){
        result *= value--;
    }
    return result;
}