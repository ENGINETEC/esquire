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
        <li class="bold <?php if (isset($data['slug']) && $data['slug'] == 'home') echo 'active'; ?>"><a href="<?php echo Doo::conf()->APP_URL; ?>" class="waves-effect waves-esquire">Home</a></li>
        <li class="bold <?php if (isset($data['slug']) && $data['slug'] == 'programa') echo 'active'; ?>"><a href="<?php echo Doo::conf()->APP_URL; ?>programa" class="waves-effect waves-esquire">Programa</a></li>
        <li class="bold <?php if (isset($data['slug']) && $data['slug'] == 'encuestas') echo 'active'; ?>"><a href="#" class="waves-effect waves-esquire">Encuestas</a></li>
        <li class="bold <?php if (isset($data['slug']) && $data['slug'] == 'resultados') echo 'active'; ?>"><a href="#" class="waves-effect waves-esquire">Resultados</a></li>
        <li class="bold <?php if (isset($data['slug']) && $data['slug'] == 'website') echo 'active'; ?>"><a href="<?php echo Doo::conf()->APP_URL; ?>website" class="waves-effect waves-esquire">Website</a></li>
        <li class="bold <?php if (isset($data['slug']) && $data['slug'] == 'minisite') echo 'active'; ?>"><a href="#" class="waves-effect waves-esquire">Minisite</a></li>
        <li class="bold <?php if (isset($data['slug']) && $data['slug'] == 'issue') echo 'active'; ?>"><a href="#" class="waves-effect waves-esquire">Issue</a></li>
    </ul>
</header>