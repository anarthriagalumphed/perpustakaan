$('.sidebar-overlay').on('click', function() {
    $('body').removeClass('sidebar-open');
  });


  $(window).on('resize', function() {
    if ($(window).width() >= 768) {
      $('body').removeClass('sidebar-open');
    }
  });