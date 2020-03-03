$(".video-img").click(function(){
  $(this).hide();
  $("#video")[0].play()
})

{
  // 导航hover效果
  var $block = $('.top-nav .main-navs')
  var activeClass = 'active'
  var defaultRouterName = window.location.pathname
  var routerName = defaultRouterName.substr(defaultRouterName.lastIndexOf('/', defaultRouterName.lastIndexOf('/') - 1) + 1)
  $block.find('.navs-item').each(function () {
    var defaultCurrentHref = $(this).attr('href')
    var currentHref = defaultCurrentHref.substr(defaultCurrentHref.lastIndexOf('/', defaultCurrentHref.lastIndexOf('/') - 1) + 1)
    var currentIndex = currentHref.lastIndexOf("\/");
    if (currentHref === routerName) {
      $(this).addClass('active')
    } else {
      $(this).removeClass('active')
    }
  })
}
