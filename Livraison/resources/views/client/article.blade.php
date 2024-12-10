@extends('partials.nav_client')
@section('content')
<main>
    <div class="product-container">
        <div class="container">
            <div class="product-box">
                <div class="product-main">
                    <div class="product-grid">
                        @foreach ($categories as $categorie)
                            <div class="cat">
                                <h3>{{ $categorie->nom }}</h3>
                                <div class="showcase">
                                    @if(isset($productsByCategory[$categorie->id]) && count($productsByCategory[$categorie->id]) > 0)
                                        @foreach($productsByCategory[$categorie->id] as $produit)
                                            <div class="showcase-banner">
                                                <img src="{{ asset('storage/'.$produit->image) }}" alt="{{ $produit->nom }}" width="300">
                                                <div class="showcase-actions">
                                                    <button class="btn-action btn-heart"
                                                            data-produit-id="{{ $produit->id }}"
                                                            data-produit-nom="{{ $produit->nom }}">
                                                        <ion-icon name="heart-outline"></ion-icon>
                                                    </button>
                                                    <a href="{{route('produit.detail', $produit->id)}}" class="btn-action btn-view">
                                                        <ion-icon name="eye-outline"></ion-icon>
                                                    </a>
                                                    <button class="btn-action btn-add"
                                                            data-id="{{ $produit->id }}"
                                                            data-name="{{ $produit->nom }}"
                                                            data-price="{{ $produit->prix }}"
                                                            data-description="{{ $produit->description }}"
                                                            data-image="{{ asset('storage/'.$produit->image) }}">
                                                        <ion-icon name="bag-add-outline"></ion-icon>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="showcase-content">
                                                <a href="#" class="showcase-category">{{ $produit->nom }}</a>
                                                <h3>
                                                    <a href="#" class="showcase-title">{{ $produit->description }}</a>
                                                </h3>
                                                <div class="price-box">
                                                    <p class="price">{{ $produit->prix }} Fcfa</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <p>Aucun produit disponible dans cette catégorie.</p>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="cartModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="modal-body">
                <img id="modalImage" src="" alt="Produit" class="modal-image">
                <p id="modalName"></p>
                <p id="modalDescription"></p>
                <p id="modalPrice"></p>
                <label for="modalQuantity">Quantité :</label>
                <input type="number" id="modalQuantity" min="1" value="1" class="quantity-input">
                <button id="confirmAddToCart" class="btn-confirm">Ajouter au Panier</button>
            </div>
        </div>
    </div>

    <style>
    /* Modal Styles */
    .modal {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.6);
        justify-content: center;
        align-items: center;
    }
    .modal-content {
        background: white;
        padding: 20px;
        border-radius: 8px;
        max-width: 500px;
        width: 90%;
        text-align: center;
    }
    .close {
        float: right;
        font-size: 20px;
        font-weight: bold;
        cursor: pointer;
    }
    .modal-body img {
        width: 150px; /* Taille réduite de l'image */
        height: auto;
        border-radius: 8px;
        margin-bottom: 15px;
    }
    .modal-body p {
        margin: 10px 0;
    }
    .btn-confirm {
        background-color: #28a745;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    .btn-confirm:hover {
        background-color: #218838;
    }
    .quantity-input {
        width: 60px;
        padding: 5px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 4px;
        text-align: center;
    }
    .cart-counter {
        position: fixed;
        top: 10px;
        right: 10px;
        font-size: 18px;
        font-weight: bold;
        background-color: #f8d7da;
        padding: 10px;
        border-radius: 5px;
    }
    </style>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const cartCountElement = document.getElementById('cartCount');
        const buttonsAdd = document.querySelectorAll('.btn-add');
        const modal = document.getElementById('cartModal');
        const closeModal = modal.querySelector('.close');
        const modalImage = document.getElementById('modalImage');
        const modalName = document.getElementById('modalName');
        const modalDescription = document.getElementById('modalDescription');
        const modalPrice = document.getElementById('modalPrice');
        const modalQuantity = document.getElementById('modalQuantity');
        const confirmAddToCart = document.getElementById('confirmAddToCart');

        let selectedProduct = null; // Déclare la variable ici

        const getCart = () => JSON.parse(localStorage.getItem('cart')) || [];
        const saveCart = (cart) => localStorage.setItem('cart', JSON.stringify(cart));

        const updateCartCount = () => {
            const cart = getCart();
            const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
            if (cartCountElement) {
                cartCountElement.textContent = totalItems;
            }
        };

        updateCartCount();

        buttonsAdd.forEach(button => {
            button.addEventListener('click', function () {
                selectedProduct = { // Met à jour selectedProduct
                    id: this.dataset.id,
                    name: this.dataset.name,
                    price: this.dataset.price,
                    description: this.dataset.description,
                    image: this.dataset.image
                };
                modalImage.src = selectedProduct.image;
                modalName.textContent = `Nom : ${selectedProduct.name}`;
                modalDescription.textContent = `Description : ${selectedProduct.description}`;
                modalPrice.textContent = `Prix : ${selectedProduct.price} Fcfa`;
                modalQuantity.value = 1;
                modal.style.display = 'flex';
            });
        });

        confirmAddToCart.addEventListener('click', function () {
            const quantity = parseInt(modalQuantity.value, 10);
            if (isNaN(quantity) || quantity < 1) {
                alert('Veuillez entrer une quantité valide.');
                return;
            }
            const cart = getCart();
            const existingProductIndex = cart.findIndex(item => item.id === selectedProduct.id);
            if (existingProductIndex !== -1) {
                cart[existingProductIndex].quantity += quantity;
            } else {
                cart.push({
                    id: selectedProduct.id,
                    name: selectedProduct.name,
                    price: selectedProduct.price,
                    description: selectedProduct.description,
                    image: selectedProduct.image,
                    quantity: quantity
                });
            }
            saveCart(cart);
            updateCartCount();
            alert('Produit ajouté au panier.');
            modal.style.display = 'none';
        });

        closeModal.addEventListener('click', function () {
            modal.style.display = 'none';
        });

        window.addEventListener('click', function (event) {
            if (event.target === modal) {
                modal.style.display = 'none';
            }
        });
    });
    //favoris

document.addEventListener('DOMContentLoaded', () => {
    const favorisCountElement = document.querySelector('.count');

    // Fonction pour mettre à jour le compteur de favoris
    function updateFavorisCount() {
        const favoris = JSON.parse(localStorage.getItem('favoris')) || [];
        favorisCountElement.textContent = favoris.length;
    }

    // Ajouter un produit aux favoris
    function ajouterAuxFavoris(produitId, produitNom) {
        const favoris = JSON.parse(localStorage.getItem('favoris')) || [];

        // Vérifier si le produit est déjà dans les favoris
        if (!favoris.some(favori => favori.id === produitId)) {
            favoris.push({ id: produitId, nom: produitNom });
            localStorage.setItem('favoris', JSON.stringify(favoris));

            // Afficher un message de succès
            alert('Produit ajouté aux favoris avec succès!');

            updateFavorisCount(); // Mettre à jour le compteur de favoris
        } else {
            alert('Ce produit est déjà dans vos favoris.');
        }
    }

    // Attacher les événements sur les boutons "Ajouter aux favoris"
    document.querySelectorAll('.btn-heart').forEach(button => {
        button.addEventListener('click', function () {
            const produitId = this.dataset.produitId;
            const produitNom = this.dataset.produitNom; // Assurez-vous que le nom du produit est passé ici
            ajouterAuxFavoris(produitId, produitNom);
        });
    });

    // Initialiser le compteur de favoris au chargement
    updateFavorisCount();
});
    </script>
</main>
@endsection
