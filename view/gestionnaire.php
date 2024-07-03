<main>
    <nav>
        <div class="nav-content">
            <div class="logo-position">
                <div class="logo-img">
                    <img src="img/estd1975.gif" alt="logo" >
                </div>
            </div>
            <div class="nav-buttons">
                <p>bienvenue, <?php echo $_SESSION["idClient"]; ?> ! - <a href="index.php?objet=Client&action=disconnect"> déconnexion </a></p>
                <a class="nav-button" href="index.php?objet=Pizza&action=displayCreationForm">creer Pizza</a>
                <a class="nav-button" href="index.php?objet=Pizza&action=displayPizza">Les Pïzza</a>
                <a class="nav-button" href="index.php?objet=Statistique&action=displayAll">Statistiques</a>
                <a class="nav-button" href="index.php?objet=Stock&action=displayStock">Stock</a>
                <a class="nav-button" href="index.php?objet=Alerte&action=displayAll">Alerte</a>


            </div>
    </nav>

    <div class="background-image">
        <div class="footer-acceuil">
            <div class="text-container">
                <img src="logo1.png" alt="Logo 1">
                <p>Texte </p>
            </div>
            <div class="text-container">
                <img src="logo2.png" alt="Logo 2">
                <p>lol</p>
            </div>
            <div class="text-container">
                <img src="logo3.png" alt="Logo 3">
                <p>Salut </p>
            </div>
            <div class="text-container">
                <img src="logo4.png" alt="Logo 4">
                <p>hello </p>
            </div>
        </div>

        <!-- L'image d'arrière-plan sera définie dans le CSS -->
    </div>





    <div class="container-acceuil">
        <img src="img/btm-img1.png" alt="Casa di Roma logo" class="logo">
        <div class="description">
            <p class="pizza-dough">La pâte de nos pizzas est élaborée selon<br>une recette avec des ingrédients de qualité.</p>
            <p class="pizza-preparation">Elle est pétrie puis cuite chaque jour<br>par nos pizzaiolos.</p>
            <p class="cta">Découvrez tous les délicieux produits<br>proposés par Samy</p>
            <button class="order-button">Commander</button>
        </div>
    </div>

    <div class="image-container">
        <div class="text-container-end">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 pull-right">
                <h1>Avec Notre Programme Note Me</h1>
                <p>Aprés chaque commande nos clients peuvent donner leur avis</p>
                <img src="img/star-2.png" alt="icon"> <img src="img/star-2.png" alt="icon"> <img src="img/star-2.png" alt="icon"> <img src="img/star-2.png" alt="icon"> <img src="img/star-2.png" alt="icon">
                <div class="lr_ev_img_cont_wrapper">
                    <div class="ctaBtn"><a href="votre-appreciation.php">Plus de détails</a></div>
                </div>
            </div>
        </div>
    </div>

</main>
