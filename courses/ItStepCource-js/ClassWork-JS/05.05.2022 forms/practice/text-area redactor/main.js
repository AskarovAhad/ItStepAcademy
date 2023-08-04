const view = document.querySelector("#view");
let area = null;

function editStart(){
    area = document.createElement('textarea');
    area.className = 'edit';
    area.value = view.innerHTML;

    area.addEventListener('keydown', event => {
        if(event.ctrlKey && event.code === 'KeyS'){
            area.blur();
        }
    })

    area.addEventListener('blur', () => {
        editEnd();
    })

    document.addEventListener('keydown', event => {
        event.preventDefault();
        if(event.ctrlKey && event.code === 'KeyE'){
            event.preventDefault();
            area.blur();
        }
    })
    view.replaceWith(area);
    area.focus();
}

function editEnd(){
    view.innerHTML = area.value;
    area.replaceWith(view);
}