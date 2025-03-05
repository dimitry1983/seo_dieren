<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="../src/public/js/alpine.js"></script>
<script src="../src/public/js/splide.min.js"></script>
<script>
    document.getElementById('toggleBtn').addEventListener('click', function () {
      document.getElementById('mainMenu').classList.toggle('hidden');
      document.getElementById('toggleBtn').classList.toggle('open');
    });

    (function(code){
	code(window.jQuery,window,document);
    }(function($,window,document){
        $('.splide').each(function(){
            new Splide(this).mount();
        });
    }));
</script>