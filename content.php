<?php
if (isset($_GET["content"])) {
    include("./components/" . $_GET["content"] . ".php");
} else {
    include("./components/pages/home.php");
}
?>