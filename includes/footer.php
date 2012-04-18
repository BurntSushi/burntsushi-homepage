<?php

require_once('navs.php');
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
  </footer>
  </div></div>
</body>
</html>

