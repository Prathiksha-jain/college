<?php 
error_reporting(0);
require_once "../config.php";
// include("../template/placement-auth.php");
include("../template/sidebar-placement.php");
?>
<style>
#Back-btn {
    display: none;
}

.container {
    margin-top: 100px
}

.counter-box {
    display: block;
    background: #f6f6f6;
    padding: 40px 20px 37px;
    text-align: center
}

.counter-box p {
    margin: 5px 0 0;
    padding: 0;
    color: #909090;
    font-size: 18px;
    font-weight: 500
}

.counter-box i {
    font-size: 60px;
    margin: 0 0 15px;
    color: #d2d2d2;
    border: 1px solid transparent;
}

.counter {
    display: block;
    font-size: 32px;
    font-weight: 700;
    color: #666;
    line-height: 28px
}

.counter-box:hover {
    box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(240, 250, 251, 0.884) 0px 10px 10px;
    transition: background 0.35s;
    background: #7fd4ee8a;
    border: 1px solid transparent;
    border-radius: 7px;
}

.text-num {
    color: #0e0f3b;
}

.greay {
    color: #07407b !important;
}

.orange {
    color: #f7931e !important;
}

.counter-box.colored p,
.counter-box.colored i,
.counter-box.colored .counter {
    color: #fff;
}
</style>

<?php 

$q1 = "select count(*) as s from students";
$res1 = $link->query($q1);
$no_of_stu = mysqli_fetch_assoc($res1);

$q2 = "select count(*) as s from faculty_details";
$res2 = $link->query($q2);
$no_of_fac = mysqli_fetch_assoc($res2);
if (isset($_SESSION['is_archive']) && $_SESSION['is_archive'] == 1) {
    $q3 = "select count(*) as s from subjects";

}
else{

    $q3 = "select count(*) as s from subjects_new";
}
$res3 = $link->query($q3);
$no_of_sub = mysqli_fetch_assoc($res3);

?>


<div class="alert alert-success alert-dismissible fade show custom-success-alert" role="alert">
  <strong>Welcome!</strong> You have loged in as Placement Officier.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>


<?php 
include("../template/footer-admin.php") ?>