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

                                                        <button class="btn-action btn-heart" data-produit-id="{{ $produit->id }}" data-produit-nom="{{ $produit->nom }}">
                                                            <ion-icon name="heart-outline"></ion-icon>
                                                        </button>


                                                        <a href="{{route('produit.detail', $produit->id)}}" class="btn-action btn-view">
                                                            <ion-icon name="eye-outline"></ion-icon>
                                                        </a>

                                                        <button class="btn-action btn-add" data-id="{{ $produit->id }}" data-name="{{ $produit->nom }}" data-price="{{ $produit->prix }}" data-description="{{ $produit->description }}" data-image="{{ asset('storage/'.$produit->image) }}">
                                                            <ion-icon name="bag-add-outline"></ion-icon>
                                                        </button>

                                                    </div>
                                                </div>

                                                <div class="showcase-content"  data-id="{{ $produit->id }}" data-name="{{ $produit->nom }}" data-price="{{ $produit->prix }}" data-description="{{ $produit->description }}" data-image="{{ asset('storage/'.$produit->image) }}">

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
        <div id="modal" class="modal">
            <div class="modal-content">
              <span class="close">&times;</span>
              <h2 id="modal-product-name"></h2>
              <p id="modal-product-description"></p>
              <p>Prix : <span id="modal-product-price"></span>Fcfa</p>
              <input id="modal-quantity" type="number" min="1" value="1">
              <button id="modal-btn-add">Ajouter au panier</button>
            </div>
          </div>

          <div class="cart">
            <h1>Mon panier</h1>
            <ul id="cart-items"></ul>
            <p id="total-price">Total : 0Fcfa</p>
          </div>

          <style>
            /* Modal */
            .modal {
              display: none; /* Caché par défaut */
              position: fixed;
              z-index: 1000;
              left: 0;
              top: 0;
              width: 100%;
              height: 100%;
              background-color: rgba(0, 0, 0, 0.5);
            }

            .modal-content {
              background-color: white;
              margin: 15% auto;
              padding: 20px;
              width: 80%;
              max-width: 400px;
              border-radius: 5px;
              text-align: center;
            }

            .close {
              color: #aaa;
              float: right;
              font-size: 28px;
              cursor: pointer;
            }
            </style>
<script>
document.addEventListener("DOMContentLoaded", () => {
// document.getElementById("modal").style.display = "block";

let cart = [];

// Sélection des éléments du modal
const modal = document.getElementById("modal");
const modalProductName = document.getElementById("modal-product-name");
const modalProductDescription = document.getElementById("modal-product-description");
const modalProductPrice = document.getElementById("modal-product-price");
const modalQuantity = document.getElementById("modal-quantity");
const modalAddToCart = document.getElementById("modal-btn-add");

document.querySelector(".close").addEventListener("click", () => {
  modal.style.display = "none";
});

// Fonction pour mettre à jour l'affichage du panier
function updateCart() {
  const cartItems = document.getElementById("cart-items");
  const totalPrice = document.getElementById("total-price");

  cartItems.innerHTML = ""; // Réinitialiser les articles
  let total = 0;

  cart.forEach(item => {
    const li = document.createElement("li");
    li.textContent = `${item.name} : ${item.price}Fcfa x ${item.quantity}`;
    cartItems.appendChild(li);
    total += item.price * item.quantity;
  });

  totalPrice.textContent = `Total : ${total}Fcfa`;
}

// Fonction pour afficher le modal avec les infos du produit
function openModal(product) {
  modalProductName.textContent = product.name;
  modalProductDescription.textContent = product.description;
  modalProductPrice.textContent = product.price;
  modalQuantity.value = 1; // Réinitialiser la quantité
  modal.style.display = "block";

  modalAddToCart.onclick = () => {
    const quantity = parseInt(modalQuantity.value, 10);
    btnAdd({ ...product, quantity });
    modal.style.display = "none";
  };
}

// Fonction pour ajouter un produit au panier
function btnAdd(product) {
  const existingProduct = cart.find(item => item.id === product.id);
  if (existingProduct) {
    existingProduct.quantity += product.quantity;
  } else {
    cart.push(product);
  }
  updateCart();
}

// Ajout d'un écouteur sur les boutons "Ajouter au panier"
document.querySelectorAll(".btn-add").forEach(button => {
  button.addEventListener("click", event => {
    const button = event.currentTarget;

    const product = {
      id: button.dataset.id,
      name: button.dataset.name,
      price: parseFloat(button.dataset.price),
      description: button.dataset.description,
      image: button.dataset.image,
    };
    // console.log("Produit cliqué :", product); // Vérifiez les données du produit
    openModal(product);
  });
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
