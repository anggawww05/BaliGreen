<header id="main-header" class="absolute top-0 left-0 w-full z-50 transition-all duration-300 bg-white shadow-md">
    <nav class="container mx-auto flex items-center justify-between py-4 px-6">
        <div id="logo-text" class="flex items-center gap-2 text-xl font-bold transition-colors duration-300 cursor-pointer" style="--hover-color: #5A7863;">
            <span>SAMDES</span>
        </div>

        <ul class="flex space-x-8">
            <li>
                <a href="#home" class="nav-link text-gray-700 font-medium transition-all duration-300 pb-1" data-section="home" style="--hover-color: #5A7863;">Beranda</a>
            </li>
            <li>
                <a href="#about" class="nav-link text-gray-700 font-medium transition-all duration-300 pb-1" data-section="about" style="--hover-color: #5A7863;">Tentang Kami</a>
            </li>
            <li>
                <a href="#tips" class="nav-link text-gray-700 font-medium transition-all duration-300 pb-1" data-section="tips" style="--hover-color: #5A7863;">Tips & Trik</a>
            </li>
        </ul>
    </nav>
</header>

<style>
    #logo-text:hover {
        color: #5A7863;
    }

    .nav-link:hover {
        color: #5A7863;
        border-bottom: 2px solid #5A7863;
    }
</style>

<script>
    const navLinks = document.querySelectorAll('.nav-link');

    window.addEventListener('scroll', () => {
        let current = '';
        navLinks.forEach(link => {
            const section = document.getElementById(link.dataset.section);
            if (section && section.offsetTop <= window.scrollY + 100) {
                current = link.dataset.section;
            }
        });

        navLinks.forEach(link => {
            link.style.color = '';
            link.style.borderBottom = '';
            if (link.dataset.section === current) {
                link.style.color = '#5A7863';
                link.style.borderBottom = '2px solid #5A7863';
            }
        });
    });
</script>
