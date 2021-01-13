let admin_bars=document.querySelector('.admin-bars');
let leftMenuAdmin=document.querySelector('.left-element-admin');
let iconClose=document.querySelector('.admin-bars-close');
admin_bars.addEventListener('click',(e)=>{
    leftMenuAdmin.classList.add('active-menu');
})
iconClose.addEventListener('click',(e)=>{
    leftMenuAdmin.classList.remove('active-menu');
})