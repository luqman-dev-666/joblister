<?php include_once 'config/init.php' ; ?>
<?php 

$template = new Template('templates/job-single.php');
$job = new Job ;

$job_id = isset($_GET['id'])?$_GET['id']:null;

if(isset($_POST['del_id'])){
    $del_id = $_POST['del_id'];
    if($job->delete($del_id)){
        redirect('index.php' , 'Job deleted' , 'success');
    }else{
        redirect('index.php' , 'Job not deleted' , 'error');
    }
}


$template->job = $job->getJob($job_id);

echo $template ;
