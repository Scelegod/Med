let modalCancelRec = document.querySelector('.modalCancelRec') ;

window.addEventListener('click', function(e){
    if(e.target.closest('.record__contact__btn')){
        console.log(e.target.closest('.record__contact__btn').parentElement.querySelector('.evCont__record__post__recId').textContent);
        let cancelRecInp = document.querySelector('.cancelRecInp');
        cancelRecInp.value = e.target.closest('.record__contact__btn').parentElement.querySelector('.evCont__record__post__recId').textContent;
        console.log(cancelRecInp.value);
        modalCancelRec.classList.add('active');
        substrate.classList.add('active');
    }
    if(e.target.closest('.modalCancelRec__btn__content')){
        modalCancelRec.classList.remove('active');
        substrate.classList.remove('active');
    }; 
});