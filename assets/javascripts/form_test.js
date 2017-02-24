
$(function() {
    //Vertical align background on window resize.
    $(window).bind("load resize", function() {
        var screen_height = window.innerHeight;
        $('body').height(screen_height)
    })
});

function postForm(data) {

  var send_form = $.ajax({
      type:"POST",
      url: './assets/php/formTest.php',
      data: data,
      cacheControl: true,
      success:function(response, textStatus, errorThrown){
                $('#panelButton').show();
              },
      error: function(response, textStatus, errorThrown) {
        console.log("ERROR:\n" + response.responseText);
      }
  });
}

function handleSubmit(form) {

  var data ={
    'name': form[0].value,
    'lastName': form[1].value,
    'email': form[2].value,
    'tel': form[3].value,
    'day_birth': form[4].value,
    'month_bird': form[5].value,
    'year_birth': form[6].value,
    'cp': form[7].value,
    'instagram_user': form[8].value
  }

  postForm(data);
  return false;
}

function showPanel(response){
  $('.wrapper').empty();
  $('.wrapper').append(response);
  $('#export_button').show();
}

function getFromDB(){

  var send_form = $.ajax({
      type:"GET",
      url: './assets/php/panel.php',
      cacheControl: true,
      success:function(response, textStatus, errorThrown){
                showPanel(response);
              },
      error: function(response, textStatus, errorThrown) {
        console.log("ERROR:\n" + response.responseText);
      }
  });
}




