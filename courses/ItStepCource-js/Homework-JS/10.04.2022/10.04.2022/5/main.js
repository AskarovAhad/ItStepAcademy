function isPerfect( num )
{
    let sum = 1;
 
    for( let i = 2; i <= num / 2; i++ )
        if( i % i == 0 ) sum += i;
         
    return sum == num;
}