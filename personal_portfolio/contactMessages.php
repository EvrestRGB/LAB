<?php
    include './functions.php';
    is_authorised(['admin']);
    include './classes/databaseQueries.php';
    $contactObj = new databaseQueries();
?>

<div class="container dashboard">
    <div class="row">
        <div class="col-12">
            <h1>Contact messages</h1>
            <p>This is the place where you can check all the contact messages and edit the status if you have responded
                to them!</p>
        </div>
        <div class="col-12">

        </div>
        <div class="col-12">
            <div>
                <table class="table table-dark table-striped-columns rounded">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phonenumber</th>
                            <th scope="col">Message</th>
                            <th scope="col">Created at:</th>
                            <th scope="col">Responded?</th>
                            <th scope="col">Read/Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $contacts = $contactObj->pagination();
                            foreach($contacts as $contact){
                        ?>
                        <tr>
                            <td><?php echo $contact['name']; ?></td>
                            <td><?php echo $contact['email']; ?></td>
                            <td><?php echo $contact['phonenumber']; ?></td>
                            <td><?php echo mb_strimwidth($contact['message'], 0, 20, "..."); ?></td>
                            <td><?php echo $contact['created_at']; ?></td>
                            <td><?php echo $contact['responded']; ?></td>
                            <td>
                                <a href="index.php?content=readContact&id=<?php echo $contact['id'] ?>">
                                    <i class="bi bi-eye"></i>
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <!-- <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <li class="page-item">
                            <a class="page-link"
                                href="./read.php?page=<?php if ($contact->page > 1) {echo $contact->page - 1;} else {echo $contact->page;} ?>"
                                aria-label="Previous">
                                previous
                            </a>
                        </li>
                        <?php
                            for ($i=1; $i<=$contact[$pages]; $i++) {
                                echo '<li class="page-item">
                                        <a class="page-link" href="./read.php?page=' . $i . '">' . $i . '</a>
                                      </li>';
                            }
                        ?>

                        <li class="page-item">
                            <a class="page-link"
                                href="./read.php?page=<?php if ($contact[$page] < $contact[$pages]) {echo $contact[$page] + 1;} else {echo $contact[$page];} ?>"
                                aria-label="Next">
                                next
                            </a>
                        </li>
                    </ul>
                </nav> -->
            </div>
        </div>
    </div>
</div>