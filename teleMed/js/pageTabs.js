let postBox = document.querySelectorAll('.content__post__box');
let pageDoctors = document.querySelector('.page__doctors');
let mainPage = document.querySelector('.main__page');
let postOption = document.querySelectorAll('.post__option');

for(let elemPost of postOption){
    for(let elem of postBox){
        elem.addEventListener('click', function(){
            pageDoctors.style.display = 'flex';
            mainPage.style.display = 'none';
            let elemTitle = elem.querySelector('.post__box__title');
            
            if(elemPost.dataset.postid == elemTitle.dataset.postid){
                elemPost.selected = true;
                for(let elem2 of doctorsBlock){
                    if(elemPost.selected = true){
                    if(elemPost.value != elem2.textContent){
                        // elem.classList.remove('doctors__active')
                        elem.style.display = 'none';
                    }else{
                        elem.style.display = 'flex';
                    }
                    }
                }
            }
        });
    }
}

let pageBlock = document.querySelector('.page__block');
pageBlock.addEventListener('click', function(){
    pageDoctors.style.display = 'none';
    mainPage.style.display = 'flex';
});
