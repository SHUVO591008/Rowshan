//Initialize Select2 Elements
$('.select2').select2();

  //Initialize Select2 Elements
  $('.select2bs4').select2({
    theme: 'bootstrap4'
  });


  //Date range picker
  $('.reservation').daterangepicker({

    singleDatePicker :true,
    locale: {
        format: 'DD/MM/YYYY'
      }
  })
  //Date range picker with time picker
  $('#reservationtime').daterangepicker({
    timePicker: true,
    timePickerIncrement: 30,
    locale: {
      format: 'MM/DD/YYYY hh:mm A'
    }
  })
  //Date range as a button
  $('#daterange-btn').daterangepicker(
    {
      ranges   : {
        'Today'       : [moment(), moment()],
        'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
        'This Month'  : [moment().startOf('month'), moment().endOf('month')],
        'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
      },
      startDate: moment().subtract(29, 'days'),
      endDate  : moment()
    },
    function (start, end) {
      $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
    }
  )

  //Timepicker
  $('#timepicker').datetimepicker({
    format: 'LT'
  })
  

// Skip Bank Details
$("#chkskippedDSR").click(function () {

  if (!$(this).is(":checked")) {

      $("#bank_details_form").fadeIn("slow", "linear");
  } else {

      $("#bank_details_form").fadeOut("slow", "linear");
  }
});

//social Information handlebars-template
$(document).ready(function () {
  $(document).on("click", ".add", function () {
      //handlebars-template code
      var source = $("#document-template").html();
      var template = Handlebars.compile(source);
      var html = template();
      $("#addRow").append(html);

      //id generate
      const id = "id" + Date.now() + Math.random().toString().substr(2);

      $("#socialicon2").attr("id", id);
      $("#url").attr("id", "url" + id);

      //social group add
      $("#socialstatus2").attr("id", id);
      $("#name").attr("id", "name" + id);

      var dataerror = "." + id;
      var urlerror = "." + "url" + id;
      var nameerror = "." + "name" + id;

      $("#" + id).attr("data-error", dataerror);
      $("#" + "url" + id).attr("data-error", urlerror);
      $(".socialicon0").attr("class", id);
      $(".urlerror").attr("class", "url" + id);
      //social group add
      $(".socialerrorStatus").attr("class", id);

      $("#" + "name" + id).attr("data-error", nameerror);
      $(".nameerror").attr("class", "name" + id);

    
      //script add
      $("#delete_add_more_item").append(
          '<script>$(".select2").select2();$("select").formSelect();</script>'
      );
   
  });

  //Remove Button
  $(document).on("click", ".removeeventmore", function (event) {
      var numItems = $(".delete_add_more_item").length;
      if (numItems == 1) {
          alert("Sorry!It cannot be deleted.");
      } else {
          $(this).closest(".delete_add_more_item").remove();
      }
  });
});
