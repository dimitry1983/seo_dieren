document.addEventListener("DOMContentLoaded", function () {
    
    const postsContainer = document.querySelector(".posts");
    const btn2Cols = document.getElementById("btn-2-cols");
    const btn4Cols = document.getElementById("btn-4-cols");
    const btn6Cols = document.getElementById("btn-6-cols");

    if (btn2Cols && btn4Cols && btn6Cols) {
       
        btn2Cols.addEventListener("click", () => {
            postsContainer.classList.remove("grid-cols-3", "grid-cols-2");
            postsContainer.classList.add("grid-cols-1");
        });

        btn4Cols.addEventListener("click", () => {
            postsContainer.classList.remove("grid-cols-1", "grid-cols-3");
            postsContainer.classList.add("grid-cols-2");
        });

        btn6Cols.addEventListener("click", () => {
            postsContainer.classList.remove("grid-cols-1", "grid-cols-2");
            postsContainer.classList.add("grid-cols-3");
        });
    }
});


document.addEventListener("DOMContentLoaded", function () {
    const pills = document.querySelectorAll(".pill");
    const blocks = document.querySelectorAll(".block-hotspots");

    pills.forEach(pill => {
        pill.addEventListener("click", function () {
            pills.forEach(p => p.classList.remove("border-b-primary", "active"));
            
            this.classList.add("border-b-primary", "active");

            const filter = this.getAttribute("data-filter");

            blocks.forEach(block => {
                if (filter === "all") {
                    block.classList.remove("hidden");
                } else {
                    block.classList.toggle("hidden", !block.classList.contains(`category-${filter}`));
                }
            });
        });
    });
});

document.getElementById('toggleBtn').addEventListener('click', function () {
    document.getElementById('mainMenu').classList.toggle('hidden');
    document.getElementById('toggleBtn').classList.toggle('open');
});

(function (code) {
    code(window.jQuery, window, document);
}(function ($, window, document) {
    $('.splide').each(function () {
        new Splide(this).mount();
    });
}));

document.addEventListener("DOMContentLoaded", function () {
    var gallerySlider = document.querySelector('#gallery-slider');
    if (gallerySlider) {
        new Splide(gallerySlider, {
            type: 'loop',
            perPage: 3,
            perMove: 3,
            gap: '10px',
            pagination: false,
            arrows: true,
            breakpoints: {
                1024: {
                    perPage: 2,
                    perMove: 2
                },
                768: {
                    perPage: 1,
                    perMove: 1
                }
            }
        }).mount();
    }
});

document.addEventListener("DOMContentLoaded", function () {
    document.getElementById('resetfilters').addEventListener('click', function (e) {
        e.preventDefault(); // Prevent anchor default behavior
        const form = document.getElementById('searchform');
        if (form) {
            form.reset(); // Reset the form fields
            form.dispatchEvent(new Event('submit')); // Optional: resubmit the form
        }
    });
});