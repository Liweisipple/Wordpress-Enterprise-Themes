
$(".video").addClass('pause');//for check pause or play add a class
$(".video").click(function () {
  if ($(this).hasClass('pause')) {
    $(this).next().hide();
    $(this).trigger("play");
    $(this).removeClass('pause');
    $(this).addClass('play');
  } else {
    $(this).next().show();
    $(this).trigger("pause");
    $(this).removeClass('play');
    $(this).addClass('pause');
  }
})
$(".video-img").click(function () {
  if ($(this).prev().hasClass('pause')) {
    $(this).hide();
    $(this).prev().trigger("play");
    $(this).prev().removeClass('pause');
    $(this).prev().addClass('play');
  } else {
    $(this).show();
    $(this).prev().trigger("pause");
    $(this).prev().removeClass('play');
    $(this).prev().addClass('pause');
  }
})
