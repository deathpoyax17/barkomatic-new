function myFunction1() {
    var checkBox = document.getElementById("myCheck");
    var text = document.getElementById("text");
    if (checkBox.checked == true) {
        text.style.display = "block";
    } else {
        text.style.display = "none";
    }
}

function myFunction2() {
    var checkBox = document.getElementById("myCheck2");
    var text = document.getElementById("text2");
    if (checkBox.checked == true) {
        text.style.display = "block";
    } else {
        text.style.display = "none";
    }
}

// function to adjust minDate +/-
function modifyMinMaxDate(date, days) {
    var tempDate = date;
    tempDate.setDate(tempDate.getDate() + days);
    return tempDate;
}

$(function() {
    var dateFormat = "mm/dd/yy";
    from = $("#from").datepicker({
             defaultDate: "-1w",
            changeMonth: true,
            changeYear: true,
            onClose: function(selectedDate) {
                $("#to").datepicker(
                    "option",
                    "minDate",
                    modifyMinMaxDate(new Date(selectedDate), 1)
                );
                
            },
               onSelect: function(selectedDate) {
                $(this).val(selectedDate);
    }
            
        }),
        to = $("#to").datepicker({
             defaultDate: "-1w",
            changeMonth: true,
            changeYear: true,
            onClose: function(selectedDate) {
                $("#from").datepicker(
                    "option",
                    "maxDate",
                    modifyMinMaxDate(new Date(selectedDate), -1)
                );
            },
               onSelect: function(selectedDate) {
                $(this).val(selectedDate);
               }
        });
        $("#from").val($.datepicker.formatDate("mm/dd/yy", new Date()));
        $("#to").val($.datepicker.formatDate("mm/dd/yy", new Date()));
});

$(function() {
    var dateFormat = "mm/dd/yy";
    from2 = $("#from2").datepicker({
            defaultDate: "-1w",
            changeMonth: true,
            changeYear: true,
            onClose: function(selectedDate) {
                $("#to").datepicker(
                    "option",
                    "minDate",
                    modifyMinMaxDate(new Date(selectedDate), 1)
                );
            },
               onSelect: function(selectedDate) {
                $(this).val(selectedDate);
               }
        }),
        to2 = $("#to2").datepicker({
                defaultDate: "-1w",
            changeMonth: true,
            changeYear: true,
            onClose: function(selectedDate) {
                $("#from").datepicker(
                    "option",
                    "maxDate",
                    modifyMinMaxDate(new Date(selectedDate), -1)
                );
            },
               onSelect: function(selectedDate) {
                $(this).val(selectedDate);
               }
        });
        $("#from2").val($.datepicker.formatDate("mm/dd/yy", new Date()));
        $("#to2").val($.datepicker.formatDate("mm/dd/yy", new Date()));
});