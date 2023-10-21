 <style>
     .dark-mode-button {
         position: fixed;
         top: 80px;
         right: 20px;
         padding-top: 30px;
         background-color: #009688;
         color: #fff;
         border: none;
         border-radius: 50%;
         width: 40px;
         height: 40px;
         cursor: pointer;
         display: flex;
         align-items: center;
         justify-content: center;
         font-size: 20px;
         transition: background-color 0.3s ease-in-out;
     }

     /* Estilo para o botão de alternância do modo noturno no modo noturno */
     .dark-mode-button.dark-mode {
         background-color: #333;
     }

     /* Estilo para o ícone de lua/sol */
     .icon-container {
         position: fixed;
         top: 20px;
         right: 20px;
         cursor: pointer;
         font-size: 24px;
         transition: transform 0.3s ease-in-out, color 0.3s ease-in-out;
     }

     /* Animação para o ícone de lua/sol */
     .icon-container.active {
         transform: rotate(180deg);
     }

     @media (max-width: 600px) {

         .dark-mode-button {
             top: 60px;
             right: 10px;
             width: 30px;
             height: 30px;
             font-size: 16px;
         }
     }
 </style>

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
