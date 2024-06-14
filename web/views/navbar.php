<div class="header-bottom">
      <div class="container">

        <a href="#" class="logo">
          <img src="./assets/images/logarxa1.png" alt="Homeverse logo"> 
        </a>

        <nav class="navbar" data-navbar>

          <div class="navbar-top">

            <a href="#" class="logo">
              <img src="./assets/images/logo.png" alt="Homeverse logo">
              
            </a>

            <button class="nav-close-btn" data-nav-close-btn aria-label="Close Menu">
              <ion-icon name="close-outline"></ion-icon>
            </button>

          </div>

          <div class="navbar-bottom">
            <ul class="navbar-list">

              <li>
                <a href="#home" class="navbar-link" data-nav-link>Home</a>
              </li>

              <li>
                <a href="#about" class="navbar-link" data-nav-link>Sobre Nosotros</a>
              </li>

              <li>
                <a href="#service" class="navbar-link" data-nav-link>Servicios</a>
              </li>

              <li>
                <a href="#property" class="navbar-link" data-nav-link>Propiedades</a>
              </li>

              <li>
                <a href="#blog" class="navbar-link" data-nav-link>Blog</a>
              </li>

              <li>
                <a href="#contact" class="navbar-link" data-nav-link>Contacto</a>
              </li>

            </ul>
          </div>

        </nav>

        <div class="header-bottom-actions">

          <!-- <button class="header-bottom-actions-btn" aria-label="Search">
            <ion-icon name="search-outline"></ion-icon>

            <span>Search</span>
          </button> -->

          <button class="header-bottom-actions-btn" aria-label="Profile">
            <ion-icon name="person-outline"></ion-icon>

            <span>Profile</span>
          </button>
          <button class="header-top-btn"  onclick="enviandoLogin()">Iniciar Sesion</button>

          <script>
            function enviandoLogin(){
            window.location.href="http://localhost/arxatec/sistema/login/index.php";
            console.log("Si esta enviando al login")
            }

          </script>
          <!-- <button class="header-bottom-actions-btn" aria-label="Cart">
            <ion-icon name="cart-outline"></ion-icon>

            <span>Cart</span>
          </button> -->

          <button class="header-bottom-actions-btn" data-nav-open-btn aria-label="Open Menu">
            <ion-icon name="menu-outline"></ion-icon>

            <span>Menu</span>
          </button>

        </div>

      </div>
    </div>
