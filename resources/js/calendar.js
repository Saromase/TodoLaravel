window.onload = function () {
  $('[data-toggle="popover"]').popover()

    $("#calendar").fullCalendar({
        locale : 'fr',
        header : {
            left:   'title',
            center: 'addEventButton',
            right:  'today prev,next'
        },
        events : [
            {
                title : 'Bonne année',
                start : '2019-01-01',
                description : 'Bienvenue en 2019'
            }
        ],

        eventRender: function(eventObj, element) {
            element.popover({
              title: eventObj.title,
              content: eventObj.description,
              trigger: 'click',
              placement: 'top',
              container: 'body'
            });
        },

        customButtons : {
            addEventButton : {
                text  : 'Ajouter un événement',
                click : function () {
                    $("#exampleModal").modal();

                    $('#modal-accept').on('click', function (event) {
                        console.log(event);
                    });
                }
            }
        },
    });
}