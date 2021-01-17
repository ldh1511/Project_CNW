let menu = document.querySelector('.right-box-bars i');
let content = document.querySelector('.content-right');
let right_title=document.querySelector('.right-box-title');
let right_menu=document.querySelector('.right-menu');

let iconleft=document.querySelector('.nav-icon-left');
let iconright=document.querySelector('.nav-icon-right');
let iconleftclose=document.querySelector('.nav-icon-close');
let menuLeft=document.querySelector('.content-left');
let menuRight=document.querySelector('.menu-right-box');
iconright.addEventListener('click',(e)=>{
    menuRight.classList.toggle('menu-right-active');
	menuRight.classList.toggle('active');
	let right_menu=document.querySelector('.right-menu');
	let right_title=document.querySelector('.right-box-title');
	right_menu.classList.toggle('menu-active');
	right_title.classList.toggle('hidden');
})
iconleft.addEventListener('click',(e)=>{
    menuLeft.classList.add('menu-left-active');
})
iconleftclose.addEventListener('click',(e)=>{
    menuLeft.classList.remove('menu-left-active');
})
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

