var div=document.querySelectorAll('.edu-element');
let iconLeft=document.querySelector('.menu-icon-left');
let iconLeftClose=document.querySelector('.info-icon-menu');
let iconRight=document.querySelector('.menu-icon-right');
let menuLeft=document.querySelector('.content-left');
let menuRight=document.querySelector('.menu-right-box');
let menu = document.querySelector('.right-box-bars i');
let content = document.querySelector('.content-right');
let right_title=document.querySelector('.right-box-title');
let right_menu=document.querySelector('.right-menu');
console.log(menuRight);
function Check(el){
    var x=el.getBoundingClientRect();
	return(
		x.top>=0 && x.left>=0 && x.bottom <=(window.innerHeight||document.documentElement.clientHeight) && x.right<=(window.innerWidth || document.documentElement.clientWidth)
    )
}
function callBackfunc(){
	for (var i = 0; i < div.length; i++) {
		if(Check(div[i])){
			div[i].classList.add("in-view");
        }
	}
}
window.addEventListener('load',callBackfunc);
window.addEventListener('scroll',callBackfunc);

iconLeft.addEventListener('click',(e)=>{
	menuLeft.classList.add('menu-left-active');
})
iconLeftClose.addEventListener('click',(e)=>{
	menuLeft.classList.remove('menu-left-active');
})
iconRight.addEventListener('click',(e)=>{
	menuRight.classList.toggle('menu-right-active');
	menuRight.classList.toggle('active');
	let right_menu=document.querySelector('.right-menu');
	let right_title=document.querySelector('.right-box-title');
	right_menu.classList.toggle('menu-active');
	right_title.classList.toggle('hidden');
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
