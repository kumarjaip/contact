// JavaScript Document

/* clear form field */
function clickclear(thisfield, defaulttext) {
    if (thisfield.value === defaulttext) {
        thisfield.value = "";
    }
}
function clickrecall(thisfield, defaulttext) {
    if (thisfield.value === "") {
        thisfield.value = defaulttext;
    }
}

$(document).ready(function(){
    /* Collapse Expand Script Start */
    $(".content-primary h3").click(function(){  
        /*---------- when navigation already open ------------------*/      
        if($(this).next('.contentDesc').is(":visible")){
            $(this).next('.contentDesc').slideUp(500);
            $('.collapes').addClass('expand').removeClass('collapes');
            $('span.color2',this).addClass('color4').removeClass('color2');
        }
        else{
            /*---------- when navigation close ------------------*/
            $(".contentDesc").slideUp(500);
            $(this).next('.contentDesc').slideDown(500);
            // $(this).addClass('active');
            $('.collapes').addClass('expand').removeClass('collapes');
            $('.expand', this).addClass('collapes').removeClass('expand');
            $('span.color4',this).addClass('color2').removeClass('color4');
        }
    });							   					   
});