(function($){

    $(document).ready(function() {
        Fancybox.bind("[data-fancybox]", {
            groupAttr: 'data-fancy-group',
        });
    });   

})(jQuery);


// document.addEventListener('DOMContentLoaded', function() {
//     var calendarEl = document.getElementById('calendar');
//     var calendar = new FullCalendar.Calendar(calendarEl, {
//         initialView: 'dayGridMonth'
//     });
//     calendar.render();
// });