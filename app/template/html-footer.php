<?php require_once(__DIR__.'/../../vendor/autoload.php');
use function raymondoor\request_url_schm_usr;
?>
<footer>
    <div id="ft-desk"></div>
    <div id="ft-mobile"></div>
</footer>
<?php
require_once(SCRIPT_DIR.'/script.php');
if(file_exists(SCRLIB_DIR.'/'.$INDEX.'.php')){require_once(SCRLIB_DIR.'/'.$INDEX.'.php');}
?>
<script type="application/ld+json">
{
    "@context": "http://schema.org",
    "@type": "WebPage",
    "name": "",
    "url": "<?=request_url_schm_usr().$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']?>",
}
</script>
</body>
</html>