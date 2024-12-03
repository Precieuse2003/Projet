@extends('partials.nav_client')

@section('content')
<main>
    <div class="affichage">
        <h1>Mon panier</h1>

        <div id="cart-summary">
            <!-- Le contenu du panier sera inséré ici via JavaScript -->
        </div>
        <div class="button-container">
        <button id="btn-order">Passer commande</button>
        <button id="btn-clear-cart">Vider le panier</button>
        </div>

        </div>

    <!-- Modal -->
    <div id="order-modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Total du panier</h2>
            <p id="modal-total-price">Total : 0 Fcfa</p>
            <div class="button-container">
            <button id="modal-btn-order" type="submit">Valider</button>
            </div>
        </div>
    </div>
</main>

<style>
    /* Modal Styles */

    .affichage {
    width: 35%; /* Largeur du cadre */
    margin: 200px; /* Centrage horizontal */
    margin-right: 100px;
    padding: 20px; /* Espacement interne */
    border: 2px solid #ccc; /* Bordure */
    border-radius: 10px;
    background-color: #f9f9f9; /* Couleur de fond */
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); /* Ombre pour l'effet de cadre */
    position: relative;
    top: 50%;
    transform: translateY(-50%);
}
 h1{
    text-align: center;
}

#btn-order {
    background-color: #28a745;
    color: white;
    border: none;
    padding: 10px 20px;
    margin-left: 5px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s;
}

#btn-order:hover {
    background-color: #218838;
}

#btn-clear-cart {
    background-color: #dc3545;
    color: white;
    border: none;
    padding: 10px 20px;
    margin-right: 5px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s;
    onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?');
}

#clear-cart:hover {
    background-color: #c82333; /* Couleur plus foncée au survol */
}

    .modal {
        display: none;
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
    .button-container {
    display: flex;
    justify-content: space-between;
    gap: 10px;
    margin-top: 30px;
}

#modal-btn-order {
    background-color: #28a745;
    color: white;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s;
}

#modal-btn-order:hover {
    background-color: #218838;
}

#modal-btn-clear-cart {
    background-color: #dc3545;
    color: white;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s;
}

#modal-btn-clear-cart:hover {
    background-color: #c82333;
}

</style>

<script>
document.addEventListener("DOMContentLoaded", () => {
    let cart = JSON.parse(localStorage.getItem("cart")) || [];

    // Sélection des éléments du DOM
    const cartSummary = document.getElementById("cart-summary");
    const modal = document.getElementById("order-modal");
    const modalCartItems = document.getElementById("modal-cart-items");
    const modalTotalPrice = document.getElementById("modal-total-price");
    const btnOrder = document.getElementById("btn-order");
    const btnClearCart = document.getElementById("btn-clear-cart");
    const closeModal = modal.querySelector(".close");
    const modalBtnOrder = document.getElementById("modal-btn-order");
    const modalBtnClearCart = document.getElementById("modal-btn-clear-cart");

    // Fonction pour afficher le panier
    function displayCart() {
        cartSummary.innerHTML = "";
        if (cart.length === 0) {
            cartSummary.textContent = "Votre panier est vide.";
            return;
        }

        const ul = document.createElement("ul");
        let total = 0;
        cart.forEach(item => {
            const li = document.createElement("li");
            li.textContent = `${item.name} : ${item.price} Fcfa x ${item.quantity}`;
            ul.appendChild(li);
            total += item.price * item.quantity;
        });

        const totalP = document.createElement("p");
        totalP.textContent = `Total : ${total} Fcfa`;

        cartSummary.appendChild(ul);
        cartSummary.appendChild(totalP);
    }

    // Fonction pour afficher le modal
    function openModal() {
    let total = 0;

    // Calculer le total du panier
    cart.forEach(item => {
        total += item.price * item.quantity;
    });

    // Mettre à jour le texte du total dans le modal
    modalTotalPrice.textContent = `Total : ${total} Fcfa`;

    // Afficher le modal
    modal.style.display = "block";
}


    // Fermer le modal
    closeModal.onclick = () => {
        modal.style.display = "none";
    };

    // Vider le panier
    function clearCart() {
        cart = [];
        localStorage.removeItem("cart");
        displayCart();
        modal.style.display = "none";
        updateCart();

    }
    //supprimer un produit
    function removeProduct(productId) {
    cart = cart.filter(item => item.id !== productId);
    localStorage.setItem("cart", JSON.stringify(cart)); // Mettre à jour localStorage
    updateCart(); // Mettre à jour l'affichage
}


    // Ajouter les événements
    btnOrder.addEventListener("click", openModal);
    btnClearCart.addEventListener("click", clearCart);
    modalBtnClearCart.addEventListener("click", clearCart);
    modalBtnOrder.addEventListener("click", () => {
        alert("Commande confirmée !");
        clearCart();
    });

    // Afficher le panier au chargement de la page
    displayCart();
});
</script>
@endsection
