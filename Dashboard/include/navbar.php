 <!-- Sidebar -->
 <ul class="navbar-nav bg-dark  sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="http://localhost/projet1/dashboard/dashboard.php?id=<?php echo $_SESSION['user_id']; ?>">
    <div class="sidebar-brand-icon rotate-n-15">
    <i class="fa fa-certificate" ></i>
    </div>
    <div class="sidebar-brand-text mx-3">GT <sup>0.1</sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="http://localhost/projet1/dashboard/dashboard.php?id=<?php echo $_SESSION['user_id']; ?>">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Gestions 
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fa fa-book" aria-hidden="true"></i>
        <span>Formation</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Gestion De Formation:</h6>
            <a class="collapse-item" href="http://localhost/projet1/dashboard/Gestion_Formation/ajouter_formation.php?id=<?php echo $_SESSION['user_id']; ?>">Ajouter De Formation</a>
            <a class="collapse-item" href="http://localhost/projet1/dashboard/Gestion_Formation/liste_formation.php?id=<?php echo $_SESSION['user_id']; ?>">Liste Des Formations</a>
        </div>
    </div>
</li>



<hr class="sidebar-divider">



<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fa fa-users" aria-hidden="true"></i>
        <span>Formateur</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Gestion Formateur</h6>
            <a class="collapse-item" href="http://localhost/projet1/dashboard/Gestion_Formateur/ajouter_formateur.php?id=<?php echo $_SESSION['user_id']; ?>">Ajouter de Formateur</a>
            <a class="collapse-item" href="http://localhost/projet1/dashboard/Gestion_Formateur/liste_formateur.php?id=<?php echo $_SESSION['user_id']; ?>">Liste de Formateur</a>
            
        </div>
    </div>
</li>

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCandidat"
        aria-expanded="true" aria-controls="collapseCandidat">
        <i class="fa fa-users" aria-hidden="true"></i>
        <span>Candidat</span>
    </a>
    <div id="collapseCandidat" class="collapse" aria-labelledby="headingCandidat"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Gestion Candidat</h6>
            <a class="collapse-item" href="http://localhost/projet1/dashboard/Gestion_condidat/liste_inscription.php?id=<?php echo $_SESSION['user_id']; ?>">Liste des inscriptions</a>
            <a class="collapse-item" href="http://localhost/projet1/dashboard/Gestion_condidat/liste_condidat.php?id=<?php echo $_SESSION['user_id']; ?>">Liste des Candidats</a>
            
        </div>
    </div>
</li>



<!-- Divider -->
<hr class="sidebar-divider">


<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
        aria-expanded="true" aria-controls="collapsePages">
        <i class="fa fa-hashtag" aria-hidden="true"></i>
        <span>Module</span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Gestion Module</h6>
            <a class="collapse-item" href="http://localhost/projet1/dashboard/Gestion_Module/ajouter_module.php?id=<?php echo $_SESSION['user_id']; ?>">Ajouter De Module</a>
            <a class="collapse-item" href="http://localhost/projet1/dashboard/Gestion_Module/liste_module.php?id=<?php echo $_SESSION['user_id']; ?>">Liste De Module</a>
          
        </div>
    </div>
</li>




<hr class="sidebar-divider">

<!-- Nav Item - Charts -->
<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive"
        aria-expanded="true" aria-controls="collapseFive">
        <i class="fa fa-user" aria-hidden="true"></i>
        <span>Utilisateur</span>
    </a>
    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Gestion Utilisateur:</h6>
            <a class="collapse-item" href="http://localhost/projet1/dashboard/Gestion_Utilisateur/ajouter_utilisateur.php?id=<?php echo $_SESSION['user_id']; ?>">Ajouter De Utilisateur</a>
            <a class="collapse-item" href="http://localhost/projet1/dashboard/Gestion_Utilisateur/liste_utilisateur.php?id=<?php echo $_SESSION['user_id']; ?>">Liste Des Utilisateur</a>
        </div>
    </div>
</li>

<hr class="sidebar-divider">


<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSix"
        aria-expanded="true" aria-controls="collapseSix">
        <i class="fa fa-plus-square" aria-hidden="true"></i>
        <span>Actualite</span>
    </a>
    <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Gestion Actualite</h6>
            <a class="collapse-item" href="http://localhost/projet1/dashboard/Gestion_Actualite/ajouter-actualite.php?id=<?php echo $_SESSION['user_id']; ?>">Ajouter De Actualite</a>
            <a class="collapse-item" href="http://localhost/projet1/dashboard/Gestion_Actualite/liste_Actualite.php?id=<?php echo $_SESSION['user_id']; ?>">Liste Des Actualite</a>
        </div>
    </div>
</li>



<hr class="sidebar-divider">


<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSeven"
        aria-expanded="true" aria-controls="collapseSeven">
        <i class="fa fa-star" aria-hidden="true"></i>
        <span>Avis</span>
    </a>
    <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Gestion Avis:</h6>
            <a class="collapse-item" href="http://localhost/projet1/dashboard/Gestion_Avis/liste_avis.php?id=<?php echo $_SESSION['user_id']; ?>">Liste Des Avis</a>
        </div>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseteen"
        aria-expanded="true" aria-controls="collapseteen">
        <i class="fa fa-star" aria-hidden="true"></i>
        <span>Agent</span>
    </a>
    <div id="collapseteen" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Gestion Agent</h6>
            <a class="collapse-item" href="http://localhost/projet1/dashboard/Gestion_agent/ajouter_agent.php?id=<?php echo $_SESSION['user_id']; ?>">Ajouter Agent</a>
            <a class="collapse-item" href="http://localhost/projet1/dashboard/Gestion_agent/liste_agent.php?id=<?php echo $_SESSION['user_id']; ?>">Liste Des Agent</a>

        </div>
    </div>
</li>



<!-- Nav Item - Tables -->


<!-- Sidebar Message -->


</ul>
<!-- End of Sidebar -->