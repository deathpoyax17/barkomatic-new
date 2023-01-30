<script type="text/javascript" src="resources/js/main.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
<script type="text/javascript" src="resources/js/bootstrap.min.js"></script>
<script type="text/javascript" src="resources/js/popper.min.js"></script>
<script type="text/javascript" src="resources/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="resources/js/calendar.js"></script>
<script type="text/javascript" src="resources/js/main/process.js"></script>
<script>
$(document).ready(function(){
    $('#loc-from').on('change', function(){
        var portfrom = $(this).val();
        
            $.ajax({
                type:'POST',
                url:'data.php',
                data:'port_name='+portfrom,
                success:function(html){
                    $('#port-from').html(html);
                    console.log(html);
                }
            }); 
    });
    
    $('#loc-to').on('change', function(){
        var locato = $(this).val();

            $.ajax({
                type:'POST',
                url:'data.php',
                data:'locato='+locato,
                success:function(html){
                    $('#port-to').html(html);
                    console.log(html);
                }
            }); 
        
    });
    
});
</script>
<script>
$(document).ready(function(){
$('.select1, .select2').on('change',
    function () {
    	if ($('.select1').val() == $('.select2').val()) {
            $("#test").text("Destination can't be the same");
        }
        else {
            $("#test").text("");
        }
    }
);
});
</script>
