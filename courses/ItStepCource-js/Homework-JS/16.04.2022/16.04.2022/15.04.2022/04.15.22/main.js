function randomizer(min, max) {
    return Math.floor(Math.random() * (max - min)) + min;
}
function loop(n, action) {
    for(let i = 0; i < n; i++) {
        action(i);
    }
} 


let arr = [];
loop(10, () => arr.push(randomizer(0, 10)));
console.log(loop(arr.length, (i) => console.log(arr[i])));
console.log('\n');
console.log(loop(arr.length, (i) => {
    if (arr[i] % 2 == 0) console.log(arr[i]);  
}));
console.log('\n');
let res = 0;
loop(arr.length, (i) => {
    res += i;
});
console.log(res);
console.log('\n');
console.log(Math.max(...arr));
console.log('\n');
function addByIndex(arr, index, elem){
    arr.splice(index, 0, elem);
    return arr;
}
console.log(addByIndex(arr, 7, 100));
console.log('\n');
function delbyIndex(arr, index){
    arr.splice(index, 1);
    return arr;
}
console.log(delbyIndex(arr, 7));

let arr1 = [];
let arr2 = []; 
loop(5, () => arr1.push(randomizer(0, 10)));
loop(5, () => arr2.push(randomizer(0, 10)));
console.log(arr1);
console.log(arr2);

function noRepeat(arr1, arr2){
    let new_arr = [];
    return new_arr = 
    arr1.concat(arr2).filter((value, index, thisArr) => thisArr.indexOf(value) == index);
}
console.log(noRepeat(arr1, arr2));
function commonElem(arr1, arr2){
    let new_arr = [];
    return new_arr = 
    arr1.concat(arr2).filter((value, index, thisArr) => thisArr.indexOf(value) != index);

}
console.log(commonElem(arr1, arr2));
function notCommonElem(arr1, arr2){
    let new_arr = [];
    return new_arr = 
    arr1.concat(arr2).filter((i) => arr1[i] != arr2[i]);
}
console.log(notCommonElem(arr1, arr2));

