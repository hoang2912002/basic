var btnOpen = document.querySelector('.sign_up');
var modal = document.querySelector('.modal');
var icon_close = document.querySelector('.modal_header span');
function Nhan(e){
    console.log(e.target);
    modal.classList.toggle('hiden')
}
btnOpen.addEventListener('click',Nhan);
modal.addEventListener('click',Nhan);
icon_close.addEventListener('click',function(e)
{
    if(e.target == e.currentTarget){
        Nhan();
    }
})
modal.addEventListener('click',function(e){
    if(e.target==e.currentTarget){
        Nhan();
    }
})

