<?php
    include './functions.php';
    is_authorised(['admin']);
    include './classes/databaseQueries.php';
    $projectsObj = new databaseQueries();

    if(isset($_POST['submit'])){
        $projectsObj->insertProjects($_POST);
    }
?>

<div class="container">
    <form class="addProjects" method="post" action="index.php?content=createProject" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="formFile" class="form-label">File:</label>
            <input class="form-control" type="file" name="filename" id="fileToUpload">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Name:</label>
            <input type="text" name="name" class="form-control" value=""
                id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Pagename:</label>
            <input type="text" name="pagename" class="form-control" value=""
                id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Github link:</label>
            <input type="text" name="githublink" class="form-control" value=""
                id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Website link:</label>
            <input type="text" name="websitelink" class="form-control" value=""
                id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Paragraph 1</label>
            <textarea class="form-control" name="p1" id="exampleFormControlTextarea1"
                value="" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Paragraph 2</label>
            <textarea class="form-control" name="p2" id="exampleFormControlTextarea1"
                value="" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Paragraph 3</label>
            <textarea class="form-control" name="p3" id="exampleFormControlTextarea1"
                value="" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Paragraph 4</label>
            <textarea class="form-control" name="p4" id="exampleFormControlTextarea1"
                value="" rows="3"></textarea>
        </div>
        <a href="index.php?content=d-project">
            <button type="submit" name="submit" value="submit" class="btn btn-dark">Create project</button>
        </a>
    </form>
</div>