let a = 5;
let b = 10;
function isPerfect( a,b )
{
    let perfect = [];
    for (let i = a; i < b; i++) {
      sum = 0;
      for (let n = 1; n <= i/2; n++) {
        if (i % n === 0) sum += n;
      }
      if (i === sum) perfect.push(i);
    }
    return perfect;
}