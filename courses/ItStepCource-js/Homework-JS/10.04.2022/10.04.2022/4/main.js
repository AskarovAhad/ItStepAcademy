function square(a,b) {
    if(a!=''&&b!='') return a * b;
    else if(a!=''&&b=='') return a*a;
    else if(a==''&&b!='') return b*b;
}