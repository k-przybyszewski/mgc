function Promo() {
    this.progress = $('.progress');
    this.promoList = $('ul.promo');
    this.slides = parseInt($('ul.promo li').length, 10);
    this.counter = 1;
}

Promo.prototype.startProgress = function() {
    this.progress.width('0px');
    
    var promotions = this;

    promotions.progress.animate({
        width: 956
    }, 15000, function() {
        if(promotions.counter == promotions.slides) {
            $('ul.promo li:last-child').fadeOut('fast', function() {
                $('ul.promo li').fadeIn();
            });
            promotions.counter = 1;
            promotions.startProgress();
        }
        else {
            promotions.nextPromo();
        }
    });
}

Promo.prototype.nextPromo = function() {
    var promotions = this;
    $('ul.promo li:nth-child('+promotions.counter+')').fadeOut('fast', function() {
        $('ul.promo li:nth-child('+promotions.counter+1+')').fadeIn();
    });
    
    promotions.counter++;
 
    promotions.startProgress();
}
