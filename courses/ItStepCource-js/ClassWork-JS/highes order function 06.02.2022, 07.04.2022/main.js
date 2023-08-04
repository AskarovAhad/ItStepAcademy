import { SCRIPTS } from "/db.js";
console.log(SCRIPTS);

function filter(arr, test){
    let paddes = [];
    for(let elem of arr){
        if(test(elem)){
            passed.push(elem);
        }
    }
    return passed;
}

// console.log(SCRIPTS.filter(element => element.direction === 'rtl' && element.year < 1900));
// console.log(SCRIPTS.filter(element => element.year > 1980));

function map(arr, transform) {
    let mapped = [];
    for(let elem of arr){
        mapped.push(transform(elem));
    }
    return mapped;
}

// let numbers = [,1,2,3,4,5,6,7,8,9];
// let squared = map(numbers, n => {
//     return {    
//     isEven: n % 2 === 0 && 'even' ||  'odd',
//     n,
//     }
// });
// console.log(squared);
// let rtlScripts = filter(SCRIPTS, elem => elem.direction === 'rtl');
// console.log(map(rtlScripts, elem => elem.name));


function reduce(arr, combine, accumulator){
    let current = accumulator;
    for(let elem of arr){
        current= combine(current, elem);
    }
    return current;
}

// let arr = [1,2,3,4,5,6,7,8,9,10];
// let sum = reduce(arr, (a,b) => a + b, 0);
// console.log(sum);

function charecterCount(script){ 
    return script.ranges.reduce((count, [from, to]) =>{ 
        return count + [to - from]; 
    }, 0) 
} 
// console.log( 
//     SCRIPTS.reduce((count, current) => { 
//         return charecterCount(count) < charecterCount(current) ? current : count; 
//     }) 
// );

function average(arr){
    return arr.reduce((a,b) => a + b) / arr.length;
}
// console.log(Math.round(average(SCRIPTS.filter(s => s.living).map(s => s.year))));

function charecterScript(code){
    for(let script of SCRIPTS){
        if(script.ranges.some(([from,to]) => {
            return code >= from && code < to; 
        })){
            return script;
        }   
    }
    return null;
}
// console.log((charecterScript(1959)));
// console.log('🦗'.charCodeAt(0));
// console.log('🧠'.charPointAt(0));

function countBy(items, groupName){
    let counts = [];
    for(let item of items){
        let name = groupName(item);
        let knonw = counts.findIndex(object => object.name == name);
        if(knonw === -1){
            counts.push({name, count: 1});
        }
        else{
            counts[knonw].count++;
        }
    }
    return counts;
}
// let numbers = [1,2,3,4,5,6,8];
// console.log(numbers, n => n > 2);

function textScripts(text){
    let scripts = countBy(text, char => {
        let obj = charecterScript(char.codePointAt(0));
        return obj ? obj.name : 'not find'; 
    });

    let total = scripts.reduce((accumulator, {count}) => accumulator + count, 0);
    if(total === 0) return 'No scrips fount';
    return scripts.map(({name, count}) =>{
        return `${Math.round(count *100 / total)}% ${name}`;
    }).join(', ');
}
// console.log(textScripts('привет hello Еј'));

// let govnomassiv = [1[2[3[4[5[6[7[8[9]]]]]]]]];
// let normmassiv = govnomassiv.reduce((acc, curr) => arr.concat(curr), []); 
// console.log((arr.flat(Infinity)));

function loop(start, test, update, body){
    for(let value = start; test(value); value = update(value)){
        body(value);
    }
}
loop(1, n => n < 10, n => n + 1, console.log);

 
