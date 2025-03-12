document.getElementById('toggleBtn').addEventListener('click', function () {
    document.getElementById('sideContent').classList.toggle('compressed');
    document.getElementById('toggleBtn').classList.toggle('opened');
  });

  document.getElementById('toggleSideMenu').addEventListener('click', function () {
    document.getElementById('sideMenu').classList.toggle('is-open');
    document.getElementById('toggleSideMenu').classList.toggle('opened');
  });

  (function(code){
  code(window.jQuery,window,document);
  }(function($,window,document){
      $(document).on('click', '[data-dropdown]', function(){
          let _this = $(this);
          _this.parent().toggleClass('is-open');
          
      });
      $('.splide').each(function(){
          new Splide(this).mount();
      });
  }));