<link rel="stylesheet" href="{{ asset('css/include-button-mode.css') }}">

<!-- Botão de alternância do modo noturno (ícone de lua/sol) -->
<div id="dark-mode-toggle" class="icon-container">
    <i class="fas fa-sun"></i>
</div>

<!-- Botão de alternância do modo noturno -->
<button class="dark-mode-button"><i class="fas fa-sun"></i></button>

<!-- Inclua a biblioteca Materialize JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<!-- Inclua a biblioteca AOS JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
    // Inicialize os componentes do Materialize
    document.addEventListener('DOMContentLoaded', function() {
        M.AutoInit();

        const toggleDarkModeButton = document.getElementById('dark-mode-toggle');
        const darkModeButton = document.querySelector('.dark-mode-button');
        const body = document.body;

        function toggleDarkMode() {
            body.classList.toggle('dark-mode');
            toggleDarkModeButton.classList.toggle('active');
            darkModeButton.classList.toggle('dark-mode');
            // Altere o ícone com base no modo
            const icon = darkModeButton.querySelector('i');
            if (body.classList.contains('dark-mode')) {
                icon.classList.remove('fa-sun');
                icon.classList.add('fa-moon');
            } else {
                icon.classList.remove('fa-moon');
                icon.classList.add('fa-sun');
            }
        }

        toggleDarkModeButton.addEventListener('click', toggleDarkMode);
        darkModeButton.addEventListener('click', toggleDarkMode);
    });

    // Inicialize as animações AOS
    AOS.init({
        duration: 700,
        easing: 'ease-in-out',
        once: true,
    });
</script>
