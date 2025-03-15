<?php require_once(__DIR__.'../../../../../vendor/autoload.php');
?>
<style>
header{
    color: var(--SubColour);
}
@media(min-width:921px){
    header{
        display: block;
        #hd-desk{
            display: block;
        }
        #hd-mobile{
            display: none;
        }
    }
}
@media(max-width:920px){
    header{
        display: block;
        #hd-desk{
            display: none;
        }
        #hd-mobile{
            display: block;
        }
    }
}
</style>
