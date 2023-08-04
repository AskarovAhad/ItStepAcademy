document.addEventListener('DOMContentLoaded', () => {
    const tabsHeaderItem = document.querySelectorAll('.tabs__header-item'),
          tabsContentItem = document.querySelectorAll('.tabs__content-item'),
          tabsHeader = document.querySelector('.tabs__header');

    function hideContent(){
        tabsContentItem.forEach(item => {
            item.style.display = 'none';
        })

        tabsHeaderItem.forEach(tab => {
            tab.classList.remove('tabs__header-item_active');
        })
    }
    function showContent(i = 0) {
        tabsContentItem[i].style.display = 'flex';
        tabsHeaderItem[i].classList.add('tabs__header-item_active');
    }
    hideContent();
    showContent();
    tabsHeader.addEventListener('click', event => {
        const target = event.target;
        if(target && target.classList.contains('tabs__header-item')) {
            tabsHeaderItem.forEach((item, index) => {
                if(target == item){
                    hideContent();
                    showContent(index);
                }
            })
        }
    })
})