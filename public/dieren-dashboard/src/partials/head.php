<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

<link rel="stylesheet" href="../src/public/css/splide.min.css" >
<link rel="stylesheet" href="../src/public/css/all.min.css" >
<?php 
function convertToVeryDarkColor($hexColor) {
    // Extract RGB components from the input hex color
    $r = hexdec(substr($hexColor, 0, 2));
    $g = hexdec(substr($hexColor, 2, 2));
    $b = hexdec(substr($hexColor, 4, 2));

    // Adjust the RGB values (example adjustment for conversion)
    $r = max(0, $r - 98); // Adjust Red component
    $g = max(0, $g - 89); // Adjust Green component
    $b = max(0, $b - 130); // Adjust Blue component

    // Convert the adjusted values back to a hex string
    $newHexColor = sprintf("%02X%02X%02X", $r, $g, $b);

    return $newHexColor;
}

function convertToDarkerColor($hexColor) {
    // Extract RGB components from the input hex color
    $r = hexdec(substr($hexColor, 0, 2));
    $g = hexdec(substr($hexColor, 2, 2));
    $b = hexdec(substr($hexColor, 4, 2));

    // Adjust the RGB values (example adjustment for conversion)
    $r = max(0, $r - 66); // Adjust Red component
    $g = max(0, $g - 65); // Adjust Green component
    $b = max(0, $b - 60); // Adjust Blue component

    // Convert the adjusted values back to a hex string
    $newHexColor = sprintf("%02X%02X%02X", $r, $g, $b);

    return $newHexColor;
}
function convertToLighterColor($hexColor) {
    // Extract RGB components from the input hex color
    $r = hexdec(substr($hexColor, 0, 2));
    $g = hexdec(substr($hexColor, 2, 2));
    $b = hexdec(substr($hexColor, 4, 2));

    // Adjust the RGB values (example adjustment for conversion)
    $r = min(255, $r + 32); // Adjust Red component
    $g = min(255, $g + 40); // Adjust Green component
    $b = min(255, $b + 40); // Adjust Blue component

    // Convert the adjusted values back to a hex string
    $newHexColor = sprintf("%02X%02X%02X", $r, $g, $b);

    return $newHexColor;
}
?>
<style>
    :root{
        --primary: #F95316;
        --primaryLight: #<?= convertToLighterColor('F95316') ?>;
        --primaryDark: #<?= convertToDarkerColor('F95316') ?>;
        --primaryDarker: #<?= convertToVeryDarkColor('F95316') ?>;
        --secondary: #E8FF57;
        --secondaryLight: #<?= convertToLighterColor('E8FF57') ?>;
        --secondaryDark: #<?= convertToDarkerColor('E8FF57') ?>;
        --secondaryDarker: #<?= convertToVeryDarkColor('E8FF57') ?>;
    }
</style>
<link rel="stylesheet" href="../dist/public/css/app.css">