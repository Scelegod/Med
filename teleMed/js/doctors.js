let doctors = document.querySelector('.doctors');
let blocks = doctors.querySelectorAll('.sdsad');
console.log(blocks)
let optionSelect = document.querySelector('.post__option');
console.log(optionSelect.textContent);

// if(op)
let doctorsBlock = document.querySelectorAll('.doctors__active');
let selectionPostInp = document.querySelector('.selection__post__inp');
console.log(doctorsBlock)
for (let elem of doctorsBlock){
    let doctorsPost = elem.querySelectorAll('.block__info .doctors__block__info .doctors__post');
    // console.log(doctorsPost.value)
    for(let elem2 of doctorsPost){
        console.log(elem2.textContent);
        selectionPostInp.addEventListener('change', function(){
            console.log(selectionPostInp.value);
            if(selectionPostInp.value != elem2.textContent){
                elem.classList.remove('doctors__active')
            }
        });
        
    }
}