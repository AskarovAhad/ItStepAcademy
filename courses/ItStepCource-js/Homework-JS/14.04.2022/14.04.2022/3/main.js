let anyDate = {
    h: 10,
    m: 10,
    s: 10,
}

function Print(h, m, s) {
    console.log(`${h}:${m}:${s}`);
}
Print(time);

function check(object, type, prototype){
    if (object[type] > 59) {
        let i = 0;
        while (object[type] >= 59) {
            object[type] -= 60;
            i++;
        }
        object[prototype] += i;
    }
}

function addTime(object, type, number) {
    if (type == 'hour') {
        object.h += number;
    }
    else {
        if (type == 'minute') {
            object.m += number;
            check(object, type, 'hour');
        }
        else if(type == 'second'){
            object.s += number;
            check(object, type, 'minute');
        }
    }
    return Print(object);
}

addTime(anyDate, 'minute', 10);