<nav>
<div class="nav_top">
    <div class="nav_toggle" id="nav-toggle">
        <i class="ri-menu-line nav_burger"></i>
        <i class="ri-close-line nav_close"></i>
    </div>
    <h1><a href="/index.php">Krochet & Cnit</a></h1>
</div>

<ul class="nav-item" id="nav-menu">
    <li><a href="/crochet.php"><?= $t['core']['crochet']?></a></li>
    <li><a href="/tricot.php"><?= $t['core']['tricot']?></a></li>
    <li><a href="#"><?= $t['nav']['projects']?></a></li>
    <?php if ($isLogged) : ?>
        <li>
          <a href="/logout.php">
              <?= $t['nav']['logout'] ?>
          </a>
        </li>
      <?php else: ?>
        <li>
          <a href="/login.php">
              <?= $t['nav']['login'] ?>
          </a>
        </li>
      <?php endif; ?>

    <li class="lang-switcher">
      <a href="/lang.php?lang=fr" >🇫🇷</a>
      <a href="/lang.php?lang=en">🇬🇧</a>
    </li>
</ul>
<form class="form_recherche">
    <input type="search" id="searchInput" placeholder="<?= $t['nav']['rech']?>" />
    <button type="submit">
        <span class="fas fa-search"></span>
    </button>
    <div class="result-box">
      <ul id="suggestions"></ul>
    </div>
</form>
</nav>
