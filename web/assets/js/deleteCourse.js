// Event setup using a convenience method
$(document).ready(function() {

  $(".fa-trash").click(function(eventObject) {
    var courseBlock = $(this).parents()[1];
    var courseId = $(this).parents()[1].id;
    var day = $(courseBlock).attr('class').split(' ').slice(-1);
    console.log(day);
    url = "delete/" + courseId;
    $.ajax({
      url: url,
      context: document.body,
      success: function() {
        courseBlock.remove();
        if ($('.' + day).length === 1) {
          var column = $('.' + day);
          column.parents()[2].remove();
        }
      }
    });
  })
})
