<?php
require_once(__DIR__.'../../../../vendor/autoload.php');
?>
<style>
:root{
    --BaseFont: 'Arial';
    --textColour: hsl(0, 0%, 100%);
    --hoverColour: hsl(0, 0%, 75%);
}
<?php
$hue = '240';
$sat = '50%';
$lum = '40%';
$alp = '1.0';
?>
@property --MainColour{
    syntax: "<color>";
    inherits: false;
    initial-value: hsla(<?=$hue?>, <?=$sat?>, <?=$lum?>, <?=$alp?>);
}
@property --SubColour{ /* Bright */
    syntax: "<color>";
    inherits: false;
    initial-value: hsl(<?=$hue?>, calc(<?=$sat?> + 20%), calc(<?=$lum?> + 20%));
}
@property --SubColour2{ /* Dark */
    syntax: "<color>";
    inherits: false;
    initial-value: hsl(<?=$hue?>, calc(<?=$sat?> + 10%), calc(<?=$lum?> - 15%));
}
@property --OrgColour{
    syntax: "<color>";
    inherits: false;
    initial-value: hsl(<?=$hue?>, <?=$sat?>, <?=$lum?>);
}
@property --BackTone{
    syntax: "<color>";
    inherits: false;
    initial-value: hsl(0, 0%, 90%);
}
</style>
