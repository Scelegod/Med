let parent2 = document.querySelector('body');
let links2  = parent2.querySelectorAll('.leftbar__menu .tabik');
let tabs2   = parent2.querySelectorAll('.body__tabs');
for (let i = 0; i < links2.length; i++) {
    links2[i].addEventListener('click', function(event) {
    let activeLink = parent2.querySelector('.leftbar__menu .active__tabik');
    activeLink.classList.remove('active__tabik');
    
    let activeTab = parent2.querySelector('.body__tabs.actived');
    activeTab.classList.remove('actived');
    
    tabs2[i].classList.add('actived');
    this.classList.add('active__tabik');
  });
}
