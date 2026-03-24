var slideIndex = 0;

showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("slide-container");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) {
        slideIndex = 1;
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
    setTimeout(showSlides, 5000);
}

document.getElementById('menu-toggle').addEventListener('click', () => {
    document.getElementById('mobile-menu').classList.toggle('hidden');
});

    // Show fade-in effect
    window.addEventListener("load", () => {
        document.body.classList.add("loaded");
        setTimeout(() => {
            document.getElementById("loader").style.display = "none";
        }, 300);
    });

    // Smooth fade-out on page change
    document.querySelectorAll("a").forEach(link => {
        // only apply for internal links
        if (link.href.startsWith(window.location.origin)) {
            link.addEventListener("click", (e) => {
                // ignore tabs / new window
                if (e.ctrlKey || e.shiftKey || e.metaKey) return;

                e.preventDefault();
                const url = link.href;

                document.body.style.opacity = 0;

                setTimeout(() => {
                    window.location.href = url;
                }, 300);
            });
        }
    });

document.getElementById("phoneNo").addEventListener("input", function () {
    this.value = this.value.replace(/[^0-9]/g, "");
});
document.getElementById("pincode").addEventListener("input", function () {
    this.value = this.value.replace(/[^0-9]/g, "");
});