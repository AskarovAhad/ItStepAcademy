let time= +prompt('enter seconds');
function normalTime(given_seconds){
    let h =  Math.floor(given_seconds / 3600);
    let m = Math.floor((given_seconds - h *3600) / 60);
    let s = Math.floor(given_seconds - h *3600 - m * 60);
    console.log(`${h}:${m}:${s}`);
} 
console.log(normalTime(time));