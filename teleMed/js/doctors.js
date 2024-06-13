let selectionPostInp = document.querySelector('.selection__post__inp'); //выпад.список должностей
let pageDoctors = document.querySelector('.page__doctors'); //страница с врачами
let mainPage = document.querySelector('.main__page'); //страница с должностями
let postOption = document.querySelectorAll('.post__option'); //блок выпад.списка
let doctorsBlock = document.querySelectorAll('.doctors__block'); //блоки врачей
let medOption = document.querySelectorAll('option.med__option'); //блок выпад.списка
let selectionMedInp = document.querySelector('.selection__med__inp'); //выпад.список мед
let result = [];


let window2 = document.querySelector('.window')

window.addEventListener('click' , function(e){
    if(e.type == 'click'){
        if(e.target.closest('.content__post__box')){
            let postId = e.target.closest('.content__post__box').querySelector('.post__box__title');
            // console.log(postId.dataset.postid);
            pageDoctors.style.display = 'flex';
            mainPage.style.display = 'none';
            for(let elem of postOption){
                if(postId.dataset.postid == elem.dataset.postselectid){
                    elem.selected = true;
                    for(let elem2 of doctorsBlock){
                        let doctorsBlockDataPost = elem2.querySelector('.block__info .doctors__block__info .doctors__post');
                        if(doctorsBlockDataPost.dataset.postdocid != elem.dataset.postselectid){
                            elem2.style.display = 'none';
                        }else{
                            elem2.style.display = 'flex';
                        }
                    }
                }
            }
            result = [];

            pussArr(medOption, doctorsBlock);
            flexMedOpt(medOption, makeUniq(result));

            
        }
        if(e.target.closest('.doctors__name')){
            window2.classList.add('active');
            // let parent = e.target.closest('.doctors__name').parentElement;
            let docName = document.querySelector('.doctor__name');
            let MedName = document.querySelector('.doctor__med__name');
            let PostTime = document.querySelector('.post__time');
            let PostName = document.querySelector('.post__name');
            let MedName2 = document.querySelector('.doctor__med__span');
            let City = document.querySelector('.doctor__city__span');
            docName.textContent = e.target.closest('.doctors__name').parentElement.querySelector('.doctors__name').textContent;
            MedName.textContent = e.target.closest('.doctors__name').parentElement.querySelector('.doctors__med').textContent;
            PostTime.textContent = e.target.closest('.doctors__name').parentElement.querySelector('.doctors__med__posttime').textContent;
            PostName.textContent = e.target.closest('.doctors__name').parentElement.querySelector('.doctors__post').textContent;
            MedName2.textContent = e.target.closest('.doctors__name').parentElement.querySelector('.doctors__med').textContent;
            City.textContent = e.target.closest('.doctors__name').parentElement.querySelector('.doctors__med__city').textContent;
            

        }
        
    }
});

//Функция удаление повторяющих элементов в массиве
const makeUniq = (arr) => {
    const uniqSet = new Set(arr);
    return [...uniqSet];
}

//Функция добавление элементов в массив
const pussArr = (mOpt, docBl) => {
    result.push('1');
    for(let i = 0; i < mOpt.length; i++){
        for(let j = 0; j < docBl.length; j++){
            if(docBl[j].style.display == 'flex'){
                if(mOpt[i].dataset.medid === docBl[j].querySelector('.block__info .doctors__block__info .doctors__med').dataset.medpersid){
                    result.push(docBl[j].querySelector('.block__info .doctors__block__info .doctors__med').dataset.medpersid);
                    
                }
            }
        }
    }      
}
//Функция поиск одинаковых значений в массиве и значений в выпад списке
const flexMedOpt = (mOpt, arr) =>{
    for(let i = 0; i < mOpt.length; i++){
        for(let j = 0; j < arr.length; j++){
            if(arr.includes(mOpt[i].dataset.medid)){
                mOpt[i].style.display = 'flex';                        
            }else{
                mOpt[i].style.display = 'none';                        
            }
        }
    } 
}
selectionPostInp.addEventListener('change' , function(){
    for(let elem2 of doctorsBlock){
        let doctorsBlockDataPost = elem2.querySelector('.block__info .doctors__block__info .doctors__post');
        selectionMedInp[0].selected = true;
        if(selectionPostInp.value != doctorsBlockDataPost.textContent){
            elem2.style.display = 'none';
        }else{
            elem2.style.display = 'flex';
            
        }
    }
    result = [];
    pussArr(medOption, doctorsBlock);
    flexMedOpt(medOption, makeUniq(result));
});
selectionMedInp.addEventListener('change', function(){
    for(let elem4 of doctorsBlock){
        if(selectionMedInp.value == elem4.querySelector('.block__info .doctors__block__info .doctors__med').textContent && selectionPostInp.value == elem4.querySelector('.block__info .doctors__block__info .doctors__post').textContent){
            elem4.style.display = 'flex';
        }else if(selectionMedInp.value == 'Все клиники' && selectionPostInp.value == elem4.querySelector('.block__info .doctors__block__info .doctors__post').textContent){
            elem4.style.display = 'flex';
        }else{
            elem4.style.display = 'none';
        }
    }
});

let pageBlock = document.querySelector('.page__block');
pageBlock.addEventListener('click', function(){
    pageDoctors.style.display = 'none';
    mainPage.style.display = 'flex';
});

const closeWindow = document.getElementById('window__close')


closeWindow.addEventListener('click', () =>{
    window2.classList.remove('active');
});

