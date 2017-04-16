$(document).ready(function(){
  $('.dropdown-submenu a.test').on({
		  "mouseover": function(e){
			  $(this).parent().siblings().children('ul').hide();
			  $(this).next('ul').show();
			  e.stopPropagation();
			  e.preventDefault();
		  }
  	});
});