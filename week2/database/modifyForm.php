<?php

if(isset($_GET['id'])){

}

?>

<form action="modifyData.php" method="post">
    <input type="hidden" name="media_id" value="12">
    <div>
        <label for="title">Title</label>
        <input type="text" name="title" id="title">
    </div>
    <div>
        <label for="description">Description</label>
        <textarea name="description" id="description"></textarea>
    </div>
    <div>
        <input type="submit" value="Save">
    </div>
</form>