<?php

require_once('homepage_navs.php');
if (!isset($NAV)) {
  $NAV = 'home';
}

?>
    </div>

    <div id="nav">
      <ul>
        <li><a href="<?=$BASE?>/index.php">Home</a></li>
        <?php foreach ($navs[$NAV] as $name => $url): ?>
          <li><a href="<?=$url?>"><?=$name?></a></li>
        <?php endforeach; ?>
      </ul>
    </div>
    <hr>
  </div>

  <footer>
    <p>Doubt everything. Find your own light.</p>
  </footer>
  </div></div>
</body>
</html>

