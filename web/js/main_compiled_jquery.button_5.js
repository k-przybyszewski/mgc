(function($){

	//Attach this new method to jQuery
 	$.fn.extend({ 
 		
 		//This is where you write your plugin's name
 		mgcbutton: function() {

			//Iterate over the current set of matched elements
    		return this.each(function() {
                    $(this).wrap("<div class=\"buttonWrapper\"></div>");
                    $(this).before("<div class=\"side left\"></div>");
                    $(this).after("<div class=\"side right\"></div>");
    		});
    	}
	});
	
})(jQuery);
