let firsth = 10;
let firstm = 10; 
let firsts = 10;

let secondh = 20;
let secondm = 20; 
let secondsec = 20;

function seconds(h,m,s){
    return (h * 3600) + (m * 60) + s;
}
function dateminusdate(fh, fm, fs, sh, sm, ss) {
    if(seconds(fh, fm, fs) > seconds(sh, sm, ss)) return seconds(fh, fm, fs) - seconds(sh, sm, ss); 
    else return seconds(sh, sm, ss) - seconds(fh, fm, fs)
}
function normalTime(given_seconds){
    let h =  Math.floor(given_seconds / 3600);
    let m = Math.floor((given_seconds - h *3600) / 60);
    let s = Math.floor(given_seconds - h *3600 - m * 60);
    console.log(`${h}:${m}:${s}`);
} 

console.log(normalTime(dateminusdate(firsth, firstm, firsts, secondh, secondm, secondsec)));