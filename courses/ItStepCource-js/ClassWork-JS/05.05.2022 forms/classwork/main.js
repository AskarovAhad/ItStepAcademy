const input = document.querySelector('#input');

input.addEventListener('blur', () => {
    if(!input.value.includes('@')){
        input.classList.add('invalid');
        input.classList.add('error');
        error.innerHTML = 'Пожалуйста, введите корректный e-mail';
        input.focus();
    }
    else{
        input.classList.remove('invalid');
        input.classList.remove('error');
        error.innerHTML = '';
    }
})
