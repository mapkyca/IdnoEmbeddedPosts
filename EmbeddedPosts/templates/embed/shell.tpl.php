<?php

    header('Content-type: text/html');
    
    $width = \Idno\Core\site()->currentPage()->getInput('width', 500);
    $height = \Idno\Core\site()->currentPage()->getInput('height', 300);

?>
<?php if (!$_SERVER["HTTP_X_PJAX"]): ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?= htmlspecialchars($vars['title']); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="initial-scale=1.0" />
    
    <!-- Le styles -->
    <link href="<?= \Idno\Core\site()->config()->url . 'external/bootstrap/' ?>assets/css/bootstrap.css"
          rel="stylesheet">
    <link rel="stylesheet" href="<?= \Idno\Core\site()->config()->url ?>external/font-awesome/css/font-awesome.min.css">
    <link href="<?= \Idno\Core\site()->config()->url . 'external/bootstrap/' ?>assets/css/bootstrap-responsive.css"
          rel="stylesheet">
    <link href="<?= \Idno\Core\site()->config()->url ?>css/default.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="<?= \Idno\Core\site()->config()->url . 'external/bootstrap/' ?>assets/js/html5shiv.js"></script>
    <![endif]-->

    <?= $this->draw('shell/head', $vars); ?>

    <style>
        html, body {
            padding: 0px;
            margin: 0px;
            height: 100%;
        }
        body { 
            min-height: 100%;
            background-color: transparent;
        }
        .idno-object {
    margin-top: 0px;
    overflow: hidden;
}
    </style>
</head>

<body>
<?php endif; ?>
<div id="pjax-container">

    <div class="container">
        <?= $vars['body'] ?>

    </div>
    <!-- /container -->
</div>
<!-- pjax-container -->
<?php if (!$_SERVER["HTTP_X_PJAX"]): ?>
<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?= \Idno\Core\site()->config()->url . 'external/jquery/' ?>jquery.min.js"></script>
<script src="<?= \Idno\Core\site()->config()->url . 'external/jquery-timeago/' ?>jquery.timeago.js"></script>
<script src="<?= \Idno\Core\site()->config()->url . 'external/jquery-pjax/' ?>jquery.pjax.js"></script>
<script src="<?= \Idno\Core\site()->config()->url . 'external/bootstrap/' ?>assets/js/bootstrap.min.js"></script>
<!-- Video shim -->
<script src="<?= \Idno\Core\site()->config()->url . 'external/fitvids/jquery.fitvids.min.js' ?>"></script>
<script>

    //$(document).pjax('a:not([href^=\\.],[href^=file])', '#pjax-container');    // In idno, URLs with extensions are probably files.
    /*$(document).on('pjax:click', function(event) {
     if (event.target.href.match('/edit/')) {
     // For a reason I can't actuallly figure out, /edit pages never render with chrome
     // when PJAXed. I don't understand the rendering pipeline well enough to figure out
     // what's up --jrv 20130705
     return false;
     }
     if (event.target.onclick) { // If there's an onclick handler, we don't want to pjax this
     return false;
     } else {
     return true;
     }
     });*/

    function annotateContent() {
        $(".h-entry").fitVids();
        $("time.dt-published").timeago();

    }
    $(document).ready(function () {
        annotateContent();
    })

    $(document).on('pjax:complete', function () {
        annotateContent();
    });


    /** All links open in new window/tab */
    var links = document.getElementsByTagName('a');
    var len = links.length;

    for(var i=0; i<len; i++)
    {
       links[i].target = "_blank";
    }
   
    var viewportWidth = $(window).width();
    var viewportHeight = $(window).height();
    
</script>
</body>
</html><?php endif; ?>