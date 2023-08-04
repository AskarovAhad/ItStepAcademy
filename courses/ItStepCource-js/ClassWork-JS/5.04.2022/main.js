let arr1 = [];
let arr2 = [];
let arr3 = [];
let arr4 = [];

function randomizer(){
    return Math.floor(Math.random()* 100) + 1;
}
function loop(n, action){
    for(let i = 0; i < n; i++){
        action();
    }
}

// loop(10, () => arr.push(randomizer()));
// console.log(arr);

// function addByIndex(arr,index, elem){
//     arr.splice(index, 0, elem);
//     return arr;
// }
// console.log(arr);
// function delByIndex(arr,index){
//     arr = arr.splice(index, 1);
//     return arr;
// }
// console.log(arr);

/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-*/
loop(5, () => arr1.push(randomizer()));
loop(5, () => arr2.push(randomizer()));
function thirdArr(arr1, arr2){
    
    return arr3;
}
function crossTwoArr(arr1, arr2){
    for(let i = 0; i < arr1.length; i++){
        for(let j = 0; j < arr2.length; j++){
            if(arr1[i] == arr2[j]) arr4.push(arr1[i]);
        }
    }
}
thirdArr(arr1, arr2);
console.log(arr1);
console.log(arr2);
console.log(arr3);
crossTwoArr(arr1, arr2);
console.log(arr4);