//задний фон
let substrate = document.querySelector('.substrate');  
//окно входа
let modal = document.querySelector('.modal') ;
//окно регистрации
let modalreg = document.querySelector('.modalreg') ;
//кнопка на регистрацию
let modalExit = document.querySelector('.modalExit') ;
let reg = document.querySelector('#reg') ;
//rightbar
let rightbar = document.querySelector('.rightbar') ;
let modalRecord = document.querySelector('.modalRecord'); //блоки записей к врачам
window.addEventListener('click', function(e){
    if(e.target.closest('.close__modalRecord')){
        
    }
    if(e.target.closest('.main__info__user__btn')){
        substrate.classList.add('active');
        modal.classList.add('active');
    }
    if(e.target.closest('.close__modal')){
        modal.classList.remove('active');
        modalreg.classList.remove('active');
        modalRecord.classList.remove('active');
        substrate.classList.remove('active');
    }
    
    if(e.target.closest('#reg')){
        substrate.classList.add('active');
        modalreg.classList.add('active');
        modal.classList.remove('active');
    }
    
    if(e.target.closest('.cabinet__content__li.exit')){
        if(document.querySelector('.main__info').childElementCount != 1){
            substrate.classList.add('active');
            modalExit.classList.add('active');
        }else{

        }
    }

    if(e.target.closest('.modalExit__btn.modalExit__btn__content')){
        substrate.classList.remove('active');
        modalExit.classList.remove('active');
    }

    if(e.target.closest('.doctors__btn')){
        let user = document.querySelector('.main__info');
        // console.log(user.childElementCount);
        if(user.childElementCount == 1){
            substrate.classList.add('active');
            modal.classList.add('active');
        }else{
            modalRecord.classList.add('active');
            substrate.classList.add('active');
        }


    }
});


let event__content__future = document.querySelector('.event__content__future');
if(event__content__future.childNodes[1] == document.querySelector('.future__block')){
}else{
    document.querySelector('.future__block').style.display = "none";
    event__content__future.style.flexDirection = "column";
    event__content__future.style.alignItems = "normal";
    event__content__future.style.justifyContent = "normal";
    event__content__future.style.gap = "20px";
}

let event__content__close = document.querySelector('.event__content__close');
if(event__content__close.childNodes[1] == document.querySelector('.close__block')){
    
}else{
    document.querySelector('.close__block').style.display = "none";
    event__content__close.style.flexDirection = "column";
    event__content__close.style.alignItems = "normal";
    event__content__close.style.justifyContent = "normal";
    event__content__close.style.gap = "20px";
}

let event__content__current = document.querySelector('.event__content__current');
if(event__content__current.childNodes[1] == document.querySelector('.current__block')){
    
}else{
    document.querySelector('.current__block').style.display = "none";
    event__content__current.style.flexDirection = "column";
    event__content__current.style.alignItems = "normal";
    event__content__current.style.justifyContent = "normal";
    event__content__current.style.gap = "20px";
}
if(document.querySelector('.events__block').childNodes[3] == document.querySelector('.events__block__note')){

}else{
    document.querySelector('.events__block__note').style.display = "none";
}

const width2 = window.innerWidth;
if(width2 <= 768){
    document.querySelector('.leftbar').style.display = "none";
    document.querySelector('.leftbar').style.opacity = "0";
    document.querySelector('.main').style.marginLeft = "0";
}
window.addEventListener('resize', function() {
    const width = window.innerWidth;
    // console.log(width);
    if(width <= 768){
        document.querySelector('.leftbar').style.display = "none";
        document.querySelector('.main').style.marginLeft = "0";
    }
    if(width > 768){
        document.querySelector('.leftbar').style.display = "flex";
        document.querySelector('.leftbar').style.opacity = "1";
        document.querySelector('.main').style.marginLeft = "13em";
    }
    if(width >= 1440){
        document.querySelector('.main').style.marginLeft = "17em";
    }
  });

window.addEventListener('click', function(e){
    if(e.target.closest('.btn__leftbar') || e.target.closest('.btn__leftbar__line')){
        document.querySelector('.leftbar').style.opacity = "1";
        document.querySelector('.leftbar').style.display = "flex";
    }else{
        if(width2 <= 768){
            document.querySelector('.leftbar').style.display = "none";
        }
    }
});
