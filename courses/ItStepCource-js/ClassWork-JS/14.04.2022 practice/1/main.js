class OrderList{
    constructor(name, amount, status){
        this.name = name;
        this.amount = amount;
        this.status = status;
    }
}
class List{
    constructor(){
        this.list = [];
    }

    print() {
        this.list.sort((a,b) => a.status - b.status); 
        for(let elem in this.list){
            console.log(`Name: ${this.list[elem].name}\nAmount: ${this.list[elem].amount}\nStatus: ${this.list[elem].status}\n`);
        }
    }

    addList(newList){
        let a = this.list.findIndex(elem => elem.name === newList.name);
        if(a === -1){ 
            this.list.push(newList);
        }
        else {
            this.list[a].amount += newList.amount;
            this.list[a].status = false;
        }
    }

    changeListStatus(listName, newstatus){
        let a = this.list.findIndex(elem => elem.name === listName.name);
        if(a === -1) console.log(`no list with name ${listName.name}`);
        else this.list[a].status = newstatus;
    }
}
function menu() {
    console.log(`1 - add list\n2 - change status\n
                3 - change list\n
                0 - exit\n`);     
}

let one = new OrderList('asd', 5, false);
let two = new OrderList('qwe', 6, true);
let one_test = new OrderList('asd', 5, false)
let arr = new List;
arr.addList(one);
arr.addList(two);
arr.print();
console.log(`===================`);
arr.changeListStatus(one, true);
arr.print();
console.log(`===================`);
arr.addList(one_test);
arr.print();
console.log(`===================`);
