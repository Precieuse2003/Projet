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

<!-- Bouton pour ouvrir la modale -->
<button class="action-btn" >
    <ion-icon name="person-outline"></ion-icon>
  </button>

  <!-- Fenêtre modale -->
  <div class="modal" id="profileModal">
    <div class="modal-content">
      <div class="modal-header">
        <span class="close">&times;</span>
      </div>
      <h2>Informations du compte</h2>
      <div class="modal-body">
        <p><strong>Nom :</strong>  {{Auth::user()->nom}}<span id="profileName"></span></p>
        <p><strong>Email :</strong>  {{Auth::user()->email}} <span id="profileEmail"></span></p>
      </div>
      <div class="modal-footer">
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <button type="button" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit()">Se déconnecter</button>
        </div>
    </div>
  </div>

          <!-- Lien pour afficher les favoris -->
          <a href="#" class="action-btn" id="afficher-favoris">
            <ion-icon name="heart-outline"></ion-icon>
            <span class="count">0</span>
        </a>

        <div id="favoris-modal" class="modal" style="display: none;">
            <div class="modal-content">
                <span class="close-btn" id="close-modal">&times;</span>
                <h2>Liste des favoris</h2>
                <ul id="favoris-list">
                    <!-- Liste des produits favoris sera chargée ici par JavaScript -->
                </ul>
            </div>
        </div>
<!-- Bouton pour afficher le panier -->
<a href="#" class="action-btn" id="afficher-panier">
    <ion-icon name="cart-outline"></ion-icon>
    <span id="panierCount" class="count">0</span>
</a>

<!-- Modal du panier -->
<div id="cartDisplayModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Votre panier</h2>
        <div class="cart-items"></div>
        <div class="cart-total">
            <p>Total : <span id="cartTotal">0</span> Fcfa</p>
        </div>
        <div class="cart-actions">
            <a href="{{route('panier.create')}}" id="validateCart" class="btn-validate">Commander</a>
        </div>
    </div>
</div>




        </div>

      </div>

    </div>

    <div class="mobile-bottom-navigation">

      <a class="action-btn" data-mobile-menu-open-btn>
        <ion-icon name="menu-outline"></ion-icon>
      </a>


      <a href="{{route('panier.index')}}" class="action-btn">
        <ion-icon name="bag-handle-outline"></ion-icon>

        <span class="count">0</span>
      </a>

      <a href="{{route('client.sup')}}" class="action-btn">
        <ion-icon name="home-outline"></ion-icon>
      </a>

      <a href="#" class="action-btn" id="afficher-favoris">
        <ion-icon name="heart-outline"></ion-icon>
        <span class="count">0</span>
    </a>
    <div id="favoris-modal" class="modal" style="display: none;">
        <div class="modal-content">
            <span class="close-btn" id="close-modal">&times;</span>
            <h2>Liste des favoris</h2>
            <ul id="favoris-list">
                <!-- Liste des produits favoris sera chargée ici par JavaScript -->
            </ul>
        </div>
    </div>

    </div>

    </nav>
    <style>
  .modal {
  display: none; /* Masquer par défaut */
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.5); /* Fond semi-transparent */
  justify-content: center;
  align-items: center;
}

.modal.show {
  display: flex; /* Affiche la modale en flex pour la centrer */
}

.modal-content {
  background: white;
  padding: 20px;
  border-radius: 5px;
  max-width: 500px;
  width: 100%;
  margin-top: 10px;
}
.close {
      color: #aaa;
      float: right;
      font-size: 28px;
      cursor: pointer;
    }
.modal-body p {
  font-size: 1.0rem; /* Augmente la taille du texte */
  font-weight: bold; /* Rend le texte gras */
}

.modal-header h2 {
    background-color: #dc3545;
  font-size: 2rem; /* Augmente la taille du titre */
  font-weight: bold; /* Titre en gras */
}

.modal-footer .btn-danger {
    background-color: red;
  font-size: 1.2rem; /* Augmente la taille du bouton */
  padding: 10px 20px; /* Ajoute de l'espace dans le bouton */
}

/*favoris*/

/* Modal - Fond sombre */
.modal {
    display: none; /* Initialement masqué */
    position: fixed;
    z-index: 1; /* S'assurer que le modal soit au-dessus de tout autre contenu */
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.4); /* Fond sombre */
    overflow: auto; /* Permet de défiler si le contenu est trop long */
}

/* Contenu du modal */
.modal-content {
    background-color: white;
    margin: 15% auto; /* Centre le modal */
    padding: 20px;
    border: 1px solid #888;
    width: 80%; /* Largeur du modal */
    max-width: 600px; /* Largeur maximale */
    border-radius: 10px; /* Coins arrondis */
}

/* Bouton de fermeture */
.close-btn {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
    cursor: pointer;
}

.close-btn:hover,
.close-btn:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}

/* Liste des produits favoris */
#favoris-list {
    list-style-type: none;
    padding: 0;
}

#favoris-list li {
    padding: 10px;
    border-bottom: 1px solid #ddd;
    font-size: 16px;
}

#favoris-list li button {
    background-color: red;
    color: white;
    border: none;
    cursor: pointer;
    padding: 5px 10px;
    border-radius: 5px;
}

#favoris-list li button:hover {
    background-color: darkred;
}

/*panier*/
/* Modal - Fond sombre */
.modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    justify-content: center;
    align-items: center;
    z-index: 1000;
}

.modal-content {
    background: white;
    border-radius: 8px;
    padding: 20px;
    width: 90%;
    max-width: 400px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
}

.close {
    position: absolute;
    top: 10px;
    right: 15px;
    font-size: 20px;
    cursor: pointer;
}

.cart-items {
    max-height: 300px;
    overflow-y: auto;
    margin-bottom: 20px;
}

.cart-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 15px;
}

.cart-item img {
    width: 50px;
    height: 50px;
    object-fit: cover;
    border-radius: 5px;
}

.cart-item-info {
    flex: 1;
    margin-left: 10px;
}

.cart-actions {
    text-align: center;
}
.cart-total {
    margin-top: 10px;
    font-size: 18px;
    font-weight: bold;
    text-align: right;
    color: #333;
}

.btn-validate {
    background-color: #4CAF50;
    color: white;
    border: none;
    padding: 10px 15px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    width: 100%;
}

.btn-validate:hover {
    background-color: #45a049;
}

.btn-remove {
    background-color: #f44336;
    color: white;
    border: none;
    padding: 5px 10px;
    border-radius: 5px;
    cursor: pointer;
}

.btn-remove:hover {
    background-color: #e41f1f;
}

</style>
    <script>
        //profil
     document.querySelector('.action-btn').addEventListener('click', () => {
  document.getElementById('profileModal').classList.add('show');
});

document.querySelector('.close').addEventListener('click', () => {
  document.getElementById('profileModal').classList.remove('show');
});

window.addEventListener('click', (e) => {
  const modal = document.getElementById('profileModal');
  if (e.target === modal) {
    modal.classList.remove('show'); // Fermer la modale en cliquant à l'extérieur
  }
});

//favoris
document.addEventListener('DOMContentLoaded', () => {
    const favorisCountElement = document.querySelector('.count');
    const favorisListContainer = document.querySelector('#favoris-list-container');
    const afficherFavorisButton = document.querySelector('#afficher-favoris');
    const favorisList = document.querySelector('#favoris-list');
    const modal = document.querySelector('#favoris-modal');
    const closeModalButton = document.querySelector('#close-modal');

    // Fonction pour mettre à jour le compteur de favoris
    function updateFavorisCount() {
        const favoris = JSON.parse(localStorage.getItem('favoris')) || [];
        favorisCountElement.textContent = favoris.length;
    }

    // Afficher la liste des produits favoris dans le modal
    afficherFavorisButton.addEventListener('click', (e) => {
        e.preventDefault(); // Empêcher le comportement par défaut du lien
        afficherFavoris(); // Charger les favoris
        modal.style.display = "block"; // Afficher le modal
    });

    // Récupérer et afficher tous les produits favoris depuis le localStorage
    function afficherFavoris() {
        const favoris = JSON.parse(localStorage.getItem('favoris')) || [];
        favorisList.innerHTML = ''; // Vider la liste
        if (favoris.length > 0) {
            favoris.forEach(favori => {
                favorisList.innerHTML += `
                    <li>
                        ${favori.nom}
                        <button class="remove-favoris" data-produit-id="${favori.id}">Supprimer</button>
                    </li>
                `;
            });

            // Ajouter un gestionnaire d'événements pour supprimer un produit des favoris
            document.querySelectorAll('.remove-favoris').forEach(button => {
                button.addEventListener('click', function () {
                    const produitId = this.dataset.produitId;
                    supprimerFavoris(produitId);
                });
            });
        } else {
            favorisList.innerHTML = '<li>Aucun produit dans les favoris.</li>';
        }
    }

    // Supprimer un produit des favoris
    function supprimerFavoris(produitId) {
        const favoris = JSON.parse(localStorage.getItem('favoris')) || [];
        const nouveauxFavoris = favoris.filter(favori => favori.id !== produitId);
        localStorage.setItem('favoris', JSON.stringify(nouveauxFavoris));

        // Mettre à jour la liste et le compteur
        updateFavorisCount();
        afficherFavoris();
    }

    // Fermer le modal
    closeModalButton.addEventListener('click', () => {
        modal.style.display = "none"; // Masquer le modal
    });

    // Fermer le modal si l'utilisateur clique à l'extérieur du modal
    window.addEventListener('click', (e) => {
        if (e.target === modal) {
            modal.style.display = "none";
        }
    });

    // Initialiser le compteur de favoris au chargement
    updateFavorisCount();
});

//panier
document.addEventListener('DOMContentLoaded', function () {
    const cartModal = document.getElementById('cartDisplayModal');
    const cartItemsContainer = document.querySelector('.cart-items');
    const cartTotal = document.getElementById('cartTotal');
    const cartCount = document.getElementById('panierCount');
    const afficherPanier = document.getElementById('afficher-panier');
    const closeCartModal = cartModal.querySelector('.close');

    // Récupérer et enregistrer le panier depuis/vers localStorage
    const getCart = () => JSON.parse(localStorage.getItem('cart')) || [];
    const saveCart = (cart) => localStorage.setItem('cart', JSON.stringify(cart));

    // Mettre à jour le compteur
    const updateCartCount = () => {
        const cart = getCart();
        const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
        cartCount.textContent = totalItems;
    };

    // Calculer le total
    const calculateTotal = () => {
        const cart = getCart();
        const total = cart.reduce((sum, item) => sum + item.quantity * item.price, 0);
        cartTotal.textContent = total;
    };

    // Afficher les produits du panier
    const displayCartItems = () => {
        const cart = getCart();
        cartItemsContainer.innerHTML = '';

        if (cart.length === 0) {
            cartItemsContainer.innerHTML = '<p>Votre panier est vide.</p>';
            cartTotal.textContent = '0';
            return;
        }

        cart.forEach(item => {
            const cartItem = document.createElement('div');
            cartItem.classList.add('cart-item');
            cartItem.innerHTML = `
                <img src="${item.image}" alt="${item.name}">
                <div class="cart-item-info">
                    <p>${item.name}</p>
                    <p>${item.quantity} x ${item.price} Fcfa</p>
                </div>
                <button class="btn-remove" data-id="${item.id}">Supprimer</button>
            `;
            cartItemsContainer.appendChild(cartItem);

            // Ajouter l'événement pour supprimer
            cartItem.querySelector('.btn-remove').addEventListener('click', function () {
                removeCartItem(item.id);
            });
        });

        // Mettre à jour le total
        calculateTotal();
    };

    // Supprimer un produit du panier avec confirmation
    const removeCartItem = (id) => {
    if (confirm("Êtes-vous sûr de vouloir supprimer ce produit du panier ?")) {
        let cart = getCart();
        cart = cart.filter(item => item.id !== id);
        saveCart(cart);
        updateCartCount();
        displayCartItems();
    }
};


    // Ouvrir le modal
    afficherPanier.addEventListener('click', function (e) {
        e.preventDefault();
        displayCartItems();
        cartModal.style.display = 'flex';
    });

    // Fermer le modal
    closeCartModal.addEventListener('click', function () {
        cartModal.style.display = 'none';
    });

    // Fermer en cliquant en dehors
    window.addEventListener('click', function (event) {
        if (event.target === cartModal) {
            cartModal.style.display = 'none';
        }
    });

    // Mettre à jour le compteur au chargement
    updateCartCount();
});

</script>

  </header>

  @yield('content')

   <!--FOOTER-->
{{--
   <footer>


    <div class="footer-bottom">

      <div class="container">
        <p class="copyright">
          Copyright &copy; <a href="#">Livraison Sharp</a> all rights reserved.
        </p>

      </div>

    </div>

  </footer> --}}



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


