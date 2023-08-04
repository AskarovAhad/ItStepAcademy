let car = {
    producer: 'BMW',
    model: 'M5',
    year: 2020,
    speed: 80,
}
function show(car){
    for(let [key, value] of Object.entries(car)){
        console.log(`${key} - ${value}`);
    }
}
let distance = +prompt('Enter distance');   
function calc(speed, distance){
    let time = Math.round(distance / speed);
    if(time % 4 >= 0) time += Math.round(time / 4); 
    return time;
} 
show(car);
console.log(calc(car.speed, distance));