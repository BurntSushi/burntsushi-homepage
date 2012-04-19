<?php

if (gethostname() == 'Ocelot') {
  $BASE = '/homepage';
} else {
  $BASE = '';
}

function url($url) {
  return $BASE . '/' . $url;
}

function aurl($name, $url) {
  global $BASE;

  return '<a href="' . $BASE . '/' . $url . '">' . $name . '</a>';
}

?><!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="iso-8859-1">
  <title>Andrew Gallant</title>
  <meta name="description"
        content="Andrew Gallant's homepage. I'm a Ph.D. student in the
          Computer Science department at Tufts University. My advisor is
          Lenore Cowen. Broadly speaking, my research interest is in
          Computational Biology.">
  <meta name="viewport" content="width=device-width">

  <link rel="stylesheet" href="<?=$BASE?>/css/normalize.css">
  <link rel="stylesheet" href="<?=$BASE?>/css/style.css">
  <link rel="stylesheet" href="<?=$BASE?>/css/print.css">
</head>
<body>
  <div id="container"><div id="container2">
  <header>
    <h1>Andrew Gallant</h1>
    <hr>
  </header>
  <div id="content-cont">
    <div id="content" role="main">

