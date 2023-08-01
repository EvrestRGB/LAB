<?php
    include './functions.php';
    is_authorised(['admin']);
    include './classes/databaseQueries.php';
    $obj = new databaseQueries();

    if(isset($_POST['submit'])){
        $obj->createSkill($_POST);
    }
?>

<div class="container">
    <form class="addProjects" method="post" action="index.php?content=createSkill">
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Name:</label>
            <input type="text" name="name" class="form-control" value=""
                id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Percentage:</label>
            <input type="text" name="percentage" class="form-control" value=""
                id="exampleInputPassword1">
        </div>
        <a href="index.php?content=d-skills">
            <button type="submit" name="submit" value="submit" class="btn btn-dark">Create skill</button>
        </a>
    </form>
</div>