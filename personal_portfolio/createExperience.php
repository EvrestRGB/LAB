<?php
    include './functions.php';
    is_authorised(['admin']);
    include './classes/databaseQueries.php';
    $experienceObj = new databaseQueries();

    if(isset($_POST['submit'])){
        $experienceObj->insertExperience($_POST);
    }
?>

<div class="container">
    <form class="readProjects" method="POST" action="index.php?content=createExperience">
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Function:</label>
            <input type="text" name="function" class="form-control" placeholder="Type the name of your function..." id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Company:</label>
            <input type="text" name="company" class="form-control" placeholder="Type the name of the company..." id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Place:</label>
            <input type="text" name="place" class="form-control" placeholder="Type the name of the place where you worked..." id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Summary:</label>
            <input type="text" name="summary" class="form-control" placeholder="Type a summary of your job..." id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Period:</label>
            <input type="text" name="period" class="form-control" style="height: 70px;" placeholder="Type the period in which worked at this job..." id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Company website:</label>
            <input type="text" name="companywebsite" class="form-control" style="height: 70px;" placeholder="Type the company website link..." id="exampleInputPassword1">
        </div>
        <a href="index.php?content=d-experience">
            <button type="submit" name="submit" value="submit" class="btn btn-dark">Submit</button>
        </a>
    </form>
</div>