let date = new Date();
let oclock = date.getHours();
let oclock2 = date.getHours() + 2;
let minuts = date.getMinutes();
let seconds = date.getSeconds();
let day = date.getDate();
let month = date.getMonth() + 1;
let year = date.getFullYear();



function loadDoc() {
    let modalChatAct = document.querySelector('.modalChat.active');
    let sms = modalChatAct.querySelector('.modalChat__input');
    let idUs = modalChatAct.querySelector('.idUs__input').value;
    let doc = modalChatAct.querySelector('.doc__input').value;

    $.ajax({
        type: "POST",
        url: './php/loadFindingAuth.php',
        data: {
            "idUs" : idUs,
            "doc" : doc,
        }
    })
    .done(function( msg2 ) {
        $('.modalChat.active .modalChat__note').html(msg2);
        
        let message__time = document.querySelectorAll('.modalChat.active .modalChat__note .message__time');
        let arr = [];

        for(let elem of message__time){
            let dataArr = elem.dataset.times.split(/[: .]/);
            // console.log(dataArr);
            let milsec = new Date(+dataArr[5], +dataArr[4], +dataArr[3],+dataArr[0], +dataArr[1], +dataArr[2]);
            arr.push(elem);
            arr.sort((a,b) => new Date(a.dataset.times) - new Date(b.dataset.times));

            elem.setAttribute('data-times', milsec);
            elem.remove();
        }
        for(let elem of arr.sort((a,b) => new Date(a.dataset.times) - new Date(b.dataset.times))){
            modalChat__note.appendChild(elem);
        }

    });
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        modalChatAct.getElementsByClassName('.modalChat__note').innerHTML = this.responseText;
      }
    };
    xhttp.open("POST", "./php/loadFindingAuth.php", true);
    xhttp.send();

  }
function send2(){
    let modalChatAct = document.querySelector('.modalChat.active');
    let sms = modalChatAct.querySelector('.modalChat__input').value;
    let idUs = modalChatAct.querySelector('.idUs__input').value;
    let doc = modalChatAct.querySelector('.doc__input').value;
    let today = modalChatAct.querySelector('.today__input').value;
    let nowTime = modalChatAct.querySelector('.nowTime__input').value;
    let modalChat__note = document.querySelector('.modalChat.active .modalChat__note');
            
    $.ajax({
        type: "POST",
        url: './php/messageTest.php',
        data: {
            "idUs" : idUs,
            "doc" : doc,
            "sms" : sms,
            "today" : today,
            "nowTime" : nowTime,
        }
    })
    .done(function( msg ) {
        sms = "";

    });
}
function send3(){
    let modalChatAct = document.querySelector('.modalChat.active');
    let sms = modalChatAct.querySelector('.modalChat__input').value;
    let idUs = modalChatAct.querySelector('.idUs__input').value;
    let doc = modalChatAct.querySelector('.doc__input').value;
    let today = modalChatAct.querySelector('.today__input').value;
    let nowTime = modalChatAct.querySelector('.nowTime__input').value;
    
    $.ajax({
        type: "POST",
        url: './php/messageTest2.php',
        data: {
            "idUs" : idUs,
            "doc" : doc,
            "sms" : sms,
            "today" : today,
            "nowTime" : nowTime,
        }
    })
    .done(function( msg ) {
        sms = "";
    });
}

let timer;
let modalChat = document.querySelectorAll('.modalChat');
let score = false;
let block__record__content = document.querySelectorAll('.block__record__content');
for(let i = 0; i< block__record__content.length; i++){
        block__record__content[i].addEventListener('click',function(){
            
        // if(block__record__content[i].querySelector('.record__fulldata .evCont__record__data').textContent == year+'-'+addZero(month)+'-'+addZero(day)/* && block__record__content[i].querySelector('.record__fulldata .evCont__record__time').textContent == oclock+':'+minuts && block__record__content[i].querySelector('.record__fulldata .evCont__record__time').textContent >= oclock2+':'+minuts */){
        modalChat[i].classList.add('active');
        substrate.classList.add('active');
        if(modalChat[i].classList.contains('active')){
            //   setInterval(refreshContent, 5000);
            timer = setInterval(function(){
                loadDoc();
                },1000);
            let modalChat__note = document.querySelector('.modalChat.active .modalChat__note');
            modalChat__note.scrollTo({
            top: document.body.scrollHeight,
            behavior: "smooth"
            });
                
            let message__time = document.querySelectorAll('.modalChat.active .modalChat__note .message__time');
            let arr = [];

            for(let elem of message__time){
                let dataArr = elem.dataset.times.split(/[: .]/);
                // console.log(dataArr);
                let milsec = new Date(+dataArr[5], +dataArr[4], +dataArr[3],+dataArr[0], +dataArr[1], +dataArr[2]);
                arr.push(elem);
                arr.sort((a,b) => new Date(a.dataset.times) - new Date(b.dataset.times));

                elem.setAttribute('data-times', milsec);
                elem.remove();
            }
            for(let elem of arr.sort((a,b) => new Date(a.dataset.times) - new Date(b.dataset.times))){
                modalChat__note.appendChild(elem);
            }
            
            
    

            // let formData = new FormData(document.querySelector('.modalChat__note'));
            let close__modalChat = document.querySelector('.modalChat.active .close__modalChat');
            close__modalChat.addEventListener('click',function(){
                modalChat[i].classList.remove('active');
                clearInterval(timer);       
                substrate.classList.remove('active');
            });
        }else{
        }
    // }/* else if() */

        let modalChat__note2 = document.querySelectorAll('.modalChat');
        for(let elem of modalChat__note2){
            if(!elem.classList.contains('active')){
                elem.childNodes[0].childNodes[1].setAttribute('id','chat');
                
                
            }else{
                elem.childNodes[0].childNodes[1].setAttribute('id','modalChat__note');
            }
            elem.childNodes[1].addEventListener('click', function(){
                elem.childNodes[0].childNodes[1].setAttribute('id','modalChat__note');
            })
            // console.log(elem.childNodes[1]);
        }    
    });
    
}
window.addEventListener('click', function(e){
    if(e.target.closest('.block__record__content')){
        if(document.querySelector('.modalChat.active')){

            if('14:00' < oclock+':'+minuts){
                // document.querySelector('.modalChat.active').querySelector('.modalChat__input').setAttribute('disabled','disabled');
                // document.querySelector('.modalChat.active').querySelector('.modalChat__btn').setAttribute('disabled','disabled');
            }
        }
    }
});


