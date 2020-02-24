$(document).ready(function(){               
               var current = 1;
  
  widget      = $(".steps");
  btnnext     = $("#next");
  btnback     = $("#prev"); 
  /*btnsubmit   = $(".submit");*/
 
  // Init buttons and UI
  widget.not(':eq(0)').hide();
  hideButtons(current);
  //setProgress(current);
 
  // Next button click action
  btnnext.click(function(){
    if(current < widget.length){       
                   widget.show();       
                   widget.not(':eq('+(current++)+')').hide();
         setProgress(current); 
         }    
               hideButtons(current);  
       })   
       // Back button click action  
       btnback.click(function(){    
                if(current > 1){
      current = current - 2;
      btnnext.trigger('click');
    }
    hideButtons(current);
  })  



// "myAwesomeDropzone" is the camelized version of the HTML element's ID
Dropzone.options.myAwesomeDropzone = {
  paramName: "file", // The name that will be used to transfer the file
  maxFilesize: 2, // MB
  accept: function(file, done) {
    if (file.name == "justinbieber.jpg") {
      done("Naha, you don't.");
    }
    else { done(); }
  }
};


            });
          

/*
// Change progress bar action
setProgress = function(currstep){
  var percent = parseFloat(100 / widget.length) * currstep;
  percent = percent.toFixed();
  $(".progress-bar")
        .css("width",percent+"%");
        /*.html(percent+"%");  
}
*/
// Hide buttons according to the current step
hideButtons = function(current){
  var limit = parseInt(widget.length); 

  $(".action").hide();

  if(current < limit) btnnext.show();  if(current > 1) btnback.show(); 
  if (current == limit) { btnnext.hide();/* btnsubmit.show();*/ }
  if(current == 1) {btnback.hide();}
}

$('.about_navs ul li').click(function(e) {
    var $this = $(this);
    $this.siblings().removeClass('abt_active').end().addClass('abt_active');
    e.preventDefault();
});
