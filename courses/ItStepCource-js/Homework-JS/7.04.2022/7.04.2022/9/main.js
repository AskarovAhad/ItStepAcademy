let num = +prompt('enter three-digit num');
alert(Math.floor(num / 100 + (num % 10) * 100 + (num % 100) - (num % 10)));