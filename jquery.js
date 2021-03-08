$(document).ready(function() {
  $("#country").on('change',function(){
    var countryid=$(this).val();
    $.ajax({
      method:"POST",
      url:"ajax.php",
      data:{id:countryid},
      dataType:"html",
      success:function(data){
        $("#state").html(data);
      }
    });
  });
});
