if( typeof console == 'undefined' ) console = { log : function(){} };

$(document).ready(function(){
    
var ADMIN    = '^/admin/';

var App = {
// ROUTING
    routes : [
        {
            route : [
               '.'
            ],
            handler : 'enhancements'
        },
        
        {
        	route : [
        	   ADMIN + 'dedicated-servers/new',
        	   ADMIN + 'dedicated-servers/edit/[0-9]'
        	],
        	handler: 'dedicatedServer'
        },
        
        {
        	route : [
        	   ADMIN + 'game/new',
        	   ADMIN + 'game/edit/[0-9]'
        	],
        	handler: 'game'
        },
        
        {
            route : [
               ADMIN + 'promo/edit/[0-9]'
            ],
            handler: 'promoEdit'
        },
        
        {
            route : [
               ADMIN + 'page/new',
               ADMIN + 'page/edit/[0-9]'
            ],
            handler: 'page'
        },
        
        {
            route : [
               ADMIN + 'page/list'
            ],
            handler: 'pageList'
        }
    ],

    handlers : {
    	enhancements : function() {
    		var _self = this;
    		_self.navi();
    		_self.chosen();
    		_self.datepicker();
    		_self.tinymce();
    	},
    	
    	game : function() {
    		var collection = $('.slot-price-holder');
    		var index = $('.slot-price-holder .price-input').length;
    		
    		collection.data('index', index);
    		
    		$('.new-price').click(function(e) {
    			var index = collection.data('index');
    			var prototype = collection.data('prototype');
    			
    			$('#no-slot-price').hide();
    			
    			var newForm = prototype.replace(/__name__/g, index);
    			collection.data('index', index + 1).append(newForm);
    			App.handlers.chosen();
    			
    			e.preventDefault();
    		});
    		
    		$('.slot-price-holder').delegate('.remove-slot-price', 'click', function(e) {
    		    var index = collection.data('index');
    		    
    			$(this).parent().remove();
    			collection.data('index', index - 1);
    			
    			if(index == 1) {
    			    $('#no-slot-price').show();
    			}
    			
    			e.preventDefault();
    		});
    		
    		
    		var banner = function() {
    			if($('#game_isPopular').is(':checked'))
    			{
    				$('.banner-row').removeClass('hidden');
    			} else {
    				$('.banner-row').addClass('hidden');
    			}
    		}
    		
    		$('#game_isPopular').click(function() {
    			banner();
    		});
    		
    		banner();
    	},
    	
    	dedicatedServer : function() {
    	    $('.server').mouseenter(function() {
    	        var pos = $(this).position();
    	        $(this).next().css('top', pos.top+20).css('left', pos.left+10).fadeIn();
    	    });
    	    
    	    $('.server').mouseleave(function() {
    	        $(this).next().hide();
    	    });
    	    
    	    $('.land').click(function() {
    	    	if(!$(this).hasClass('server')) {
	    	    	$('.map div.new-server').removeClass('server new-server');
	    	    	$(this).addClass('new-server');
	    	    	
	    	    	var cords = $(this).attr('id').split('-');
	    	    	$('#server_x').val(cords[1]);
	    	    	$('#server_y').val(cords[0]);
    	    	} else {
    	    		alert($(this).attr('data-alert'));
    	    	}
    	    });
    	    
    	    if($('#server_x').val() != '' && $('#server_y').val() != '') {
    	    	$('#' + $('#server_y').val() + '-' + $('#server_x').val()).addClass('new-server');
    	    }
    	},
    	
		navi : function() {
			$("div#mws-navigation ul li a, div#mws-navigation ul li span")
			.bind('click', function(event) {
				if($(this).next('ul').size() !== 0) {
					$(this).next('ul').slideToggle('fast', function() {
						$(this).toggleClass('closed');
					});
					event.preventDefault();
				}
			});

			$('li.'+routeName).addClass('active');
			if($('li.'+routeName).find('ul').size() !== 0){
				$('li.'+routeName).find('ul').removeClass('closed');
			}
		},
		
		chosen : function() {
			$('.chosen-select').chosen();
		},
		
		datepicker : function() {
			$(".mws-datepicker").datepicker({showOtherMonths:true});
			
			$(".mws-datepicker-wk").datepicker({showOtherMonths:true, showWeek:true});
			
			$(".mws-datepicker-mm").datepicker({showOtherMonths:true, numberOfMonths:3});
			
			$(".mws-dtpicker").datetimepicker({
		        showSecond: false,
		        timeFormat: 'hh:mm',
		        dateFormat: 'yy-mm-dd'
			});
			
			$(".mws-tpicker").timepicker({});
		},
		
		tinymce : function() {
			tinymce.init({
				selector:'textarea.tinymce',
				plugins: "image link",
				toolbar: "undo redo | styleselect | fontselect | fontsizeselect | bold | italic | alignleft | aligncenter | alignright | alignjustify | bullist | numlist | outdent | indent | link | image",
//				toolbar: "undo redo | sizeselect | bold italic | fontselect |  fontsizeselect",
				theme_advanced_font_sizes: "10px,12px,13px,14px,16px,18px,20px",
			    font_size_style_values: "12px,13px,14px,16px,18px,20px",
			});
		},
        
        promoEdit : function() {
            $('.promo li').myDragAndDrop('.slotsCounter', '#promo_positionCounterTop', '#promo_positionCounterLeft').myDragAndDrop('.bottomText', '#promo_positionTextTop', '#promo_positionTextLeft');
        },
        
        page : function() {
        	var change = function() {
                if($('#page_position').val() == 'footer') {
                    $('.page-category').show();
                } else {
                    $('.page-category').hide();
                }
            }
        	
            $('#page_position').change(function() {
                change();
            });
            
            change();
            
    		var linked = function() {
    			if($('#page_linked').is(':checked'))
    			{
    				$('.link-name-row').removeClass('hidden');
    			} else {
    				$('.link-name-row').addClass('hidden');
    			}
    		}
    		
    		$('#page_linked').click(function() {
    			linked();
    		});
    		
    		linked();
        },
        pageList : function() {
    		$('.view').click(function (e) {
    			e.preventDefault();
    			
    			var url = $(this).attr('href');
    	        var windowName = $(this).attr('id');
    	        window.open(url, windowName, 'height=' + screen.height + ',width=' + screen.width);
    		});
        }
    }
};


var path = location.pathname.split('/');

if( path[1] == 'app_dev.php' ) path.splice(1,1);
path = path.join('/');

for( var i = 0; i <= App.routes.length - 1; i++ ) {
    for( var n = 0; n <= App.routes[i].route.length - 1; n++ ) { 
      var route = App.routes[i].route[n];
      if( (RegExp( route )).test( path ) ) {
        var handler = App.routes[i].handler;
        App.handlers[ handler ] && App.handlers[ handler ]();
        console.log('excecutig: ', route, App.routes[i].handler );
      }
    }
} 

});