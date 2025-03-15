<?php require_once(__DIR__.'../../../../../vendor/autoload.php');
?>
<style>
footer{
    color: var(--SubColour2);
}
@media(min-width:921px){
    footer{
        display: block;
        #ft-desk{
            display: block;
        }
        #ft-mobile{
            display: none;
        }
    }
}
@media(max-width:920px){
    footer{
        display: block;
        #ft-desk{
            display: none;
        }
        #ft-mobile{
            display: block;
        }
    }
}
</style>
