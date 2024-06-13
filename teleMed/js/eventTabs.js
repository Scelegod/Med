let parent = document.querySelector('.events__body');
let links  = parent.querySelectorAll('.event__body__tabs .tab');
let tabs   = parent.querySelectorAll('.tab__content');
for (let i = 0; i < links.length; i++) {
    links[i].addEventListener('click', function(event) {
    let activeLink = parent.querySelector('.event__body__tabs .active__tabs');
    activeLink.classList.remove('active__tabs');
    
    let activeTab = parent.querySelector('.tab__content.active');
    activeTab.classList.remove('active');
    
    tabs[i].classList.add('active');
    this.classList.add('active__tabs');
  });
}


