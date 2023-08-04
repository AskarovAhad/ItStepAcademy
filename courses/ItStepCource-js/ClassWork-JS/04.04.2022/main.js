const rect = {
    x1: 0,
    y1: 0,
    x2: 120,
    y2: 100
}
function getInfo({x1,y1,x2,y2}){
    return `x1 value: ${x1}, y1 value: ${y1}\nx2 value: ${y2}, y2 value: ${y2}`;
}
function getHeight({x1,x2}){
    return x2 - x1; 
}
function getWidth({y1,y2}){
    return y2 - y1;
}
function getSquare(){
    return getWidth(rect) * getHeight(rect); 
}
function getP(){
    return (getWidth(rect) + getHeight(rect))*2;
}
function newHeight(rect, a){
    rect.y2 -= a;
    return getHeight(rect);   
}
function newWidth(rect, a){
    rect.x2 -= a;
    return getWidth(rect);
}
function newCoordinates(rect, a, b){
    rect.y2 -= a;
    rect.x2 -= a;
    getHeight(rect);
    getWidth(rect);
}
function newXCoord(rect, a){
    rect.x1 += a;
    rect.x2 += a;
    return getInfo(rect);
}
function newYCoord(rect, a){
    rect.y1 += a;
    rect.y2 += a;
    return getInfo(rect);
}
function newXYCoord(rect, a, b){
    newYCoord(rect, b);
    newXCoord(rect, a);
}
function checkDot(rect, a, b){
    if(rect.x1 >= a && rect.x2 <= a && rect.y1 >= b && rect.y2 <= b) return true;
    else return false;
}

console.log(getInfo(rect));
console.log(getWidth(rect));
console.log(getHeight(rect));
console.log(getSquare);
console.log(getP);
console.log(newHeight(rect, 5));
console.log(newWidth(rect, 10));
console.log(newCoordinates(rect,5,10));
console.log((newXCoord(rect, 5)));
console.log((newYCoord(rect, 5)));
console.log((newXYCoord(rect, 5, 10)));
console.log(checkDot(rect, 5, 10));