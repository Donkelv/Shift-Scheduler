    var one = '<?php echo $one ?>';
    var o_2 = '<?php echo $rowsh[2] ?>';
    var o_3 = '<?php echo $rowsh[3] ?>'; 
    var o_4 = '<?php echo $rowsh[4] ?>'; 
    var o_5 = '<?php echo $rowsh[5] ?>'; 
    var o_6= '<?php echo $rowsh[6] ?>'; 
    var o_7 = '<?php echo $rowsh[7] ?>'; 
    var o_8 = '<?php echo $rowsh[8] ?>'; 
    var o_9 = '<?php echo $rowsh[9] ?>'; 
    var o_10 = '<?php echo $rowsh[10] ?>'; 
    var o_11 = '<?php echo $rowsh[11] ?>'; 
    var o_12 = '<?php echo $rowsh[12] ?>'; 
    var o_13 = '<?php echo $rowsh[13] ?>'; 
    var o_14 = '<?php echo $rowsh[14] ?>'; 
    var o_15 = '<?php echo $rowsh[15] ?>'; 
    var o_16 = '<?php echo $rowsh[16] ?>'; 
    var o_17 = '<?php echo $rowsh[17] ?>'; 
    var o_18 = '<?php echo $rowsh[18] ?>'; 
    var o_19 = '<?php echo $rowsh[19] ?>'; 
    var o_20 = '<?php echo $rowsh[20] ?>'; 
    var o_21 = '<?php echo $rowsh[21] ?>'; 
    var o_22 = '<?php echo $rowsh[22] ?>'; 
    var o_23 = '<?php echo $rowsh[23] ?>'; 
    var o_24 = '<?php echo $rowsh[24] ?>'; 
    var o_25 = '<?php echo $rowsh[25] ?>'; 
    var o_26 = '<?php echo $rowsh[26] ?>'; 
    var o_27 = '<?php echo $rowsh[27] ?>'; 
    var o_28 = '<?php echo $rowsh[28] ?>'; 
    var o_29= '<?php echo $rowsh[29] ?>'; 
    var o_30 = '<?php echo $rowsh[30] ?>'; 
    var o_31 = '<?php echo $rowsh[31] ?>'; 
    
  $(function () {
    const monthsList = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()
    
    const monthIndex = monthsList.indexOf(month);
    console.log(monthIndex);
    console.log(m);
    console.log(month);

    showCalendar = (bool) => {
      if (bool) {
    $('#calendar').fullCalendar({
      header    : {
        left  : 'prev,next today',
        center: 'title',
        right : 'month,agendaWeek,agendaDay'
      },
      buttonText: {
        today: 'today',
        month: 'month',
        week : 'week',
        day  : 'day'
      },
      
      //Random default events
      events    : [
        {
          title          : one,
          start          : new Date(y, m, 1),
          allDay         : true,
          backgroundColor: '#0073b7', //green
          borderColor    : '#0073b7' //green
        },
        {
          title          : o_2,
          start          : new Date(y, m, 2),
          allDay         : true,
          backgroundColor: '#0073b7', //yellow
          borderColor    : '#0073b7' //yellow
        },
        {
          title          : o_3,
          start          : new Date(y, m, 3),
          allDay         : true,
          backgroundColor: '#0073b7', //yellow
          borderColor    : '#0073b7' //yellow
        },
        {
          title          : o_4,
          start          : new Date(y, m, 4),
          allDay         : true,
          backgroundColor: '#0073b7', //yellow
          borderColor    : '#0073b7' //yellow
        },
        {
          title          : o_5,
          start          : new Date(y, m, 5),
          allDay         : true,
          backgroundColor: '#0073b7', //yellow
          borderColor    : '#0073b7' //yellow
        },
        {
          title          : o_6,
          start          : new Date(y, m, 6),
          allDay         : true,
          backgroundColor: '#0073b7', //yellow
          borderColor    : '#0073b7' //yellow
        },
        {
          title          : o_7,
          start          : new Date(y, m, 7),
          allDay         : true,
          backgroundColor: '#0073b7', //yellow
          borderColor    : '#0073b7' //yellow
        },
        {
          title          : o_8,
          start          : new Date(y, m, 8),
          allDay         : true,
          backgroundColor: '#0073b7', //yellow
          borderColor    : '#0073b7' //yellow
        },
        {
          title          : o_9,
          start          : new Date(y, m, 9),
          allDay         : true,
          backgroundColor: '#0073b7', //yellow
          borderColor    : '#0073b7' //yellow
        },
        {
          title          : o_10,
          start          : new Date(y, m, 10),
          allDay         : true,
          backgroundColor: '#0073b7', //yellow
          borderColor    : '#0073b7' //yellow
        },
        {
          title          : o_11,
          start          : new Date(y, m, 11),
          allDay         : true,
          backgroundColor: '#0073b7', //yellow
          borderColor    : '#0073b7' //yellow
        },
        {
          title          : o_12,
          start          : new Date(y, m, 12),
          allDay         : true,
          backgroundColor: '#0073b7', //yellow
          borderColor    : '#0073b7' //yellow
        },
        {
          title          : o_13,
          start          : new Date(y, m, 13),
          allDay         : true,
          backgroundColor: '#0073b7', //yellow
          borderColor    : '#0073b7' //yellow
        },
        {
          title          : o_14,
          start          : new Date(y, m, 14),
          allDay         : true,
          backgroundColor: '#0073b7', //yellow
          borderColor    : '#0073b7' //yellow
        },
        {
          title          : o_15,
          start          : new Date(y, m, 15),
          allDay         : true,
          backgroundColor: '#0073b7', //yellow
          borderColor    : '#0073b7' //yellow
        },
        {
          title          : o_16,
          start          : new Date(y, m, 16),
          allDay         : true,
          backgroundColor: '#0073b7', //yellow
          borderColor    : '#0073b7' //yellow
        },
        {
          title          : o_17,
          start          : new Date(y, m, 17),
          allDay         : true,
          backgroundColor: '#0073b7', //yellow
          borderColor    : '#0073b7' //yellow
        },
        {
          title          : o_18,
          start          : new Date(y, m, 18),
          allDay         : true,
          backgroundColor: '#0073b7', //yellow
          borderColor    : '#0073b7' //yellow
        },
        {
          title          : o_19,
          start          : new Date(y, m, 19),
          allDay         : true,
          backgroundColor: '#0073b7', //yellow
          borderColor    : '#0073b7' //yellow
        },
        {
          title          : o_20,
          start          : new Date(y, m, 20),
          allDay         : true,
          backgroundColor: '#0073b7', //yellow
          borderColor    : '#0073b7' //yellow
        },
        {
          title          : o_21,
          start          : new Date(y, m, 21),
          allDay         : true,
          backgroundColor: '#0073b7', //yellow
          borderColor    : '#0073b7' //yellow
        },
        {
          title          : o_22,
          start          : new Date(y, m, 22),
          allDay         : true,
          backgroundColor: '#0073b7', //yellow
          borderColor    : '#0073b7' //yellow
        },
        {
          title          : o_23,
          start          : new Date(y, m, 23),
          allDay         : true,
          backgroundColor: '#0073b7', //yellow
          borderColor    : '#0073b7' //yellow
        },
        {
          title          : o_24,
          start          : new Date(y, m, 24),
          allDay         : true,
          backgroundColor: '#0073b7', //yellow
          borderColor    : '#0073b7' //yellow
        },
        {
          title          : o_25,
          start          : new Date(y, m, 25),
          allDay         : true,
          backgroundColor: '#0073b7', //yellow
          borderColor    : '#0073b7' //yellow
        },
        {
          title          : o_26,
          start          : new Date(y, m, 26),
          allDay         : true,
          backgroundColor: '#0073b7', //yellow
          borderColor    : '#0073b7' //yellow
        },
        {
          title          : o_27,
          start          : new Date(y, m, 27),
          allDay         : true,
          backgroundColor: '#0073b7', //yellow
          borderColor    : '#0073b7' //yellow
        },{
          title          : o_28,
          start          : new Date(y, m, 28),
          allDay         : true,
          backgroundColor: '#0073b7', //yellow
          borderColor    : '#0073b7' //yellow
        },{
          title          : o_29,
          start          : new Date(y, m, 29),
          allDay         : true,
          backgroundColor: '#0073b7', //yellow
          borderColor    : '#0073b7' //yellow
        },{
          title          : o_30,
          start          : new Date(y, m, 30),
          allDay         : true,
          backgroundColor: '#0073b7', //yellow
          borderColor    : '#0073b7' //yellow
        },{
          title          : o_31,
          start          : new Date(y, m, 31),
          allDay         : true,
          backgroundColor: '#0073b7', //yellow
          borderColor    : '#0073b7' //yellow
        },  
      ],
      editable  : true,
      droppable : true, // this allows things to be dropped onto the calendar !!!
      drop      : function (date, allDay) { // this function is called when something is dropped

        // retrieve the dropped element's stored Event Object
        var originalEventObject = $(this).data('eventObject')

        // we need to copy it, so that multiple events don't have a reference to the same object
        var copiedEventObject = $.extend({}, originalEventObject)

        // assign it the date that was reported
        copiedEventObject.start           = date
        copiedEventObject.allDay          = allDay
        copiedEventObject.backgroundColor = $(this).css('background-color')
        copiedEventObject.borderColor     = $(this).css('border-color')

        // render the event on the calendar
        // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
        $('#calendar').fullCalendar('renderEvent', copiedEventObject, true)

        // is the "remove after drop" checkbox checked?
        if ($('#drop-remove').is(':checked')) {
          // if so, remove the element from the "Draggable Events" list
          $(this).remove()
        }
      } /* else {

      }
      */
    })
      }
    }

    showCalendar(m == monthIndex ? true : false);
    /* ADDING EVENTS */
    var currColor = '#3c8dbc' //Red by default
    //Color chooser button
    var colorChooser = $('#color-chooser-btn')
    $('#color-chooser > li > a').click(function (e) {
      e.preventDefault()
      //Save color
      currColor = $(this).css('color')
      //Add color effect to button
      $('#add-new-event').css({ 'background-color': currColor, 'border-color': currColor })
    })
    $('#add-new-event').click(function (e) {
      e.preventDefault()
      //Get value and make sure it is not null
      var val = $('#new-event').val()
      if (val.length == 0) {
        return
      }

      //Create events
      var event = $('<div />')
      event.css({
        'background-color': currColor,
        'border-color'    : currColor,
        'color'           : '#fff'
      }).addClass('external-event')
      event.html(val)
      $('#external-events').prepend(event)

      //Add draggable funtionality
      init_events(event)

      //Remove event from text input
      $('#new-event').val('')
    })
  })