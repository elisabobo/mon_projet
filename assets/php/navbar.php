<nav>
<div class="nav_top">
    <div class="nav_toggle" id="nav-toggle">
        <i class="ri-menu-line nav_burger"></i>
        <i class="ri-close-line nav_close"></i>
    </div>
    <h1><a href="/index.php">Connais ton entreprise</a></h1>
</div>

<div class="nav_actions">
    <form class="form_recherche">
        <input type="search" id="searchInput" placeholder="<?= $t['nav']['rech']?>" />
        <button type="submit">
            <span class="fas fa-search"></span>
        </button>
        <div class="result-box">
          <ul id="suggestions"></ul>
        </div>
    </form>
    <ul class="nav-item" id="nav-menu">
        <li class="lang-switcher">
          <a href="/lang.php?lang=fr" >🇫🇷</a>
          <a href="/lang.php?lang=en">🇬🇧</a>
        </li>
    </ul>
</div>
</nav>
