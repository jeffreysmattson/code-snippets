/* This reduces the number of 'on resize' events to a reasonable level */
var resizeId;
$(window).resize(function() {
    clearTimeout(resizeId);
    resizeId = setTimeout(doneResizing, 250);
});

function doneResizing(){
  /* Execute code here */
}
