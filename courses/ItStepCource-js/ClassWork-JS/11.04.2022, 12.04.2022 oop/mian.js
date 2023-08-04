/*=====================================================*/
//11.04.2022
/*=====================================================*/


// function speak(line){
//     console.log(`${this.type} кролик говорит ${line}`);
// }
// let whiteRabbit = {
//     type: 'Белый',
//     speak,
// }
// let killerRabbit = {
//     type: 'голодный',
//     speak,
// }
// whiteRabbit.speak('я белый');
// killerRabbit.speak('я голодный');

/*=====================================================*/

// const protoRabbit = {
//     speak(line){
//         console.log(`${this.type} кролик говорит: ${line}`);
//     },
//     toString(){
//         return 'Этот объект преобразовался в троку';
//     }
// };
// const kilerRabbit = Object.create(protoRabbit);
// console.log((Object.getPrototypeOf(killerRabbit)));
// console.log(killerRabbit.toString());

/*=====================================================*/

// const protoRabbit = {
//     speak(line){
//         return (`${this.type} кролик говорит: ${line}`);
//     },
// };
// function makeRabbit(type){
//     let rabbit = Object.create(protoRabbit);
//     rabbit.type = type;
//     return rabbit;
// }
// console.log(makeRabbit('белый').speak('я белый'));
// let blackRabbit = makeRabbit('черный');
// console.log(blackRabbit.speak('я черный'));
// console.log(blackRabbit);

/*=====================================================*/

// function Rabbit(type) {
//     this.type = type;
// }
// Rabbit.prototype.speak = function (line) {
//     console.log(`${this.type} кролик говорит: ${line}`);
// }
// const kilerRabbit = new Rabbit('Hungry');
// console.log(kilerRabbit);
// kilerRabbit.speak('я голодный')

// console.log(Object.getPrototypeOf(Rabbit) === Function.prototype);
// console.log(Object.getPrototypeOf(killerrabbit) == Rabbit.prototype);
// console.log(Object.getPrototypeOf(Rabbit.prototype) === Object.prototype);

/*=====================================================*/

// class Rabbit {
//     constructor(type){
//         this.type = type;
        
//     }

//     speak(line){
//         console.log(`${this.type} кролик говорит: ${line}`);
//     }
// }
// const killerRabbit = new Rabbit('киборг');
// console.log(killerRabbit);
// killerRabbit.speak('голодный');

/*=====================================================*/

// const varyingSize = {
//     get size(){
//         return Math.floor(Math.random() * 10);
//     }
// }
// console.log(varyingSize.size);

/*=====================================================*/

// class Temperature{
//     constructor(celsius){
//         this.celsius = celsius;
//     }
//     get fahrenheit(){
//         return this.celsius * 1.8 + 32;
//     }

//     set fahrenheit(value){
//         this.celsius = (value - 32) / 1.8;  
//     }

//     static fromFahrenheit(value){
//         return new Temperature((value - 32) / 1.8);
//     }

// }
// const temp = new Temperature(36.6);
// const temp = new Temperature.fromFahrenheit(100);
// console.log(temp);
// console.log(temp.celsius);
// console.log(temp.fahrenheit);

/*=====================================================*/

// class Group{
//     constructor(){
//         this.group = [];
//     }
//     add(value){
//         if(!this.has(value)) this.group.push(value);
//     }
//     delete(index, value){
//         this.group.filter(i => i !== value);
//     }
//     has(value){
//         return this.group.includes(value);
//     }

//     static from(collection){
//         let set = new Group();
//         for(let elem of collection){
//             set.add(elem);
//         }
//         return set;
//     }
// }

// console.log(Group.from([1,1,1,1,2,,2,2,2,33,3,3,,5,55,5,6,6,6,,6,,87,77,7,7,7,]));



/*=====================================================*/
//12.04.2022
/*=====================================================*/


// let sym = Symbol('name');
// let sym2 = Symbol('name');
// console.log(sym);
// console.log(sym === Symbol('name'));

// class Rabbit{
//     constructor(type){
//         this.type = type;
//     }
// }

// Rabbit.prototype[sym] = 55;
// Rabbit.prototype[sym2] = 100;

// let rabbit = new Rabbit('белый');
// console.log(rabbit);
// console.log(rabbit[sym]);

/*=====================================================*/

// const toStringSymbol =  Symbol('toString');

// Array.prototype[toStringSymbol] = function(){
//     return `${this.length} длина массива`;
// }

// let numbers = [1,2,3];
// console.log(numbers.toString());
// console.log(numbers[toStringSymbol]());

/*=====================================================*/

// let hello = 'hello'[Symbol.iterator]();
// console.log(hello.next());
// // console.log(hello.next().done);
// console.log(hello.next());
// console.log(hello.next());
// console.log(hello.next());
// console.log(hello.next());
// console.log(hello.next());

/*=====================================================*/

// class Group{
//     constructor(){
//         this.collection = [];
//     }
//     add(value){
//         if(!this.has(value)) this.collection.push(value);
//     }
//     delete(index, value){
//         this.collection.filter(i => i !== value);
//     }
//     has(value){
//         return this.collection.includes(value);
//     }

//     static from(collection){
//         let set = new Group();
//         for(let elem of collection){
//             set.add(elem);
//         }
//         return set;
//     }

//     [Symbol.iterator](){
//         return new GroupIterator(this);
//     }
// }

// class GroupIterator {
//     constructor(group){
//         this.group = group;
//         this.position = 0;
//     }
//     next(){
//         if(this.position > this.group.collection.length){
//             return {dane: true}
//         }
//         else{
//             let result = {value: this.group.collection[this.position], done: false}
//             this.position++;
//             return result;
//         }
//     }
// }

// const gr = Group.from([1,2,3,4,5,6]);
// let iterator = gr[Symbol.iterator]();
// console.log(iterator);
// console.log(iterator.next());

// for(let e of gr){
//     console.log(e);
// }