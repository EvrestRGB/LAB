<?php
    include './functions.php';
    is_authorised(['admin']);
    include './classes/databaseQueries.php';
    // include './deleteRecord.php';
    // $deleteObj = new DeleteRec();
    $obj = new databaseQueries();

    // Delete record from table
    // if(isset($_GET['deleteRecord']) && !empty(['deleteRecord'])) {
    //     $recordId = (int)$_GET['deleteRecord'];
    //     $obj->deleteRecord($recordId, 'experience');
        // var_dump($recordId);exit();
        // if(!) {
        //     header("Location: index.php?content=message&alert=delete-experience-error");
        // }else{
        //     header("Location: index.php?content=message&alert=delete-experience-success");
        // }
        // $deleteObj->deleteRecord($id, 'experience');
    // }
?>

<div class="container dashboard">
    <div class="row">
        <div class="col-12">
            <h1>Work Experience</h1>
            <p>This is the place to add, delete and edit your work experience!</p>
        </div>
        <div class="col-12">

        </div>
        <div class="col-12">
            <div>
                <table class="table table-dark table-striped-columns rounded">
                    <thead>
                        <tr>
                            <th scope="col">Function:</th>
                            <th scope="col">Company:</th>
                            <th scope="col">Place:</th>
                            <th scope="col">Summary:</th>
                            <th scope="col">Period:</th>
                            <th scope="col">Company website:</th>
                            <th scope="col">Edit:</th>
                            <th scope="col">Delete:</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $experiences = $obj->displayExperience(20);
                            foreach($experiences as $id => $experience ){
                        ?>
                        <tr>
                            <td><?php  echo $experience['function'] ?></td>
                            <td><?php  echo $experience['company'] ?></td>
                            <td><?php  echo $experience['place'] ?></td>
                            <td><?php  echo mb_strimwidth($experience['summary'], 0, 20, "...") ?></td>
                            <td><?php  echo $experience['period'] ?></td>
                            <td><?php  echo $experience['companywebsite'] ?></td>
                            <td>
                                <a href="index.php?content=editExperience&id=<?php echo $experience['id'] ?>">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                            </td>
                            <td>
                                <a href="deleteExperience.php?id=<?php echo $experience['id'] ?>">
                                    <i class="bi bi-trash3"></i>
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <a href="index.php?content=createExperience">
                    <div class="d-grid">
                        <button type="button" name="button" value="button" class="btn btn-dark">Add Experience
                            +</button>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>