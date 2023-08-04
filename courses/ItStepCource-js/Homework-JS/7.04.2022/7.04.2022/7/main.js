const file_size = 820;
let flesh_size_gb = +prompt('enter flesh size in gb');
let flesh_size_mb = flesh_size_gb * 1000;
alert(`you will fit ${Math.floor(flesh_size_mb / file_size)} file(s) per 820 mb`);