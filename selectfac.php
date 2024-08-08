<?php
// error_reporting(0);
require_once "../config.php";

include("../template/admin-auth.php");
include("../template/sidebar-admin.php");
// error_reporting(0);

$branch=$_SESSION['branch']=$_POST['branch'] ?? "";

if (isset($_SESSION["popup"]) && $_SESSION["popup"] == 1) {
    $_SESSION["popup"] = 0;
    echo '<div style="width:50%;" class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Sucessful</strong> 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
} else if (isset($_SESSION["popup"]) && $_SESSION["popup"] == 2) {
    $_SESSION["popup"] = 0;
    echo '<div style="width:50%;" class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>failed</strong> 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}

?>

<?php

$con =  $link;
$q1 = "select faculty_name from faculty_details ";
$q2 = "select * from subjects_new  order by sem ";
$result1 = $con->query($q1);
$result2 = $con->query($q2);

?>


<!-- <style>
     @media screen and (min-width: 320px) {
            .select-menu {
                /* margin-left: 80%; */
                width: 80%;
            }

        }
</style> -->
<div class="container">

    <form action="login.php" method="post">
        <div class="col-md-6">


            <label for="fac_name">Faculty:</label>
            <select name="faculty" id="fac_name" class="form-control mb-3 select-menu" required>
                <option selected disabled>Select Faculty</option>
                <?php
                foreach ($result1 as $r1) {
                ?>
                    <option value="<?php echo $r1["faculty_name"] ?>">
                        <?php

                        echo $r1["faculty_name"];


                        ?>
                    </option>


                <?php } ?>
            </select>
        </div>
        
        <div class="col">
            <button class="btn btn-primary mt-4" type="submit">login</button>
        </div>
    </form>
</div>
<?php  ?>

</div>
<!-- page content end -->
</div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').toggleClass('active');
        });
    });
</script>
</body>

</html>