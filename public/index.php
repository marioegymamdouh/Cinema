<?php
// Prevents javascript XSS attacks aimed to steal the session ID
ini_set('session.cookie_httponly', 1);
// **PREVENTING SESSION FIXATION**
// Session ID cannot be passed through URLs
ini_set('session.use_only_cookies', 1);

include '../app/init.php';
$app = new \Core\App();
