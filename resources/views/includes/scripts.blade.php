<script>
 $('.tooltipped').tooltip();
   
   $(function() {
       $(".preloader").fadeOut();
   });
   
    $('body').on('click', '.materialert .close-alert', function() {
        $(this).parent().fadeOut(300, function() {
            $(this).remove();
        });
    });
</script>