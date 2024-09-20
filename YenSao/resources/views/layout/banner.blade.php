<!-- Hero section -->
<section class=" py-20">
    <a><img id='hero-banner' class=" transition-all duration-100" src="HomePage/HeroBanner.png"></a>
</section>
<style>
    /* Custom fade-out class */
    .fade-out {
        opacity: 0;
        transition: opacity 1s ease-in-out;
    }

    /* Ensure the element is visible initially */
    .fade-in {
        opacity: 1;
        transition: opacity 1s ease-in-out;
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const heroBanner = document.getElementById('hero-banner');
        const images = [
            'HomePage/HeroBanner.png',
            'HomePage/HeroBanner2.png',
            'HomePage/HeroBanner3.png',
            'HomePage/HeroBanner4.png',
            'HomePage/HeroBanner5.png',
            'HomePage/HeroBanner6.png',
            'HomePage/HeroBanner7.png',
            // Add more image paths as needed
        ];
        let currentIndex = 0;

        function changeImage() {
            heroBanner.classList.add('fade-out'); // Start fade-out effect
            setTimeout(() => {
                currentIndex = (currentIndex + 1) % images.length;
                heroBanner.src = images[currentIndex]; // Change image source
                
                heroBanner.classList.remove('fade-out'); // Start fade-in effect
                heroBanner.classList.add('fade-in');
                
                // Remove fade-in class after transition ends
                heroBanner.addEventListener('transitionend', () => {
                    heroBanner.classList.remove('fade-in');
                }, { once: true });
            }, 2000); // Delay should match the CSS transition duration
        }

        // Change image every 3 seconds
        setInterval(changeImage, 5000);
    });
</script>



<!--


    <tr> => Table Row = Hàng
    <th> => Table Header = Cột tiêu đều
    <td> => Table Data = Cột của hàng
    
-->

