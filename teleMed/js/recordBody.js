let record__body__block = document.querySelector('.record__body__block');

let main = document.querySelector('.main');
if(main.children.length == 5){
    let table = document.querySelector('.record__body__block table tbody');
    if(table.children.length > 1){
        tdProblems = document.querySelectorAll('.td__problems');
        for(let elem of tdProblems){
            elem.addEventListener('click', function func(){
                let inputProblems = document.createElement('input');
		        inputProblems.value = elem.textContent;
                
                elem.style.background = '#1787d5';
                elem.style.color = 'white';
		        elem.textContent = '';
		        elem.appendChild(inputProblems);
                
                let btn = document.createElement('button');
                let recId = elem.parentElement.parentElement.parentElement.parentElement.querySelector('.recId');
                let probCodeRec = elem.parentElement.parentElement.parentElement.parentElement.querySelector('.probCodeRec');
                
		        inputProblems.addEventListener('blur', function() {
                    console.log(elem.parentElement.childNodes[5].textContent);
                    elem.textContent = inputProblems.value;
                    btn.textContent = 'Изменить';
                    btn.setAttribute('class','btn__problems');
                    btn.setAttribute('type','submit');
                    elem.parentElement.parentElement.parentElement.parentElement.childNodes[0].appendChild(btn);
                    console.log(elem.parentElement.childNodes[3].textContent);
		        	elem.addEventListener('click', func);
                    elem.style.background = 'none';
                    elem.style.color = 'black';
		        });
                btn.addEventListener('click', function(){
                    recId.value = elem.parentElement.childNodes[8].textContent;
                    probCodeRec.value = elem.parentElement.childNodes[5].textContent;

                });
		        elem.removeEventListener('click', func);
            });

        }

    }

}
