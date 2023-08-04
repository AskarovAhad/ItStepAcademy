class First{
    constructor(name, price){
        this.name = name;
        this.price = price;
    }
}

class Check{
    constructor(){
        this.check = [];
    }

    print(){
        for(let elem in this.check){
            console.log(`name: ${this.check[elem].name}\nprice: ${this.check[elem].price}\n`);
        }
        console.log(`Prices:\nAverage: ${this.avgPrice()}\nMost expensive toward: ${this.mostExpensivetoward()}\nGeneral: ${this.generalPrice()}`);
    }
    
    add(newProd){   
        this.check.push(newProd);
    }

    generalPrice(){
        let price = 0;
        for(let elem of this.check){
            price += elem.price;
        }
        return price;
    }    

    avgPrice(){
        let price = this.generalPrice();
        return (price / this.check.length).toFixed(1);
    }

    mostExpensivetoward(){
        return Math.max(...this.check.map(elem => elem.price));
    }
}

let one = new First('water', 1500);
let second = new First('alcohol konyak', 140000);
let check = new Check();
check.add(one);
check.add(second);
check.print();