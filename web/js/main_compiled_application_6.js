if( typeof console == 'undefined' ) console = { log : function(){} };

$(document).ready(function(){
    
var PORTAL    = '^/';

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
                PORTAL+'$',
            ],
            handler : 'homeEvents'
        },
        {
            route : [
                 PORTAL + 'game-servers/view(/[0-9]+)?$',
            ],
            handler: 'gameServers'
        },
    ],

    handlers : {
    	enhancements : function() {
    		var _self = this;
    		_self.buttons();
    		_self.corners();
    		_self.selects();
    		_self.others();
    	},
    	
    	homeEvents: function() {
    		var _self = this;
    		_self.promo();
    		
    	    $('.serverLocations a.open').click(function(e) {
    	        var time = 200;
    	        var link = $(this);
    	        
    	        if(!$('.serverLocations .clip').data('step')) {
    	            $('.serverLocations .headClip').addClass('oHidden');
    	            link.text(link.attr('data-closetext'));
    	            $('.serverLocations .head').animate({
    	                left: '-=680px'
    	            }, time);

    	            $('.serverLocations .map').animate({
    	                marginLeft: '-=682px'
    	            }, time, function() {
    	                $('.serverLocations .clip').data('step', true);
    	            });
    	        }
    	        else {
    	            link.text(link.attr('data-opentext'));
    	            
    	            $('.serverLocations .head').animate({
    	            	left: '+=680px'
    	            }, time);
    	            
    	            $('.serverLocations .map').animate({
    	                marginLeft: '+=682px'
    	            }, time, function() {
    	                $('.serverLocations .headClip').removeClass('oHidden');
    	                $('.serverLocations .clip').data('step', false);
    	            });
    	        }
    	        e.preventDefault();
    	    });
    	    
    	    var upTime = 70;
    	    $('.promoButtons .banner').mouseenter(function() {
    	        $(this).addClass('shadow');
    	        $(this).animate({
    	            marginTop: '-=10px'
    	        }, upTime);
    	    }).mouseleave(function () {
    	        var el = $(this);
    	        $(this).animate({
    	            marginTop: '+=10px'
    	        }, upTime, function() {
    	            el.removeClass('shadow');
    	        });
    	    });
    	    
    	    $('.server').mouseenter(function() {
    	        var pos = $(this).position();
    	        $(this).next().css('top', pos.top+20).css('left', pos.left+10).fadeIn();
    	    });
    	    
    	    $('.server').mouseleave(function() {
    	        $(this).next().hide();
    	    });
    	},

		buttons: function() {
			$('.button').mgcbutton();
		},
		
		corners: function() {
			$('ul.newsList .image').corner('bevel tl br 7px');
		    $('#siteHeader .userBox').corner("bevel tr cc:#0C101D");
		    $('.footer').corner('bevel bl br 8px');
		    $('.footerWrapper .bottom').corner('bevel tl tr 8px');
		    $('.gameBox').corner('bevel bl 10px');
		    $('.gameBox').corner('bevel tr 10px cc:#222641');
		    $('.games .gray-button').corner('bevel br tl 5px');
		},
		
		selects: function() {
			$(".currencyLanguageBox select, #sLocations").msDropDown();
		},
		
		promo: function() {
		    var promo = new Promo();
		    promo.startProgress();
		},
		
		others: function() {
			$('.leftBox').height($('.whiteWrapper').outerHeight());
			$('.languageSelect, .currencySelect').change(function() {
				window.location = $(this).val();
			});
			
			if($('.flash').is(':visible')) {
				setTimeout(function() {
					$('.flash').fadeOut('slow');
				}, 5000);
			}
		},
		
        gameServers : function() {
            $("#game_sort_sortBy").msDropDown();
            $('.content').delegate('#game_sort_sortBy', 'change', function() {
                $.ajax({
                    dataType: 'html',
                    type: 'post',
                    headers: {"cache-control": "no-cache"},//for iOS 6 problem
                    async: true,
                    data: {newSort: $(this).val()},
                    timeout: 30000,
                    success: function(data, textStatus, XMLHttpRequest) {
                        $('.content .games tbody').replaceWith($(data).find('tbody'));
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                    },
                    complete: function(XMLHttpRequest, textStatus) {
                    }
                });
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