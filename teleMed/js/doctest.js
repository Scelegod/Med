let doctors = document.querySelector('.doctors'); //главный блок докторов
let pageDoctors = document.querySelector('.page__doctors'); //страница с врачами
let mainPage = document.querySelector('.main__page'); //страница с должностями
let postBox = document.querySelectorAll('.content__post__box'); //блоки должностей
let postOption = document.querySelectorAll('.post__option'); //блок выпад.списка
let medOption = document.querySelectorAll('.med__option'); //блок выпад.списка
let selectionPostInp = document.querySelector('.selection__post__inp'); //выпад.список должностей
let selectionMedInp = document.querySelector('.selection__med__inp'); //выпад.список мед
let doctorsBlock = document.querySelectorAll('.doctors__block'); //блоки врачей
// console.log(medOption)

for(let elemPost of postOption){
    for(let elem of postBox){
        elem.addEventListener('click', function(){
            pageDoctors.style.display = 'flex';
            mainPage.style.display = 'none';
            let elemTitle = elem.querySelector('.post__box__title');
            if(elemPost.dataset.postselectid == elemTitle.dataset.postid){
                elemPost.selected = true;
                for(let elem2 of doctorsBlock){
                    let doctorsBlockDataPost = elem2.querySelector('.block__info .doctors__block__info .doctors__post');
                    if(doctorsBlockDataPost.dataset.postdocid != elemPost.dataset.postselectid){
                        elem2.style.display = 'none';
                    }else{
                        elem2.style.display = 'flex';
                    }
                    selectionPostInp.addEventListener('change', function(){
                        if(selectionPostInp.value != doctorsBlockDataPost.textContent){
                            elem2.style.display = 'none';
                        }else{
                            elem2.style.display = 'flex';
                            for(let elem3 of medOption){
                                console.log(elem3.dataset.medid);
                                // if(elem2.style.display == 'flex'){
                                //     let doctorsBlockDataMed = elem2.querySelector('.block__info .doctors__block__info .doctors__med');
                                //     for(let elem4 of doctorsBlockDataMed){

                                //         console.log(elem4);
                                //         if(doctorsBlockDataMed.dataset.medpersid == elem3.dataset.medid){
                                //             elem3.style.background = 'green';
                                //             elem3.style.display = 'flex';
                                //         }else{
                                //             elem3.style.background = 'red';
                                //             elem3.style.display = 'none';
                                //         }
                                //     }
                                // }
                            }
                        }
                            
                    });

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