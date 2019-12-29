<?php include_once 'config/init.php' ; ?>
<?php 

$template = new Template('templates/frontpage.php');


$job = new Job ;
$template->categories = $job->getCategories();

$category = isset($_GET['category'])?$_GET['category']:null;

if($category) {
   $template->jobs = $job -> getByCategory($category);
   $template->title = 'Jobs in'.$job->getCategory($category)->name ;
}else{
    $template->title = 'latest Jobs' ;
    $template->jobs = $job -> getAllJobs();
}

echo $template ;
