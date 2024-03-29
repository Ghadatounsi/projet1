<!doctype html>
<html>
<header>
<title>acceuil</title>
</header>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<style>
        .navbar {
          --bs-navbar-color: rgb(255 255 255) !important;
          --bs-navbar-hover-color: #FFC107 !important;
        }
    </style>
</head>
<body>
<!--Div1-->
    <header>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg bg-dark ">
          <div class="container-fluid">
            <button
              data-mdb-collapse-init
              class="navbar-toggler"
              type="button"
              data-mdb-target="#navbarExample01"
              aria-controls="navbarExample01"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarExample01">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item active">
              <a class="nav-link" aria-current="page" href="../src/acceuil.php">Acceuil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../src/actualite.php">Actualite</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../src/avis.php">Avis</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../src/formateur.php">Formateur</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../src/formation.php">Formation</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../src/module.php">Module</a>
            </li>
            
              </ul>
            </div>
          </div>
        </nav>
        <!-- Navbar -->
      
        <div id="demo" class="carousel slide" data-bs-ride="carousel">

            <!-- Indicators/dots -->
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
              <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
              <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
            </div>
            <!-- The slideshow/carousel -->
            <div class="carousel-inner" style="padding-bottom: 5%;">
              <div class="carousel-item active">
                <img src="../assets/img/img4.jpg" alt="Los Angeles" class="d-block w-100" width="1800px" height="600px">
              </div>
              <div class="carousel-item">
                <img src="../assets/img/img2.jpg" alt="Chicago" class="d-block w-100" width="1800px" height="600px">
              </div>
              <div class="carousel-item">
                <img src="../assets/img/img1.jpg" alt="New York" class="d-block w-100" width="1800px" height="600px">
              </div>
            </div>
            

            <!-- Left and right controls/icons -->
            <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
              <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
              <span class="carousel-control-next-icon"></span>
            </button>
        </div>
          

      </header>




    <!-- div2-->
    <div class="row">
        <div class="col-xl-3">
            <div class="card" style="width: 18rem;">
                <img src="../assets/img/fonda.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">fondamenteau  et concepts essentiels</h5>
                  <p class="card-text">ce module fournit une base solide en introduisant les principaux concepts et théorie fondamentale du domaines . les participats acquerront une comprehension  approfondie des bases nesessaires pour aborder les sujet plus avancés de la formation</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
        </div>
        <div class="col-xl-3">
            <div class="card" style="width: 18rem;">
                <img src="../assets/img/ccc.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">approfendissement des compétences pratiques</h5>
                  <p class="card-text">les participants mettront en pratique les connaissence acquises dans le premier modue . a travers des etuds de cas ;des exercices pratiques et des simulations ; il renforcont leur copetences dans ds situations et developpement leur capacité à appliquer les concepts à appliques des situation réelles</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
        </div>
        <div class="col-xl-3">
            <div class="card" style="width: 18rem;">
                <img src="../assets/img/ddd.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">tratégies avancées et applications réelles </h5>
                  <p class="card-text">ce module explodes stratégie avancées et des techniques specialisées dans le domaine . les participants découvriront des methodes innovantes et des approches efficces pour résoudre des probléme complexe et relever des defits proffecionnels dans ds contextes réelles </p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
        </div>
        <div class="col-xl-3">
            <div class="card" style="width: 18rem;">
                <img src="../assets/img/dev.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">développements personel et leadership</h5>
                  <p class="card-text">les paricipents  se concentreront sur leur developpement personnel et leur leadership. ils expleront les copétence interpersonnelles ; la jestion de temps ;la resolutons des conlits et d'autre aspects essentiels por réussir dans leur carrièr et leur vie personnelle . </p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
        </div>
      </div>













      
    <div class="container-fluid mt-3">
        <h1> - nos differents prestations :</h1>
        <p class="text-bg-secondary">explorez nos differentes prestations conçue pour rependre à vos besoins spésifiques et vous accompagner tout au long de votre parcour d'apprentissage</p>
        
        <div class="row">
          <div class="col-xl-4 p-3  text-white">
            <img src="../assets/img/ppp.jpg" class="float-start" alt="Paris" width="304" height="236"> 

          </div>
          <div class="col-xl-8 p-3  text-white">
         <div class="card" style="width: 50rem; height: 18rem;">   
                <div class="card-body">
                  <h5 class="card-title"> 1-i :</h5>
                  <p class="card-text">- découvrir comment </p>
                  <p class="card-text">-  - Cours théoriques : Sessions structurées présentant les concepts, les principes et les théories pertinents de manière didactique et interactive </p>
                  <p class="card-text">- .</p> 
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>








    <div class="container-fluid mt-3">
        <h1></h1>
        <p class="text-bg-secondary"></p>
        
        <div class="row">
            <div class="col-xl-8 p-3  text-white">
                <div class="card" style="width: 50rem; height: 18rem;">   
                    <div class="card-body">
                         <h5 class="card-title"> 2-Suivi et soutien :</h5>
                         <p class="card-text"> -  Réponses aux questions et clarifications : Disponibilité d'un formateur ou d'un tuteur pour répondre aux questions et clarifier les points de confusion tout au long de la formation. Réponses aux questions et clarifications : Disponibilité d'un formateur ou d'un tuteur pour répondre aux questions et clarifier les points de confusion tout au long de la formation.</p>
                         <p class="card-text"> - .</p>
                         <p class="card-text"> - </p>

                    </div>
                 </div>
            </div>
            <div class="col-xl-4 p-3  text-white">
                <img src="../assets/img/hi.jpg" class="float-start" alt="Paris" width="304" height="236"> 

            </div>
        </div>
      </div>
    </div>




    <div class="container-fluid mt-3">
        <h1></h1>
        <p class="text-bg-secondary"></p>
        
        <div class="row">
          <div class="col-xl-4 p-3  text-white">
            <img src="../assets/img/hii.jpg" class="float-start" alt="Paris" width="304" height="236"> 

          </div>
          <div class="col-xl-8 p-3  text-white">
         <div class="card" style="width: 50rem; height: 18rem;">   
                <div class="card-body">
                  <h5 class="card-title">3-Évaluation et certification :</h5>
                  <p class="card-text">- - Feedback sur la performance et les progrès : Retours réguliers aux participants sur leurs performances et leurs points forts, ainsi que des conseils pour s'améliorer. </p>
                  <p class="card-text">- </p>
                  <p class="card-text"> -</p>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>



    <div class="container-fluid mt-3">
        <h1></h1>
        <p class="text-bg-secondary"></p>
        
        <div class="row">
            <div class="col-xl-8 p-3  text-white">
                <div class="card" style="width: 50rem; height: 18rem;">   
                    <div class="card-body">
                         <h5 class="card-title"> témoignages :</h5>
                         <p class="card-text">Plongez dans l'expérience de nos anciens élèves qui ont bénéficié de notre approche pédagogique immersive et pragmatique. Nos formations sont axées sur des ateliers pratiques et des études de cas pour une expérience d'apprentissage enrichissante-</p>
                        
                    </div>
                 </div>
            </div>
            <div class="col-xl-4 p-3  text-white">
                <img src="../assets/img/hiii.jpg" class="float-start" alt="Paris" width="304" height="236"> 

            </div>
        </div>
      </div>
    </div>


    <div class="container-fluid mt-3">
  <h1></h1>
  <p></p>
  <div class="row">
    <div class="col-xl-6 p-3  ">.
    <form style="width: 26rem;">
  <!-- Name input -->
  <div data-mdb-input-init class="form-outline mb-4">
    <input type="text" id="form4Example1" class="form-control" />
    <label class="form-label" for="form4Example1">Name</label>
  </div>

  <!-- Email input -->
  <div data-mdb-input-init class="form-outline mb-4">
    <input type="email" id="form4Example2" class="form-control" />
    <label class="form-label" for="form4Example2">Email address</label>
  </div>

  <!-- Message input -->
  <div data-mdb-input-init class="form-outline mb-4">
    <textarea class="form-control" id="form4Example3" rows="4"></textarea>
    <label class="form-label" for="form4Example3">Message</label>
  </div>

  <!-- Checkbox -->
  <div class="form-check d-flex justify-content-center mb-4">
    <input
      class="form-check-input me-2"
      type="checkbox"
      value=""
      id="form4Example4"
      checked
    />
    <label class="form-check-label" for="form4Example4">
      Send me a copy of this message
    </label>
  </div>

  <!-- Submit button -->
  <button data-mdb-ripple-init type="button" class="btn btn-primary btn-block mb-4">Send</button>
</form>
</div>
    <div class="col-xl-6 p-3 ">
    <div>
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d798.9211283820349!2d10.9863945!3d36.7781352!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1302cba64e65462f%3A0x493c615438a95c5a!2sInir!5e0!3m2!1sfr!2stn!4v1711625051492!5m2!1sfr!2stn" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </div>
    </div>
  </div>
</div>







    <?php include("../includes/footer.php") ?>



   <!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/style.js"></script>

</body>
</html>