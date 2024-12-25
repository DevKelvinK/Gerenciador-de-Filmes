<?php

unset($_SESSION['flash_formData']);

$message = $_REQUEST['message'] ?? '';

view('explore', compact('message'));