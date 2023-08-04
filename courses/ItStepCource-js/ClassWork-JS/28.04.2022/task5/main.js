
const countries = ['Uzbekistan', 'Ukraine', 'Urugvay', 'USA', 'Russia', 'Romania', 'Poland', 'Paragvay', 'Pakistan'];

const searchInp = document.querySelector('#inp');
const resultArea = document.querySelector('.resultarea');



resultArea.addEventListener('click', e => {
    if(e.target.tagName === 'LI') {
        searchInp.value = e.target.innerHTML;
        resultArea.innerHTML = '';
    }
})
searchInp.addEventListener('input', () => {
    if(searchInp.value.length !== 0) {
        resultArea.innerHTML = searchCountries(searchInp.value)
    }
})

function searchCountries(text) {
    let result = countries.filter(value => value.toLowerCase().startsWith(text))
    console.log(result);
    let list = `<ul>`
    for(let c of result) {
        list += `<li>${c}</li>`
    }
    list += `</ul>`
    return list; 
}




