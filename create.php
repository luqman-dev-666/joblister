<?php include_once 'config/init.php' ; ?>
<?php 

$template = new Template('templates/job-create.php');
$job = new Job ;
$template->categories = $job->getCategories();

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

    if($job->create($data)){
        redirect('index.php' , 'Your job has been listed' , 'success');
    }else{
        redirect('index.php' , 'something went wrongg' , 'error');
    }
}

echo $template ;
