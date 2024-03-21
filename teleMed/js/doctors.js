let selectionPostInp = document.querySelector('.selection__post__inp'); //выпад.список должностей
let pageDoctors = document.querySelector('.page__doctors'); //страница с врачами
let mainPage = document.querySelector('.main__page'); //страница с должностями
let postOption = document.querySelectorAll('.post__option'); //блок выпад.списка
let doctorsBlock = document.querySelectorAll('.doctors__block'); //блоки врачей
let medOption = document.querySelectorAll('.med__option'); //блок выпад.списка
let selectionMedInp = document.querySelector('.selection__med__inp'); //выпад.список мед


let postSe
window.addEventListener('click' , function(e){
    console.log(e.target);
    if(e.type == 'click'){
        if(e.target.closest('.content__post__box')){
            let postId = e.target.closest('.content__post__box').querySelector('.post__box__title');
            console.log(postId.dataset.postid);
            pageDoctors.style.display = 'flex';
            mainPage.style.display = 'none';
            for(let elem of postOption){
                if(postId.dataset.postid == elem.dataset.postselectid){
                    console.log(true);
                    elem.selected = true;
                    for(let elem2 of doctorsBlock){
                        let doctorsBlockDataPost = elem2.querySelector('.block__info .doctors__block__info .doctors__post');
                        if(doctorsBlockDataPost.dataset.postdocid != elem.dataset.postselectid){
                            elem2.style.display = 'none';
                        }else{
                            elem2.style.display = 'flex';
                        }
                        if(elem2.style.display == 'flex'){
                            console.log(elem2);
                            let activeDoctorBlock = elem2.querySelector('.block__info .doctors__block__info .doctors__med');
                            console.log(activeDoctorBlock.dataset.medpersid);
                            for(let elem3 of medOption){
                                if(activeDoctorBlock.dataset.medpersid == elem3.dataset.medid){
                                    console.log(1231231231);
                                    elem3.style.background = 'green';
                                }else{
                                    elem3.style.background = 'red';
                                }

                            }
                        }
                    }
                }

            }
        }

    }
});

let pageBlock = document.querySelector('.page__block');
pageBlock.addEventListener('click', function(){
    pageDoctors.style.display = 'none';
    mainPage.style.display = 'flex';
});