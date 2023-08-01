<?php
 include './classes/databaseQueries.php';
 $object = new databaseQueries();
 $projects = $object->displayProjectsContent();
//  var_dump($projects);
 foreach ($projects as $project){
?>

<section>
    <div class="container articles">
        <div class="row">
            <h2><?php echo $project['name']?></h2>
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6 appear">
                <p><?php echo $project['p1']?></p>
                <p><?php echo $project['p2']?></p>
                <p><?php echo $project['p3']?></p>
                <p><?php echo $project['p4']?></p>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6 appear">
                <img src="./img/projectImg/<?php echo $project['filename'];?>" alt="">
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6 links appear">
                <p>Would you like to get more info about this project?
                    <br>
                    Click the link(s) down below:
                </p>
                <a href="<?php echo $project['githublink'] ?>">Github</a>
                <a href="<?php echo $project['websitelink'] ?>" style="display: <?php if ($project['websitelink'] == NULL){echo 'none';}else{echo 'block';}?>;">Website</a>
            </div>
        </div>
    </div>
</section>
<?php }?>