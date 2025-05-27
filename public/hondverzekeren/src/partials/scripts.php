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

        $(document).on('click', '.accordeon', function() {
            let parent = $(this).parent(); // Find the parent container
        
            if ($(this).hasClass('open')) {
                // If the clicked element is already open, remove 'open' class and hide content
                $(this).removeClass('open').find('div').slideUp();
            } else {
                // Close all other accordions within the same parent
                parent.find('.accordeon').removeClass('open').find('div').slideUp();
        
                // Open the clicked accordion
                $(this).addClass('open').find('div').slideDown();
            }
        });
    }));
</script>