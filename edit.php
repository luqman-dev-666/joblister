<?php include_once 'config/init.php' ; ?>
<?php 

$template = new Template('templates/job-edit.php');
$job = new Job ;
$template->categories = $job->getCategories();
$job_id = isset($_GET['id'])?$_GET['id']:null;


if(isset($_POST['submit'])){
    $data = array() ;
    $data['job_title'] = $_POST['job_title'];
    //$data['company'] = $_POST['company'];
    $data['salary'] = $_POST['salary'];
    $data['location'] = $_POST['location'];
    $data['description'] = $_POST['description'];
    $data['contact_user'] = $_POST['contact_user'];
    $data['contact_email'] = $_POST['contact_email'];
    $data['category_id'] = $_POST['category'];

    if($job->update($job_id, $data)){
        redirect('index.php' , 'Your job has been updated' , 'success');
    }else{
        redirect('index.php' , 'something went wrong' , 'error');
    }
}

$template->job = $job->getJob($job_id);

echo $template ;
