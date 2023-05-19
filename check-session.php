<?php
session_start();

if (!isset($_SESSION['logged'])) {
    header('Location: index.php'); //redirect
}

/**
 * This following function stores data to session
 */

function setSession($index, $value): void
{
    $_SESSION[$index] = $value;
}

/**
 * Following function gets data from session
 */

function getSession($index)
{
    return $_SESSION[$index];
}
