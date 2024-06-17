// let previousMonth = document.querySelector(".previousMonth");
let monthText = document.querySelector(".monthText");
let yearText = document.querySelector(".yearText");
// let nextMonth = document.querySelector(".nextMonth");
let days = document.querySelector("#days");

let nowDate = new Date();
let nowDay = nowDate.getDate();
let nowMonth = nowDate.getMonth();
let nowYear = nowDate.getFullYear();
let monthName = [
  "Январь",
  "Февраль",
  "Март",
  "Апрель",
  "Май",
  "Июнь",
  "Июль",
  "Август",
  "Сентябрь",
  "Октябрь",
  "Ноябрь",
  "Декабрь",
];

let curDate = nowDate.setMonth(nowDate.getMonth() - 1);
let dataNow = new Date(nowYear, nowMonth + 1, nowDay);

function setMonthCalendar(year, month) {
  let lastDayMonth = new Date(year, month + 1, 0).getDate();
  let lastDayPreviousMonth = new Date(year, month, 0).getDay();
  let monthDaysText = "";

  monthText.textContent = monthName[month];
  days.innerHTML = "";

  if (lastDayPreviousMonth > 0) {
    for (let i = 1; i <= lastDayPreviousMonth; i++) {
      monthDaysText += "<li></li>";
    }
  }
  for (let i = 1; i <= lastDayMonth; i++) {
    monthDaysText += `<li data-dateid="${nowYear}.${nowMonth + 1}.${addZero(i)}">` + i + `</li>`;
  }

  days.innerHTML = monthDaysText;

  if (month == nowMonth && year == nowYear) {
    let li = days.getElementsByTagName("li");
    li[lastDayPreviousMonth + nowDay - 1].classList.add("day");
    let dataNow2 = new Date(nowYear, nowMonth, 0);
    for(let elem of li){
      let dayoff = new Date(elem.dataset.dateid).getDay();
      if(((dataNow.getFullYear()+'.'+dataNow.getMonth()+'.'+addZero(dataNow.getDate())) > elem.dataset.dateid) || dayoff == '0' || dayoff == '6' || elem.textContent == ''){
        elem.classList.add("date-now");
        if(elem.textContent == ''){
          elem.classList.remove('date-now');
          
        }
        
      }else{
        elem.classList.add("date-rec");
      }
    }
  }
}
function addZero(num) {
	if (num >= 0 && num <= 9) {
		return '0' + num;
	} else {
		return num;
	}
}
setMonthCalendar(nowYear, nowMonth);


let textarea = document.querySelector('.description__problems__textarea');
let modalRecord__btn = document.querySelector('.modalRecord__btn');
modalRecord__btn.addEventListener('click', function(){
  let modalSucces = document.querySelector('.modalSucces');
  modalSucces.classList.add('active');
  substrate.classList.add('active');
});
if(textarea.value.length == 0){
  modalRecord__btn.setAttribute('disabled', 'disabled');
}
textarea.addEventListener('change', function(){
  if(textarea.value.length == 0){
    modalRecord__btn.setAttribute('disabled', 'disabled');
  }else{
    modalRecord__btn.removeAttribute('disabled', 'disabled');
  }
  
});

let time__tab2 = document.querySelectorAll('.time__tab2');
window.addEventListener('click', function(e){
  if(e.target.closest('.doctors__btn')){
    if(document.querySelector('.main__info').childNodes[1] == document.querySelector('.main__info__user__btn')){

    }else{


      let modalRegDay = document.querySelector('.modalRegDay');
      let modalRegTime = document.querySelector('.modalRegTime');
      let modalRegIdDoc = document.querySelector('.modalRegIdDoc');
      let modalRegContact = document.querySelector('.modalRegContact');
      modalRegIdDoc.value = e.target.closest('.doctors__btn').parentElement.dataset.persid;
      modalRegContact.value = document.querySelector('.item__title.active').textContent;
      // console.log(e.target.closest('.doctors__btn').parentElement.dataset.persid);
      if(e.target.closest('.doctors__btn').parentElement.dataset.persid == time__tab2[e.target.closest('.doctors__btn').parentElement.dataset.persid - 1].dataset.persid){
        let docNameRec = document.querySelector('.doctor__nameRec');
        let docPostRec = document.querySelector('.doctor__post__text');
        let docMedRec = document.querySelector('.doctor__med__text');
        let patientName = document.querySelector('.patient__name');
        let patientSnils = document.querySelector('.patient__snils');
      
        // console.log( e.target.closest('.doctors__btn').parentElement.querySelector('.doctors__name').textContent);
        docNameRec.textContent = e.target.closest('.doctors__btn').parentElement.querySelector('.doctors__name').textContent;
        docPostRec.textContent = e.target.closest('.doctors__btn').parentElement.querySelector('.doctors__post').textContent;
        docMedRec.textContent = e.target.closest('.doctors__btn').parentElement.querySelector('.doctors__med').textContent;
        patientName.textContent = document.querySelector('.main__info__user__name').textContent;
        patientSnils.textContent = document.querySelector('.main__info__user__snils').textContent;
        // console.log(time__tab2[e.target.closest('.doctors__btn').parentElement.dataset.persid - 1].dataset.persid);
        let data = time__tab2[e.target.closest('.doctors__btn').parentElement.dataset.persid - 1].dataset.persid;
        // console.log(data);
        time__tab2[e.target.closest('.doctors__btn').parentElement.dataset.persid - 1].classList.remove('dispnone');
        document.querySelector('.close__modalRecord').setAttribute('data-persid', e.target.closest('.doctors__btn').parentElement.dataset.persid);
        let blockCal = document.querySelector('.modalRecord__content__row.left');
        let date_rec = blockCal.querySelectorAll('#days .date-rec');
      
        let time_active = blockCal.querySelectorAll('.time__rec');
        time_active[0].classList.add('active');
        // time__tab[0].classList.add('active');
        let bubs = blockCal.querySelectorAll('.time__tab2[data-persid="'+ data +'"] .time__tab');
        bubs[0].classList.add('active');
        date_rec[0].classList.add('active');
        for(let i = 0; i < date_rec.length; i++){
          // console.log(date_rec[i]);
          modalRegDay.value = date_rec[0].textContent;
          date_rec[i].addEventListener('click', function(e){
            modalRegDay.value =nowYear +'-'+addZero(+nowMonth + 1) +'-'+ date_rec[i].textContent;
            // modalRegDay.value = date_rec[i].dataset.dateid;
            // console.log(modalRegDay.value);
            let date_rec__active = blockCal.querySelector('#days .active');
            date_rec__active.classList.remove('active');
            // console.log(blockCal.querySelector('.time__tab2[data-persid="'+ data +'"] .time__tab.active'));
            let activeTab = blockCal.querySelector('.time__tab2[data-persid="'+ data +'"] .time__tab.active');
            activeTab.classList.remove('active');
            
            bubs[i].classList.add('active');
            this.classList.add('active');
            // console.log(date_rec[i].textContent);
            
          });
          let time = blockCal.querySelectorAll('.time__tab2[data-persid="'+ data +'"] .time__tab[data-dateday="'+ date_rec[i].textContent +'"] .time__rec');
          // console.log(time)
        
            time[0].classList.add('active');
            modalRegTime.value = time[0].textContent;
            
            for(let j = 0; j < time.length; j++){
              // console.log(time[j]);
              if(time[j].textContent == ""){
                time[j].remove();
                // time[j].setAttribute('class','dispnone');
              }
              time[j].addEventListener('click', function(){
                let timeParent = blockCal.querySelector('.time__tab2[data-persid="'+ data +'"] .time__tab[data-dateday="'+ date_rec[i].textContent +'"] .time__rec.active');
                // console.log(timeParent)
                if(!time[j].classList.contains('date-now')){
                  timeParent.classList.remove('active');
                  time[j].classList.add('active');
                }
                modalRegTime.value = time[j].textContent;
                
              });
            }
          // }
          
        }
          
          
        }else{
        
        
      }
  }
  }
  if(e.target.closest('.close__modalRecord')){
    let modalRecord = document.querySelector('.modalRecord'); //блоки записей к врачам
    if(e.target.closest('.close__modalRecord').dataset.persid == time__tab2[e.target.closest('.close__modalRecord').dataset.persid - 1].dataset.persid){
        console.log(e.target.closest('.close__modalRecord').parentElement.parentElement.childNodes[1]);
        let blockCal = document.querySelector('.modalRecord__content__row.left');
        // console.log(document.querySelector('.time__tab2').dataset.persid);
        time__tab2[e.target.closest('.close__modalRecord').dataset.persid - 1].classList.add('dispnone');
        // blockCal.querySelector('.time__tab2[data-persid="'+ document.querySelector('.close__modalRecord').dataset.persid +'"] .time__tab.active').classList.remove('active');
        blockCal.querySelector('#days .active').classList.remove('active');
      }
      modalRecord.classList.remove('active');
      substrate.classList.remove('active');
  }
});

// console.log(date_rec);
  // date_rec[0].classList.add('active');
// }
