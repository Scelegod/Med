let form = document.querySelector('.check__form');
let inp__fio = form.querySelector('.inp__fio');
let inp__snils = form.querySelector('.inp__snils');
let inp__phone = form.querySelector('.inp__phone');
let inp__email = form.querySelector('.inp__email');
let inp__pass = form.querySelector('.inp__pass');
let inp__passConf = form.querySelector('.inp__passConf');
let modalregAct = document.querySelector('.modalreg.active');

$(function() {
    $('form').submit(function(e) {
      var $form = $(this);
      let fio = inp__fio.value;
        let snils = inp__snils.value;
        let phone = inp__phone.value;
        let email = inp__email.value;
        let pass = inp__pass.value;
        let passConf = inp__passConf.value;
        if (!fio || !snils || !phone || !email || !pass || !passConf) {
            // alert('Пожалуйста, заполните все поля');
            return;
        }
        if(!isValidFio(fio)){
            alert('Неверно заполнена поле ФИО');
            return;
        }
        if(!isValidSnils(snils)){
            alert('Неверный снилс');
            return;
        }
        if(!isValidNumber(phone)){
            alert('Неверный Номер');
            return;
        }
        if(!isValidEmail(email)){
            alert('Неверная почта');
            return;
        }
        if(!isValidPass(pass)){
            alert('Неверный пароль \n Пароль должен состоять из: \nМинимум одной заглавной буквы \nМинимум одной строчной буквы \nМинимум из одной цифры');
            return;
        }
        if(pass != passConf){
            alert('Пароли не сопадают');
            return;
        }
        function isValidSnils(snils) {
            // Проверка имени регулярным выражением
            const pattern = /\d{3}-{1}\d{3}-{1}\d{3}\s{1}\d{2}/g;
            return pattern.test(snils);
        }
        function isValidNumber(phone) {
            // Проверка имени регулярным выражением
            const pattern = /7\d{10}/g;
            return pattern.test(phone);
        }
        function isValidEmail(email) {
            // Проверка имени регулярным выражением
            const pattern = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
            return pattern.test(email);
        }
        function isValidPass(pass) {
            // Проверка имени регулярным выражением
            const pattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[a-zA-Z0-9]{8,20}$/;
            return pattern.test(pass);
        }
        function isValidFio(fio) {
            var fioA = fio.split(' ');
            if (fioA.length != 3) {
                    console.log('bubu');
                    return false;
            }
            for (var i = 0; i < fioA.length; i++) {
                if (/[^-А-ЯA-Z\x27а-яa-z]/.test(fioA[i])) {
                    return false;
                }
            }
            return true;
        }

      $.ajax({
        type: $form.attr('method'),
        url: './php/registration.php',
        data: $form.serialize()
      }).done(function() {
        console.log('success');
        
        location.reload(true);
        alert(fio +' '+ phone +' '+ email +' '+ snils +' '+ pass);
    }).fail(function() {
        console.log('fail');
        e.preventDefault(); 
      });
    });
  });