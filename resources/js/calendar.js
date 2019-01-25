
window.onload = function () {
  $('[data-toggle="popover"]').popover()
    // var events = [
    //     {
    //         title : 'Bonne année',
    //         start : '2019-01-01',
    //         end   : '2019-01-01',
    //         description : 'Bienvenue en 2019'
    //     }
    // ];

    
    $("#calendar").fullCalendar({
        locale : 'fr',
        header : {
            left:   'title',
            center: 'addEventButton',
            right:  'today prev,next'
        },
        events : events,

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
                        console.log(document.getElementById('title').value);
                        axios.post('/calendar/event/create',{
                            title       : document.getElementById('title').value,
                            description : document.getElementById('description').value,
                            start       : document.getElementById('date_start').value,
                            end         : document.getElementById('date_end').value,
                            user_id     : document.getElementById('user_id').value
                        }).then(function (response) {
                        // handle success
                        console.log(response);
                        }).catch(function (error) {
                        // handle error
                        console.log(error);
                        }).then(function () {
                        // always executed
                        });
                    });
                }
            }
        },
    });
}