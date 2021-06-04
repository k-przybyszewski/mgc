(function($) {

    $.fn.myDragAndDrop = function(draggableElement, inputTopElement, inputLeftElement) {

        var mainElement = $(this).find(draggableElement);
        $(mainElement).addClass('drag-and-drop-block').draggable({
            stop : function(event, ui) {
                if (inputTopElement != null && inputLeftElement != null) {
                    $(inputTopElement).val($(this).css('top'));
                    $(inputLeftElement).val($(this).css('left'));
                    console.log($(this).position());
                }
            }
        });

        return $(this);

    }

})(jQuery);