<?php
    include './functions.php';
    is_authorised(['admin']);
    include './classes/databaseQueries.php';
    $contactObj = new databaseQueries();
?>

<div class="container dashboard">
    <div class="row">
        <div class="col-12">
            <h1>Welcome back Admin!</h1>
            <p>Here you can read information from the contact form, edit the projects, add new and/or delete old
                projects. (Dunno why you would do that but sure 🤷‍♀️)</p>
            <p>Goodluck!</p>
        </div>
        <div class="col-8">
            <h4>Contact messages</h4>
            <div>
                <table class="table table-dark table-striped-columns rounded">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phonenumber</th>
                            <th scope="col">Message</th>
                            <th scope="col">Created at:</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $contacts = $contactObj->displayContactInfo(5);
                            foreach($contacts as $contact){
                        ?>
                        <tr>
                            <td><?php echo $contact['name']; ?></td>
                            <td><?php echo $contact['email']; ?></td>
                            <td><?php echo $contact['phonenumber']; ?></td>
                            <td><?php echo mb_strimwidth($contact['message'], 0, 20, "..."); ?></td>
                            <td><?php echo $contact['created_at']; ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <a href="index.php?content=contactMessages">
                    <button type="button" class="btn btn-dark">view more</button>
                </a>
            </div>
        </div>
        <div class="col-4">
            <div class="card" style="width: 100%;">
                <div class="card-body">
                    <h5 class="card-title">Edit projects</h5>
                    <p class="card-text">Have you made a new project that you want to display on your portfolio? This is where you can add, delete and edit projects.</p>
                    <a href="index.php?content=editProjects" class="btn btn-dark">Projects</a>
                </div>
            </div>
        </div>
    </div>
</div>