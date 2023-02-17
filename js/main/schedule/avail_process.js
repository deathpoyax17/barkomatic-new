// $(document).ready(function() {
//     setTimeout(function() {
//         fetch_all_location();
//     }, 100);

//     function fetch_all_location() {
//         var fep_action = "fetch_all_location";
//         $.ajax({
//             url: "./modules/profile.php",
//             method: "POST",
//             data: { action: fep_action },
//             success: function(response) {
//                 $("#from_loc_data").html(response);
//             }
//         });
//     }
// });

//* search available schedule & filter selected
$(document).ready(function() {
    //* fetch search schedules
    $('#search_sched_form').validate();
    $('#srch_sched_btn').click(function(e) {
        if (document.querySelector('#search_sched_form').checkValidity()) {
            e.preventDefault();
            // $(':input[type="submit"]').prop('disabled', true);
            $.ajax({
                url: './modules/schedule/avail_process.php',
                method: 'POST',
                data: $('#search_sched_form').serialize() + '&action=search_sched_form',
                success: function(response) {
                    console.log(response);
                    var data = JSON.parse(response);
                    document.cookie = "data=" + encodeURIComponent(JSON.stringify(data));
                    window.location = "scheduletrip(roundtrip).php";
                }
            });
        }  else {  
            e.preventDefault();  
        }  
    }); 


    //* fetch summary selected schedule
    $('#srch_sched_ftr_form').submit(function(e) {
        e.preventDefault();
        $(':input[type="submit"]').prop('disabled', true);
        $.ajax({
            url: './modules/schedule/avail_process.php',
            method: 'POST',
            data: $('#srch_sched_ftr_form').serialize() + '&action=srch_sched_ftr_form',
            success: function(data) {
                setTimeout(function() {
                    $("#smmry_dptr_slctd_sched_form").html(data);
                }, 100);
                setTimeout(function() {
                    $(':input[type="submit"]').prop('disabled', false);
                }, 100);
            }
        });
    });
    //* submit reservation
    $('#smmry_dptr_slctd_sched_form').submit(function(e) {
        e.preventDefault();
        $(':input[type="submit"]').prop('disabled', true);
        $.ajax({
            url: './modules/schedule/avail_process.php',
            method: 'POST',
            data: $('#smmry_dptr_slctd_sched_form').serialize() + '&action=smmry_dptr_slctd_sched_form',
            success: function(response) {
                setTimeout(function() {
                    $(':input[type="submit"]').prop('disabled', false);
                }, 100);
                setTimeout(function() {
                    window.location.href = response ;
                }, 100);
            }
        });
    });
    $('#summary_continue').submit(function(e) {
      e.preventDefault();
      // $(':input[type="submit"]').prop('disabled', true);
      $.ajax({
          url: './modules/schedule/avail_process.php',
          method: 'POST',
          data: $('#summary_continue').serialize() + '&action=smmry_cn',
          success: function(response) {
              // setTimeout(function() {
              //     $(':input[type="submit"]').prop('disabled', false);
              // }, 100);
              setTimeout(function() {
                 alert(response);
              }, 100);
          }
      });
  });

    $(document).on('change','#accomodation_form',function(){
      var selectedAccommodation = $(this).val();
      var rowId = $(this).data('row-id');
      $.ajax({
        url: './modules/schedule/get_price.php',
        method: 'post',
        data: { selectedAccommodation: selectedAccommodation },
        success: function(data) {
          var parsedData = JSON.parse(data);
          $('#price-'+rowId).text(parsedData.price);
          $('#prices').text('₱_'+parsedData.price);
          $('#acomm').text(parsedData.accomodation_name);
          $('#room_tp').text(parsedData.room_type);
          $('#aircn').text(parsedData.aircon);
          console.log(parsedData);
        }
      });
     
    });
    
    $(document).on('change','#r_accomodation_form',function(){
      var selectedAccommodation = $(this).val();
      var rowId = $(this).data('row-id');
      $.ajax({
        url: './modules/schedule/get_price.php',
        method: 'post',
        data: { selectedAccommodation: selectedAccommodation },
        success: function(datas) {
          var r_parsedData = JSON.parse(datas);
          $('#r_price-'+rowId).text(r_parsedData.price);
          $('#r_prices').text('₱_'+ r_parsedData.price);
          $('#r_acomm').text(r_parsedData.accomodation_name);
          $('#r_room_tp').text(r_parsedData.room_type);
          $('#r_aircn').text(r_parsedData.aircon);
          console.log(r_parsedData);
        }
      });
     
    });

//departure
$(document).on('click','.select-button',function(){
  var form_selec = $(this).closest(".itinerary-table");
  var sched_id = form_selec.find('input[type="radio"]').val();
  var sched_accom = form_selec.find('select[name="selectedAccommodation"]').val(); // use the correct selector
  var act = 'sched_sel';
  var act1 = 'sched_des';
  var button = $(this);
  var radio = form_selec.find('input[type="radio"]');
  var selectedRow = $('input[name="schedule_id"]:checked').closest('.itinerary-table');
  
  if (selectedRow.length > 0 && selectedRow[0] !== form_selec[0]) {
    // deselect previously selected row
    selectedRow.removeClass('itinerary-table-selected');
    selectedRow.find('.select-button').removeClass('btn-success').addClass('btn-info').html('Select');
    selectedRow.find('input[type="radio"]').prop('checked', false);
  }
  if (radio.prop('checked')) {
    // deselect row
    form_selec.removeClass('itinerary-table-selected');
    button.removeClass('btn-success').addClass('btn-info').html('Select');
    radio.prop('checked', false);
    $("#btncontinue").hide();
    $.ajax({
      type: 'POST',
      url: './modules/schedule/avail_process.php',
      data: {
        'action':act1
      },
      success: function(response0) {
        $("#ship_departure").html(response0);
        
      },
    
    });

  } else {
    // select row
    var sched_id = form_selec.find('input[type="radio"]').val();
    form_selec.addClass('itinerary-table-selected');
    button.removeClass('btn-info').addClass('btn-success').html('<i class="fa fa-check"></i>&nbsp; Selected');
    radio.prop('checked', true);
    $("#btncontinue").show();
    $.ajax({
      type: 'POST',
      url: './modules/schedule/avail_process.php',
      data: {
        'action':act,
        'schedule_id': sched_id,
        'accommodation_selected':sched_accom
      },
      success: function(response1) {
        $("#ship_departure").html(response1);
        console.log(response1)
      },
    });
  }
  console.log(sched_accom);
});

      //returen
  $(document).on('click','.select-buttons',function(){
  var form_selec = $(this).closest(".itinerary-table");
  var sched_id = form_selec.find('input[type="radio"]').val();
  var r_sched_accom = form_selec.find('select[name="r_selectedAccommodation"]').val(); // use the correct selector
  var act = 'r_sched_sel';
  var act1 = 'sched_des';
  var button = $(this);
  var radio = form_selec.find('input[type="radio"]');
  var selectedRow = $('input[name="r_schedule_id"]:checked').closest('.itinerary-table');
  
  if (selectedRow.length > 0 && selectedRow[0] !== form_selec[0]) {
    // deselect previously selected row
    selectedRow.removeClass('itinerary-table-selected');
    selectedRow.find('.select-buttons').removeClass('btn-success').addClass('btn-info').html('Select');
    selectedRow.find('input[type="radio"]').prop('checked', false);
  }
  if (radio.prop('checked')) {
    // deselect row
    form_selec.removeClass('itinerary-table-selected');
    button.removeClass('btn-success').addClass('btn-info').html('Select');
    radio.prop('checked', false);
    $("#btncontinue").hide();
    $.ajax({
      type: 'POST',
      url: './modules/schedule/avail_process.php',
      data: {
        'action':act1
      },
      success: function(response0) {
        $("#returen_ship_departure").html(response0);
        
      },
    
    });
  } else {
    // select row
    var sched_id = form_selec.find('input[type="radio"]').val();
    form_selec.addClass('itinerary-table-selected');
    button.removeClass('btn-info').addClass('btn-success').html('<i class="fa fa-check"></i>&nbsp; Selected');
    radio.prop('checked', true);
    $("#btncontinue").show();
    $.ajax({
      type: 'POST',
      url: './modules/schedule/avail_process.php',
      data: {
        'action':act,
        'schedule_id': sched_id,
        'accommodation_selecteds':r_sched_accom
      },
      success: function(response1) {
        $("#returen_ship_departure").html(response1);
        console.log(response1)
      },
    });
  }
  console.log(r_sched_accom);
      });
      
      
});



