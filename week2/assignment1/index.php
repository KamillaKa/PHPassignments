<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $color = $_POST['color'];
    $size = $_POST['size'];
    $style = $_POST['style'];
    $fontStyle = '';
   if (in_array('bold', $style)) {
        $fontStyle .= 'font-weight: bold;';
    }

    if (in_array('italic', $style)) {
        $fontStyle .= 'font-style: italic;';
   }

    echo "<div style='color: $color; font-size: $size; $fontStyle'>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>";
}
    ?>
    <form action="" method="post">
        Color:<br>
        <input type="radio" name="color" value="red"> Red<br>
        <input type="radio" name="color" value="green"> Green<br>
        <input type="radio" name="color" value="blue"> Blue<br><br>

        Size:<br>
        <select name="size">
            <option value="small">Small</option>
            <option value="medium">Medium</option>
            <option value="large">Large</option>
        </select><br><br>

        Font style:<br>
        <input type="checkbox" name="style[]" value="bold"> Bold<br>
        <input type="checkbox" name="style[]" value="italic"> Italic<br><br>

        <input type="submit" value="Submit">
    </form>
