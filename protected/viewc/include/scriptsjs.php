<!-- modal -->
 <div id="modalNotificacion" class="modal">
    <div class="modal-content">
      <h4>&#35;ManOfToday</h4>
      <p>Se ha habilitado una nueva encuesta</p>
    </div>
    <div class="modal-footer">
      <a href="<?php echo Doo::conf()->SUBFOLDER.'encuesta'; ?>" class=" modal-action modal-close waves-effect waves-esquire btn-flat">Contestar ahora</a>
    </div>
  </div>

<!--  Scripts-->
<script src="<?php echo Doo::conf()->APP_URL; ?>global/js/jquery-2.1.4.min.js"></script>
<script src="<?php echo Doo::conf()->APP_URL; ?>global/js/jquery.timeago.js"></script>  
<script src="<?php echo Doo::conf()->APP_URL; ?>global/js/materialize.min.js"></script>
<script src="<?php echo Doo::conf()->APP_URL; ?>global/js/jquery.nicescroll.min.js"></script>
<script src="<?php echo Doo::conf()->APP_URL; ?>global/js/init.js"></script>
<script type="text/javascript">
    var encuesta;
$(document).ready(function(){
    $.get("<?php echo Doo::conf()->APP_URL.'api/encuesta'; ?>", function(data){
        obj = $.parseJSON(data);
        encuesta = obj.encuesta;
    });
});

function updateEncuesta(){
    $.get("<?php echo Doo::conf()->APP_URL.'api/encuesta'; ?>", function(data){
        obj = $.parseJSON(data);
        if(encuesta==false && encuesta != obj.encuesta){
            encuesta = obj.encuesta;
            $('#modalNotificacion').openModal();
            //alert("Responde la nueva encuesta");
            //document.location.href = '<?php echo Doo::conf()->SUBFOLDER; ?>encuesta';
        }else if(obj.encuesta == false){
            encuesta = false;
        }
    });
}
setInterval("updateEncuesta()",3000);
</script>
<!--  /Scripts-->