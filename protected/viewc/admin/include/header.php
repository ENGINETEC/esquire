<div id="preloader-container">
    <div class="preloader-wrapper big active">
        <div class="spinner-layer spinner-white-only">
            <div class="circle-clipper left">
                <div class="circle"></div>
            </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
        </div>
    </div>
</div>
<header>
    <div class="container"><a href="#" data-activates="nav-mobile" class="button-collapse top-nav waves-effect waves-light circle hide-on-large-only"><i class="mdi-navigation-menu"></i></a></div>
    <ul id="nav-mobile" class="side-nav fixed">
        <li class="logo">
            <a id="logo-container" href="#" class="brand-logo">
                <img src="<?php echo Doo::conf()->APP_URL; ?>global/img/logo.png" alt="logo">
            </a>
        </li>
        <li class="bold <?php if(isset($data['slug']) && $data['slug']=='home') echo 'active'; ?>"><a href="<?php echo Doo::conf()->APP_URL; ?>ionadmin/index" class="waves-effect waves-esquire">Home</a></li>
        <li class="bold"><a href="<?php echo Doo::conf()->APP_URL; ?>ionadmin/eventos" class="waves-effect waves-esquire">Ver eventos</a></li>
        <li class="bold"><a href="<?php echo Doo::conf()->APP_URL; ?>" class="waves-effect waves-esquire">Salir</a></li>
        <li class="bold no-effect"><a class="waves-effect"><i class="fa fa-instagram"></i>Esquire_latinoamerica</a></li>
        <li class="bold no-effect"><a class="waves-effect"><i class="fa fa-facebook"></i>EsquireLat</a></li>
        <li class="bold no-effect"><a class="waves-effect"><i class="fa fa-twitter"></i>@esquirelat</a></li>
    </ul>
</header>