<?php
     include './functions.php';
     is_authorised(['admin']);
     include './classes/databaseQueries.php';
     $experienceObj = new databaseQueries();

     //edit record
     if(isset($_GET['id']) && !empty($_GET['id'])){
         $editProject = $_GET['id'];
         $experience = $experienceObj->displayExperienceUpdate();
     }

     //update record
     if(isset($_POST['update'])){
         $experienceObj->updateExperience($_POST);
     }
?>

<div class="container">
    <form class="readProjects" method="POST" action="index.php?content=editExperience">
        <?php
            $experiences = $experienceObj->displayExperienceUpdate();

            if(is_array($experiences) || is_object($experiences)) {
            foreach($experiences as $id => $experience) {
        ?>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">id:</label>
            <input type="text" name="id" class="form-control" value="<?php echo $experience['id']; ?>" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Function:</label>
            <input type="text" name="function" class="form-control" value="<?php echo $experience['function']; ?>" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Company:</label>
            <input type="text" name="company" class="form-control" value="<?php echo $experience['company']; ?>" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Place:</label>
            <input type="text" name="place" class="form-control" value="<?php echo $experience['place']; ?>" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Summary:</label>
            <input type="text" name="summary" class="form-control" value="<?php echo $experience['summary']; ?>" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Period:</label>
            <input type="text" name="period" class="form-control" style="height: 70px;" value="<?php echo $experience['period']; ?>" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Company website:</label>
            <input type="text" name="companywebsite" class="form-control" style="height: 70px;" value="<?php echo $experience['companywebsite']; ?>" id="exampleInputPassword1">
        </div>
        <?php }} ?>
        <a href="index.php?content=d-experience">
            <input type="hidden" name="id" value="<?php echo $experience['id']?>">
            <button type="submit" name="update" value="update" class="btn btn-dark">Update</button>
        </a>
    </form>
</div>