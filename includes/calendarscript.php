<!-- fullCalendar 2.2.5 -->
<script src="../assests/plugins/moment/moment.min.js"></script>
<script src="../assests/plugins/fullcalendar/fullcalendar.js"></script>


<script type="text/javascript">
  $(function () {
      // top bar active
  $('#navDashboard').addClass('active');

      //Date for the calendar events (dummy data)
      var date = new Date();
      var d = date.getDate(),
      m = date.getMonth(),
      y = date.getFullYear();
   


      $('#calendar').fullCalendar({
    monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
    dayNamesShort: ['Dom','Lun','Mar','Mié','Jue','Vie','Sáb'],
        header: {
          left: '',
          center: 'title'
        },
        buttonText: {
          today: 'Hoy',
          month: 'Mes'          
        }        
      });


    });
</script>