<?php

// Basic check on input validity
if (!isset($_GET['url']) || !isset($_GET['keywords']) || !isset($_GET['search'])) {
    die("Parameters not set");
}
if (filter_var($_GET['url'], FILTER_VALIDATE_URL) === FALSE || strpos($_GET['url'], "http") !== 0) { // Accept only http and https
    die("URL not valid");
}

// Get all keywords
$keywords = explode(",", filter_var($_GET['keywords'], FILTER_SANITIZE_STRING));
foreach ($keywords as &$keyword) {
    $keyword = trim($keyword);
}

require "Filterss.php";

// Initialize filters
$f = new Filterss();
$f->loadFromUrl($_GET['url']);

if ($_GET['search'] == "or") {
    // "Or" search
    $f->filter($keywords);
} else {
    // "And" search
    foreach ($keywords as &$keyword) {
        $f->filter($keyword);
    }
}
// Output the filtered feed
echo $f->out();
