<!doctype html>
<html class='no-js' lang='<?=$lang?>'>
<head>

    <base href="<?=$baseurl?>">
    <meta charset='utf-8'/>
    <title><?=$title . $title_append?></title>
    <?php if(isset($favicon)): ?><link rel='icon' href='<?=$this->url->asset($favicon)?>'/><?php endif; ?>
    <?php foreach($stylesheets as $stylesheet): ?>
    <link rel='stylesheet' type='text/css' href='<?=$this->url->asset($stylesheet)?>'/>
    <?php endforeach; ?>
    <?php if(isset($style)): ?><style><?=$style?></style><?php endif; ?>
    <script src='<?=$this->url->asset($modernizr)?>'></script>
</head>

<body class="<?=$showRegions?>">

<div id='wrapper'>

    <header>
        <div class="header">
            <?php if(isset($header)) echo $header?>
            <?php $this->views->render('header')?>

            <?php if ($this->views->hasContent('navbar')) : ?>
                <div id='navbar'>
                    <?php $this->views->render('navbar')?>
                </div>
            <?php endif; ?>
        </div>
    </header>

    <div id="content_wrapper">
        <?php if ($this->views->hasContent('flash')) : ?>
            <div id='flash'><?php $this->views->render('flash')?></div>
        <?php endif; ?>


        <?php if ($this->views->hasContent('featured-1', 'featured-2', 'featured-3')) : ?>
            <div id='wrap-featured'>
                <div id='featured-1'><?php $this->views->render('featured-1')?></div>
                <div id='featured-2'><?php $this->views->render('featured-2')?></div>
                <div id='featured-3'><?php $this->views->render('featured-3')?></div>
            </div>
        <?php endif; ?>


        <main>
            <?php $this->views->render('main')?>
        </main>

        <?php if ($this->views->hasContent('sidebar')) : ?>
            <div id='sidebar'><?php $this->views->render('sidebar')?></div>
        <?php endif; ?>


        <?php if ($this->views->hasContent('triptych-1', 'triptych-2', 'triptych-3')) : ?>
            <div id='wrap-triptych'>
                <div id='triptych-1'><?php $this->views->render('triptych-1')?></div>
                <div id='triptych-2'><?php $this->views->render('triptych-2')?></div>
                <div id='triptych-3'><?php $this->views->render('triptych-3')?></div>
            </div>
        <?php endif; ?>


        <?php if ($this->views->hasContent('footer-1', 'footer-2', 'footer-3', 'footer-4')) : ?>
            <div id='wrap_footer'>
                <div id='footer-1'><?php $this->views->render('footer-1')?></div>
                <div id='footer-2'><?php $this->views->render('footer-2')?></div>
                <div id='footer-3'><?php $this->views->render('footer-3')?></div>
                <div id='footer-4'><?php $this->views->render('footer-4')?></div>
            </div>
        <?php endif; ?>
    </div>

    <footer>
        <?php if(isset($footer)) echo $footer?>
        <?php $this->views->render('footer')?>
    </footer>

</div>

    <?php if(isset($jquery)):?><script src='<?=$this->url->asset($jquery)?>'></script><?php endif; ?>

    <?php if(isset($javascript_include)): foreach($javascript_include as $val): ?>
        <script src='<?=$this->url->asset($val)?>'></script>
    <?php endforeach; endif; ?>

    <?php if(isset($google_analytics)): ?>
        <script>
            var _gaq=[['_setAccount','<?=$google_analytics?>'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    <?php endif; ?>

</body>
</html>
