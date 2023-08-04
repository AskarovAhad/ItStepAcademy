const inputData = document.querySelector('#inputData');
const outputData = document.querySelector('#outputData');
document.querySelector('.content').addEventListener('click', e => {
    if(e.target.tagName !== 'BUTTON') return;
    try{
        outputData.value = JSON.stringify(JSON.parse(inputData.value), null, 4);
        document.querySelector('.alert-text').remove();
        
    }catch(err){
        const errorText = document.createElement('span');
        errorText.className = 'alert-text';
        errorText.innerHTML = '[format error]';
        
        document.querySelector('.title').append(errorText);
    }
    
})
