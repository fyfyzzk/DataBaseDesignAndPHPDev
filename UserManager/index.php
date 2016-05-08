<?php

require_once("config.php");

require_once("header.php");

echo "
<body>
<div id='wrapper'>

<div id='content'>
<h1>User Authorization / Authentication Example</h1>
<div id='left-nav'>";

include("left-nav.php");

echo "</div>";


echo "
<div id='main'>
<p>This is the main page or landing page of our system</p>
<p> show products here to an unauthenticated user!! hi there</p>

</div>
<div id='bottom'></div>
</div>
</body>
</html>";

?>
