let recBlockPers = document.querySelectorAll('.recBlockPers');

window.addEventListener('click', function(e){
    if(e.target.closest('.doctors__btn')){        
        for(let i = 0; i < recBlockPers.length; i++){
            if(document.querySelector('.modalRecord.active .close__modalRecord').dataset.persid == recBlockPers[i].dataset.persid){
                let dayRec = delZero(recBlockPers[i].querySelector('.recBlockData').textContent.split(/[-]/)[2]);
                let timeTabPers = document.querySelector('.time__tab2[data-persid="'+ recBlockPers[i].dataset.persid +'"]');
                if(timeTabPers.querySelector('.time__tab[data-dateday="'+ dayRec +'"]').dataset.dateday == dayRec){
                    let dayRec2 = timeTabPers.querySelector('.time__tab[data-dateday="'+ dayRec +'"]');
                    let data = recBlockPers[i].querySelector('.recBlockData').textContent.split(/[-]/)[0]+'-'
                    +delZero(recBlockPers[i].querySelector('.recBlockData').textContent.split(/[-]/)[1])+'-'
                    +delZero(recBlockPers[i].querySelector('.recBlockData').textContent.split(/[-]/)[2]);
                    for(let elem of dayRec2.querySelectorAll('.time__rec[data-dataantime="'+data +'"]')){
                        if(elem.textContent == recBlockPers[i].querySelector('.recBlockTime').textContent){
                            elem.classList.add('date-now');
                        }
                    }
                }
            }
        }

    }
});

function delZero(num) {
	if (+num >= 0 && +num <= 9) {
		return +num.split(/0/)[1];
	} else {
		return +num;
	}
}