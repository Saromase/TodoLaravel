window.onload = function () {

    $("#calendar").fullCalendar({
        locale : 'fr',
        header : {
            left:   'title',
            center: '',
            right:  'today prev,next'
        },
        events : [
            {
                title : 'Bonne année',
                start : '2019-01-01',
            }
        ]
    });
}