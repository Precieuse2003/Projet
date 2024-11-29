<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <!-- PWA  -->
   <meta name="theme-color" content="#6777ef"/>
   <link rel="apple-touch-icon" href="{{ asset('logo.png') }}">
   <link rel="manifest" href="{{ asset('/manifest.json') }}">

  <title>Livraison Sharp</title>

  <!--- favicon-->
  <link rel="shortcut icon" href="./assets/images/logo/favicon.ico" type="image/x-icon">

  <!--- custom css link-->
  <link rel="stylesheet" href="./assets/css/style-prefix.css">

  <!--- google font link-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

</head>

<body>


  <!--- NOTIFICATION TOAST-->

  <!-- <div class="notification-toast" data-toast>

    <button class="toast-close-btn" data-toast-close>
      <ion-icon name="close-outline"></ion-icon>
    </button>

    <div class="toast-banner">
      <img src="./assets/images/products/jewellery-1.jpg" alt="Rose Gold Earrings" width="80" height="70">
    </div>

    <div class="toast-detail">

      <p class="toast-message">
        Someone in new just bought
      </p>

      <p class="toast-title">
        Rose Gold Earrings
      </p>

      <p class="toast-meta">
        <time datetime="PT2M">2 Minutes</time> ago
      </p>

    </div>

  </div> -->


  <!---HEADER-->

  <header>

    <div class="header-main">

      <div class="container">

        <a href="#" class="header-logo">
          <h1>Livraison Sharp</h1>
        </a>

        <div class="header-search-container">

          <input type="search" name="search" class="search-field" placeholder="Rechercher">

          <button class="search-btn">
            <ion-icon name="search-outline"></ion-icon>
          </button>

        </div>

        <div class="header-user-actions">

          <button class="action-btn">
            <ion-icon name="person-outline"></ion-icon>
          </button>

          <button class="action-btn">
            <ion-icon name="heart-outline"></ion-icon>
            <span class="count">0</span>
          </button>

          <button class="action-btn" id="viewCartButton">
            <ion-icon name="bag-handle-outline"></ion-icon>
            <span class="count">0</span>
          </button>

        </div>

      </div>

    </div>

    <div class="mobile-bottom-navigation">

      <button class="action-btn" data-mobile-menu-open-btn>
        <ion-icon name="menu-outline"></ion-icon>
      </button>


      <button class="action-btn">
        <ion-icon name="bag-handle-outline"></ion-icon>

        <span class="count">0</span>
      </button>

      <button class="action-btn">
        <ion-icon name="home-outline"></ion-icon>
      </button>

      <button class="action-btn">
        <ion-icon name="heart-outline"></ion-icon>

        <span class="count">0</span>
      </button>

      <button class="action-btn" data-mobile-menu-open-btn>
        <ion-icon name="grid-outline"></ion-icon>
      </button>

    </div>

    <nav class="mobile-navigation-menu  has-scrollbar" data-mobile-menu>

      <div class="menu-top">
        <h2 class="menu-title">Menu</h2>

        <button class="menu-close-btn" data-mobile-menu-close-btn>
          <ion-icon name="close-outline"></ion-icon>
        </button>
      </div>

      <ul class="mobile-menu-category-list">

        <li class="menu-category">
          <a href="#" class="menu-title">Accueil</a>
        </li>

        <li class="menu-category">

          <button class="accordion-menu" data-accordion-btn>
            <p class="menu-title">Supermarché</p>

            <div>
              <ion-icon name="add-outline" class="add-icon"></ion-icon>
              <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
            </div>
          </button>
        </li>

        <li class="menu-category">

          <button class="accordion-menu" data-accordion-btn>
            <p class="menu-title">Catégorie</p>

            <div>
              <ion-icon name="add-outline" class="add-icon"></ion-icon>
              <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
            </div>
          </button>

          <ul class="submenu-category-list" data-accordion>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Alimentaire</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Laitier</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Soins Personnel</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Surgelé</a>
            </li>

          </ul>

        </li>

      </ul>

    </nav>

  </header>

  @yield('content')

   <!--FOOTER-->

   <footer>


    <div class="footer-bottom">

      <div class="container">
        <p class="copyright">
          Copyright &copy; <a href="#">Livraison Sharp</a> all rights reserved.
        </p>

      </div>

    </div>

  </footer>



  <script src="{{ asset('/sw.js') }}"></script>
  <script>
     if ("serviceWorker" in navigator) {
        // Register a service worker hosted at the root of the
        // site using the default scope.
        navigator.serviceWorker.register("/sw.js").then(
        (registration) => {
           console.log("Service worker registration succeeded:", registration);
        },
        (error) => {
           console.error(`Service worker registration failed: ${error}`);
        },
      );
    } else {
       console.error("Service workers are not supported.");
    }
  </script>


  <script src="./assets/js/script.js"></script>

  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

  <!-- Script pour gérer l'ouverture/fermeture du menu -->
  <script>
    document.querySelector('[data-mobile-menu-open-btn]').addEventListener('click', function() {
        var menu = document.getElementById('mobile-menu');
        var overlay = document.getElementById('overlay');

        if (menu.style.left === '-250px') {
            menu.style.left = '0';
            overlay.style.display = 'block';
        } else {
            menu.style.left = '-250px';
            overlay.style.display = 'none';
        }
    });

    document.getElementById('overlay').addEventListener('click', function() {
        var menu = document.getElementById('mobile-menu');
        menu.style.left = '-250px';
        this.style.display = 'none';
    });
</script>

<!-- Ionicons pour l'icône du menu -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>


