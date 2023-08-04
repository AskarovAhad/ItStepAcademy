/*  ==============    1task   ==============*/

// class Printmachime{
//     constructor(size, color, family){
//         this.size = size;
//         this.color = color;
//         this.family = family;
//     }

//     print(text){
//         document.write(`<p style = "color: ${this.color};
//                                     font-family: ${this.family};
//                                     font-size: ${this.size}">${text}</p>`)
//     }
// }
// let font_size = 50;
// let color = 'red';
// let font_family = 'sans-serif';
// let any_txt = new Printmachime(font_size, color, font_family);
// any_txt.print('hello world');

/*==========================================*/
/*  ==============    2task   ==============*/
if(day_date < 7){
    new_date = `${day_date} day(s) ago`
}
else{
    new_date = `${date.setDate(11)}:${date.setMonth(4)}:${date.setFullYear(2022)}`;
}

class New{
    constructor(h1, text, tags, date){
        this.h1 = h1;
        this.text = text;
        this.tags = tags;
        this.date = new Date(2022, 4, 10);
    }
    print(){
                     
        // day_date < 7 ? this.date = `${day_date} day(s) ago` : `${date.setDate(11)}:${date.setMonth(4)}:${date.setFullYear(2022)}`
        document.write(`<h1${h1}></h1>
                        <p>${this.date}</p>

        `)
    }
} 