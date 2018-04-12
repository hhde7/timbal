// Event setup using a convenience method
$(document).ready(function() {

  $("#delete-all").click(function(eventObject) {
    var myTimbal = $('#my-timbal');

    url = "deleteAll";
    $.ajax({
      url: url,
      context: document.body,
      success: function() {
        myTimbal.remove();
      }
    });
  })
})
