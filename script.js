let menu = document.querySelector('.right-box-bars i');
let content = document.querySelector('.content-right');
let right_title=document.querySelector('.right-box-title');
let right_menu=document.querySelector('.right-menu');
console.log(menu);
menu.addEventListener('click', (e) => {
    let ele = e.target;
    if (ele.classList.contains('fa-bars')) {
        content.classList.add('content-right-active');
        ele.classList.remove('fa-bars');
        ele.classList.add('fa-times');
        right_title.classList.add('hidden');
        right_menu.classList.add('menu-active');
        ele.parentElement.classList.add('bars-active');
        ele.parentElement.parentElement.classList.add('active');
        setTimeout(function(){
            ele.parentElement.classList.remove('bars-active2');
            ele.parentElement.parentElement.classList.remove('active2');
            content.classList.remove('content-right-active2');
        },1)
        
    }
    else{
        content.classList.add('content-right-active2');
        ele.classList.add('fa-bars');
        ele.classList.remove('fa-times');
        right_title.classList.remove('hidden');
        right_menu.classList.remove('menu-active');
        ele.parentElement.classList.add('bars-active2');
        ele.parentElement.parentElement.classList.add('active2');
        setTimeout(function(){
            ele.parentElement.classList.remove('bars-active');
            ele.parentElement.parentElement.classList.remove('active');
            content.classList.remove('content-right-active');
        },1)
    }

})