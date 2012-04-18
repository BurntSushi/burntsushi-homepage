<?php

if (gethostname() == 'Ocelot') {
  $BASE = '/homepage';
} else {
  $BASE = '';
}

function gopkgdoc($repo) {
  return "https://gopkgdoc.appspot.com/pkg/$repo";
}

?><!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="iso-8859-1">
  <title>Andrew Gallant's Go Projects</title>
  <meta name="description" content="Go projects developed by Andrew Gallant.
        They include Wingo, a fully-featured windowmanager; XGB Util, a utility
        library making some things in X easier to bear; and XGB, which is a clone
        of Google's official x-go-binding.">
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

