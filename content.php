<?php
if (isset($_GET["content"])) {
    include("./components/pages/" . $_GET["content"] . ".php");
} else {
    include("./components/pages/home.php");
}
?>