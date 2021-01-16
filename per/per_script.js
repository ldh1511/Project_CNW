var div=document.querySelectorAll('.edu-element');
let iconLeft=document.querySelector('.menu-icon-left');
let iconLeftClose=document.querySelector('.info-icon-menu');
let iconRight=document.querySelector('.menu-icon-right');
let menuLeft=document.querySelector('.content-left');
let menuRight=document.querySelector('.menu-right-box');
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

