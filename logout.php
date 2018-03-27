<?php
session_start();
if (isset($_GET["u"]) and strip_tags($_GET["u"]) == "done") {
        unset($_SESSION['user_email']);
        session_destroy();
}
include 'index.php' ?>

