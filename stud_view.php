<?php
include("../template/fac-auth.php");
include("../template/sidebar-fac.php");
error_reporting(0);
require_once "../config.php";
$con = $link;
$usn = $_POST["usn"];


// echo $usn;
// $img_path = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSkkBpQ9U04geL7EKfAaXSxUCshUNLfDTKzlQ&usqp=CAU';
// $p1 = 'select * from display_pic where username="' . $_SESSION["username"] . '"';
// $res9 = $link->query($p1);
// // print_r($res9);
// if (mysqli_num_rows($res9) > 0) {
//     $res9 = mysqli_fetch_assoc($res9);
//     $img_path = $res9["dp"];
// }

$img_path = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSkkBpQ9U04geL7EKfAaXSxUCshUNLfDTKzlQ&usqp=CAU';
$p1 = 'select * from display_pic where username="' . $usn . '"';
// echo $p1;
$res9 = $link->query($p1);
// print_r($res9);
if (mysqli_num_rows($res9) > 0) {
    $res9 = mysqli_fetch_assoc($res9);
    $img_path = $res9["dp"];
}
$link3 = mysqli_connect('saw-erp.in', 'archive_archive20222023', 'Hype#123');
$link3->query('use archive20222023');


?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<!-- page content start -->
<style>
    .card {
        z-index: 0 !important;
    }

    .profileUpload {
        position: absolute;
        /* top: 200px; */
        right: 2%;
        top: 49%;
        z-index: 1;

    }

    .profileDelete {
        position: absolute;
        /* top: 200px; */
        left: 2%;
        top: 49%;
        z-index: 1;
        display: none;

    }

    .profileDelete:hover {
        display: inline-block;
    }

    #image_wraper button {
        display: none;
    }

    #image_wraper:hover button {
        display: initial;
        transition: display 250ms linear;
    }

    #imageUpload {
        display: none;
    }

    .img-container {
        padding: 0%;
        margin-left: 2%;
        border: 1px solid #888888;
        border-radius: 50%;
        text-align: center;
        justify-content: center;
        width: 250px;
        height: 250px;
        overflow: hidden;
        box-sizing: border-box;
        align-items: center;
        box-shadow: 0px 0px 20px 7px #888888;
        background: rgba(255, 255, 255, 0.884);
    }

    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td,
    th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
</style>

<?php

$que = "select * from students where usn=\"$usn\"";
$result = $con->query($que);
//    print_r($result);
foreach ($result as $row) {
?>
    <div>
        <style>
            .goright {
                float: right;
                /* width: 40%; */

            }

            .search__input {
                width: 30%;
                padding: 12px 24px;
                /* float: right; */
                background-color: transparent;
                transition: transform 250ms ease-in-out;
                font-size: 14px;
                line-height: 18px;

                color: #575756;
                background-color: transparent;
                /*         background-image: url(http://mihaeltomic.com/codepen/input-search/ic_search_black_24px.svg); */

                /* background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'%3E%3Cpath d='M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z'/%3E%3Cpath d='M0 0h24v24H0z' fill='none'/%3E%3C/svg%3E"); */
                background-repeat: no-repeat;
                background-size: 18px 18px;
                background-position: 95% center;
                border-radius: 50px;
                border: 1px solid #575756;
                transition: all 250ms ease-in-out;
                backface-visibility: hidden;
                transform-style: preserve-3d;
            }

            .search__input::placeholder {
                color: rgba(87, 87, 86, 0.8);
                text-transform: uppercase;
                letter-spacing: 1.5px;
            }

            .search__input:hover,
            .search__input:focus {
                padding: 12px 0;
                outline: 0;
                border: 1px solid transparent;
                border-bottom: 1px solid #575756;
                border-radius: 0;
                background-position: 100% center;
            }
        </style>
        <form action="stud_view.php" method="post">
            <input class="search__input " type="text" name="usn" minlength="10" maxlength="10" placeholder="USN">
            <button type="submit" class="btn">Go</button>
        </form>
    </div>
    <div class="card" style="padding:3%;">



        <div class="row">

            <div class="col-sm-12 col-md-4 img-container">
                <div id="image_wraper" style="position: relative;">
                    <img id="profile_pich" src="<?php echo $img_path ?>" style="margin: 0%;padding:0%;width:250px;height:250px;">
                    <!-- <button id="profileImage" class="profileUpload btn btn-warning btn-sm" onclick="document.getElementById('imageUpload').click()" style="border-radius: 50%;">
                        < <i class="fas fa-camera"></i> 
                    </button> -->
                    <!-- <form action="Student_Profile_pick_delete.php" method="post">
                        <button id="profileDelete" class="profileDelete btn btn-danger btn-sm" style="border-radius: 50%;">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form> -->
                    <!-- <form action="Student_profile_pick_upload.php" method="post" style="display: none;" enctype="multipart/form-data">
                        <input id="imageUpload" onchange="" name="path" type="file" accept="image/png, image/gif, image/jpeg" />
                        <input type="submit" value="Submit" name="profile_pick" id="profile_pick_submit">
                    </form> -->
                </div>
            </div>
            <div class="col-lg-8 col-6" style="text-align: center;">
                <div class="row">
                    <h3>
                        <span>
                            <?php if ($row["fname"] == NULL) {
                                echo " ";
                            } else {
                                echo $row["fname"];
                            } ?>
                            <?php if ($row["mname"] == NULL) {
                                echo " ";
                            } else {
                                echo $row["mname"];
                            } ?>
                            <?php if ($row["lname"] == NULL) {
                                echo " ";
                            } else {
                                echo $row["lname"];
                            }  ?>
                        </span>
                    </h3>
                </div>
                <div class="row">

                    <span>
                        <?php echo $row["usn"] ?>
                    </span>

                </div>
                <div class="row">
                    <span class="value"><?php echo $row["email_id"] ?></span>
                </div>
                <div class="row">
                    <span class="value"><?php echo $row["mob_no"] ?></span>
                </div>
            </div>

        </div>
    </div>

    <?php
    $link2 = mysqli_connect("localhost", "archive_archive20212022", "Hype#123", "archive20212022");
    $cont = 'select distinct sem from marks where usn="' . $usn . '" order by sem';
    $a = $link2->query($cont);
    foreach ($a as $aa) { ?>
        <div class="card mt-3" style="padding:3%;">
            <p style="font-style: italic;font-weight:600;color:black;"><?php echo $aa['sem'] ?> sem</p>

           

        <?php }  ?>
        <?php
        $qulli = "select distinct semester from students where usn=\"$usn\"";
        $result34i = $link3->query($qulli);
        foreach ($result34i as $u) {
            $sem = $u['semester'];
        }

        ?>
        <div class="card mt-3" style="padding:3%;">
            <p style="font-style: italic;font-weight:600;color:black;"><?php echo $sem ?> sem</p>
            <?php if ($sem == 3) { ?>
                <table>
                    <tr>
                        <th>Subject</th>
                        <th>IA1(20)</th>
                        <th>Ia2(20)</th>
                        <th>IA3(20)</th>
                        <th>Assignment(40)</th>
                        <th>Total CIE(50)</th>
                        <th>SEE</th>
                        <th>Total</th>
                        <th>Attendance</th>
                    </tr>
                    <?php
                    $data = 'select * from marks where usn="' . $usn . '" and ia_total!=0';
                    $sd = $link3->query($data);
                    $cie = 0;
                    foreach ($sd as $gf) {
                        $sub = $gf['sub'];
                        // echo substr($sub,5,2)  . "<br>";
                        if (substr($sub, 0, 7) == '21MAT31' || substr($sub, 4, 2) == '34') {
                    ?>
                            <tr>
                                <td><?php echo $gf['sub'] ?></td>
                                <td><?php echo $gf['ia1'] ?></td>
                                <td><?php echo $gf['ia2'] ?></td>
                                <td><?php echo $gf['ia3'] ?></td>
                                <td><?php echo $gf['assignment_avg'] ?></td>
                                <td><?php echo intval(($gf['assignment_avg'] + $gf['ia1'] + $gf['ia2'] + $gf['ia3']) / 2) ?></td>
                                <td><?php echo $gf['external'] ?></td>
                                <td><?php echo intval(($gf['assignment_avg'] + $gf['ia1'] + $gf['ia2'] + $gf['ia3']) / 2) + $gf['external'] ?></td>
                                <?php $ter = 'select distinct att_avg from attendance_average where sub="' . $gf['sub'] . '" and usn="' . $usn . '"';
                                $ressult = $link3->query($ter);
                                foreach ($ressult as $fr) {
                                    $att_avg = $fr['att_avg'];
                                }
                                ?>
                                <td><?php echo $att_avg ?>%</td>

                            </tr>
                    <?php }
                    } ?>
                </table>
                <table>
                    <tr>
                        <th>Subject</th>
                        <th>IA1(20)</th>
                        <th>Ia2(20)</th>
                        <th>IA3(20)</th>
                        <th>Avg(40)</th>
                        <th>Assignment(20)</th>
                        <th>IA(30)</th>
                        <th>LAB(20)</th>
                        <th>Total CIE(50)</th>
                        <th>SEE</th>
                        <th>Total</th>
                        <th>Attendance</th>
                    </tr>
                    <?php
                    $data = 'select * from marks where usn="' . $usn . '" and ia_total!=0';
                    $sd = $link3->query($data);
                    $cie = 0;
                    foreach ($sd as $gf) {
                        $sub = $gf['sub'];
                        if (substr($sub, 4, 2) == '33' || substr($sub, 4, 2) == '32') {
                    ?>
                            <tr>
                                <td><?php echo $gf['sub'] ?></td>
                                <td><?php echo $gf['ia1'] ?></td>
                                <td><?php echo $gf['ia2'] ?></td>
                                <td><?php echo $gf['ia3'] ?></td>
                                <td><?php echo $m = max($gf['ia3'] + $gf['ia1'], $gf['ia1'] + $gf['ia2'], $gf['ia2'] + $gf['ia3']) ?></td>
                                <td><?php echo $gf['assignment_avg'] ?></td>
                                <td><?php echo intval(($m + $gf['assignment_avg']) / 2) ?></td>
                                <td><?php echo $gf['lab'] ?></td>
                                <td><?php echo intval(($m + $gf['assignment_avg']) / 2) + $gf['lab'] ?></td>
                                <td><?php echo $gf['external'] ?></td>
                                <td><?php echo intval(($m + $gf['assignment_avg']) / 2) + $gf['lab'] + $gf['external'] ?></td>
                                <?php $ter = 'select distinct att_avg from attendance_average where sub="' . $gf['sub'] . '" and usn="' . $usn . '"';
                                $ressult = $link3->query($ter);
                                foreach ($ressult as $fr) {
                                    $att_avg = $fr['att_avg'];
                                }
                                ?>
                                <td><?php echo $att_avg ?>%</td>

                            </tr>
                    <?php }
                    } ?>
                </table>


                <table>

                    <tr>
                        <th>Subject</th>
                        <th>Record(20)</th>
                        <th>Observation(20)</th>
                        <th>VIVA(10)</th>
                        <th>IA Test(50)</th>
                        <th>Total CIE(50)</th>
                        <th>SEE(50)</th>
                        <th>Total</th>
                        <th>Attendance avg</th>

                    </tr>


                    <?php $labmark = 'select * from lab_marks where usn="' . $usn . '"';
                    $reslab = $link3->query($labmark);
                    foreach ($reslab as $rowslab) {


                    ?>
                        <tr>
                            <td><?php echo $rowslab['sub']; ?></td>

                            <td><?php echo $rowslab['record']; ?></td>

                            <td><?php echo $rowslab['obc']; ?></td>

                            <td><?php echo $rowslab['viva']; ?></td>

                            <td><?php echo $rowslab['ia_avg']; ?></td>

                            <td><?php echo intval(($rowslab['record'] + $rowslab['obc'] + $rowslab['viva'] + $rowslab['ia_avg']) / 2); ?></td>

                            <?php if ($rowslab['exam_mark'] < 21) { ?>
                                <td style="color:red ;"><?php echo $rowslab['exam_mark']; ?></td>
                            <?php  } else { ?>
                                <td><?php echo $rowslab['exam_mark']; ?></td>
                            <?PHP } ?>
                            <td><?php echo $rowslab['exam_mark'] + intval(($rowslab['record'] + $rowslab['obc'] + $rowslab['viva'] + $rowslab['ia_avg']) / 2); ?></td>

                            <?php
                            $terr = 'select distinct att_avg from attendance_average where sub="' . $rowslab['sub'] . '" and usn="' . $usn . '"';
                            $ressultr = $link3->query($terr);
                            foreach ($ressultr as $frr) {
                                $att_avgr = $frr['att_avg'];
                            }
                            ?>
                            <td><?php echo $att_avgr ?>%</td>

                        </tr>
                    <?php }  ?>
                </table>


                <table>
                    <tr>
                        <th>Subject</th>
                        <th>IA1(30)</th>
                        <th>Ia2(30)</th>
                        <th>IA3(30)</th>
                        <th>Avg(30)</th>
                        <th>Assignment(20)</th>
                        <th>Total CIE(50)</th>
                        <th>SEE(50)</th>
                        <th>Total</th>
                        <th>Attendance</th>
                    </tr>
                    <?php
                    $data = 'select * from marks where usn="' . $usn . '" and ia_total!=0';
                    $sd = $link3->query($data);
                    $cie = 0;
                    foreach ($sd as $gf) {
                        $sub = $gf['sub'];
                        if (substr($sub, 5, 2) == '37'){
                    ?>
                            <tr>
                                <td><?php echo $gf['sub'] ?></td>
                                <td><?php echo $gf['ia1'] ?></td>
                                <td><?php echo $gf['ia2'] ?></td>
                                <td><?php echo $gf['ia3'] ?></td>
                                <td><?php echo intval(($gf['ia3'] + $gf['ia1'] + $gf['ia2']) / 3) ?></td>
                                <td><?php echo $gf['assignment_avg'] ?></td>
                                <td><?php echo intval(($gf['ia3'] + $gf['ia1'] + $gf['ia2']) / 3) + $gf['assignment_avg'] ?></td>
                                <td><?php echo $gf['external'] ?></td>
                                <td><?php echo intval(($gf['ia3'] + $gf['ia1'] + $gf['ia2']) / 3) + $gf['assignment_avg'] + $gf['external'] ?></td>
                                <?php $ter = 'select distinct att_avg from attendance_average where sub="' . $gf['sub'] . '" and usn="' . $usn . '"';
                                $ressult = $con->query($ter);
                                foreach ($ressult as $fr) {
                                    $att_avg = $fr['att_avg'];
                                }
                                ?>
                                <td><?php echo $att_avg ?>%</td>

                            </tr>
                    <?php }
                    }  ?>
                </table>
            <?php } ?>
        </div>

        <?php
        $qull = "select distinct semester from students where usn=\"$usn\"";
        $result34 = $con->query($qull);
        foreach ($result34 as $u) {
            $sem = $u['semester'];
        }

        ?>

        <!-- first ia marks -->
        <div class="card mt-3" style="padding:3%;">
            <p style="font-style: italic;font-weight:600;color:black;"><?php echo $sem ?> sem</p>
            <?php if ($sem == 3 || $sem=4) { ?>
                <table>
                    <tr>
                        <th>Subject</th>
                        <th>IA1(20)</th>
                        <th>Ia2(20)</th>
                        <th>IA3(20)</th>
                        <th>Assignment(40)</th>
                        <th>Total CIE(50)</th>
                        <th>SEE</th>
                        <th>Total</th>
                        <th>Attendance</th>
                    </tr>
                    <?php
                    $data = 'select * from marks where usn="' . $usn . '" and ia_total!=0';
                    $sd = $link->query($data);
                    $cie = 0;
                    foreach ($sd as $gf) {
                        $sub = $gf['sub'];
                        $q_elec = 'select * from subjects_new where sub_name = "' . explode(' - ', $sub)[1] . '"';
                        $open = mysqli_fetch_assoc($link->query($q_elec))['sub_id'];
                        // echo substr($sub,5,2)  . "<br>";
                        if ($open=='8') {
                    ?>
                            <tr>
                                <td><?php echo $gf['sub'] ?></td>
                                <td><?php echo $gf['ia1'] ?></td>
                                <td><?php echo $gf['ia2'] ?></td>
                                <td><?php echo $gf['ia3'] ?></td>
                                <td><?php echo $gf['assignment_avg'] ?></td>
                                <td><?php echo intval(($gf['assignment_avg'] + $gf['ia1'] + $gf['ia2'] + $gf['ia3']) / 2) ?></td>
                                <td><?php echo $gf['external'] ?></td>
                                <td><?php echo intval(($gf['assignment_avg'] + $gf['ia1'] + $gf['ia2'] + $gf['ia3']) / 2) + $gf['external'] ?></td>
                                <?php $ter = 'select distinct att_avg from attendance_average where sub="' . $gf['sub'] . '" and usn="' . $usn . '"';
                                $ressult = $con->query($ter);
                                foreach ($ressult as $fr) {
                                    $att_avg = $fr['att_avg'];
                                }
                                ?>
                                <td><?php echo $att_avg ?>%</td>

                            </tr>
                    <?php }
                    } ?>
                </table>
                <table>
                    <tr>
                        <th>Subject</th>
                        <th>IA1(20)</th>
                        <th>Ia2(20)</th>
                        <th>IA3(20)</th>
                        <th>Avg(40)</th>
                        <th>Assignment(20)</th>
                        <th>IA(30)</th>
                        <th>LAB(20)</th>
                        <th>Total CIE(50)</th>
                        <th>SEE</th>
                        <th>Total</th>
                        <th>Attendance</th>
                    </tr>
                    <?php
                    $data = 'select * from marks where usn="' . $usn . '" and ia_total!=0';
                    $sd = $link->query($data);
                    $cie = 0;
                    foreach ($sd as $gf) {
                        $sub = $gf['sub'];
                        $q_elec = 'select * from subjects_new where sub_name = "' . explode(' - ', $sub)[1] . '"';
                        $open = mysqli_fetch_assoc($link->query($q_elec))['sub_id'];
                        if ($open=='7') {
                    ?>
                            <tr>
                                <td><?php echo $gf['sub'] ?></td>
                                <td><?php echo $gf['ia1'] ?></td>
                                <td><?php echo $gf['ia2'] ?></td>
                                <td><?php echo $gf['ia3'] ?></td>
                                <td><?php echo $m = max($gf['ia3'] + $gf['ia1'], $gf['ia1'] + $gf['ia2'], $gf['ia2'] + $gf['ia3']) ?></td>
                                <td><?php echo $gf['assignment_avg'] ?></td>
                                <td><?php echo intval(($m + $gf['assignment_avg']) / 2) ?></td>
                                <td><?php echo $gf['lab'] ?></td>
                                <td><?php echo intval(($m + $gf['assignment_avg']) / 2) + $gf['lab'] ?></td>
                                <td><?php echo $gf['external'] ?></td>
                                <td><?php echo intval(($m + $gf['assignment_avg']) / 2) + $gf['lab'] + $gf['external'] ?></td>
                                <?php $ter = 'select distinct att_avg from attendance_average where sub="' . $gf['sub'] . '" and usn="' . $usn . '"';
                                $ressult = $con->query($ter);
                                foreach ($ressult as $fr) {
                                    $att_avg = $fr['att_avg'];
                                }
                                ?>
                                <td><?php echo $att_avg ?>%</td>

                            </tr>
                    <?php }
                    } ?>
                </table>


                <table>

                    <tr>
                        <th>Subject</th>
                        <th>Record(20)</th>
                        <th>Observation(20)</th>
                        <th>VIVA(10)</th>
                        <th>IA Test(50)</th>
                        <th>Total CIE(50)</th>
                        <th>SEE(50)</th>
                        <th>Total</th>
                        <th>Attendance avg</th>

                    </tr>


                    <?php $labmark = 'select * from lab_marks where usn="' . $usn . '"';
                    $reslab = $con->query($labmark);
                    foreach ($reslab as $rowslab) {


                    ?>
                        <tr>
                            <td><?php echo $rowslab['sub']; ?></td>

                            <td><?php echo $rowslab['record']; ?></td>

                            <td><?php echo $rowslab['obc']; ?></td>

                            <td><?php echo $rowslab['viva']; ?></td>

                            <td><?php echo $rowslab['ia_avg']; ?></td>

                            <td><?php echo intval(($rowslab['record'] + $rowslab['obc'] + $rowslab['viva'] + $rowslab['ia_avg']) / 2); ?></td>

                            <?php if ($rowslab['exam_mark'] < 21) { ?>
                                <td style="color:red ;"><?php echo $rowslab['exam_mark']; ?></td>
                            <?php  } else { ?>
                                <td><?php echo $rowslab['exam_mark']; ?></td>
                            <?PHP } ?>
                            <td><?php echo $rowslab['exam_mark'] + intval(($rowslab['record'] + $rowslab['obc'] + $rowslab['viva'] + $rowslab['ia_avg']) / 2); ?></td>

                            <?php
                            $terr = 'select distinct att_avg from attendance_average where sub="' . $rowslab['sub'] . '" and usn="' . $usn . '"';
                            $ressultr = $con->query($terr);
                            foreach ($ressultr as $frr) {
                                $att_avgr = $frr['att_avg'];
                            }
                            ?>
                            <td><?php echo $att_avgr ?>%</td>

                        </tr>
                    <?php }  ?>
                </table>


                <table>
                    <tr>
                        <th>Subject</th>
                        <th>IA1(30)</th>
                        <th>Ia2(30)</th>
                        <th>IA3(30)</th>
                        <th>Avg(30)</th>
                        <th>Assignment(20)</th>
                        <th>Total CIE(50)</th>
                        <th>SEE(50)</th>
                        <th>Total</th>
                        <th>Attendance</th>
                    </tr>
                    <?php
                    $data = 'select * from marks where usn="' . $usn . '"  and ia_total!=0';
                    $sd = $link->query($data);
                    $cie = 0;
                    foreach ($sd as $gf) {
                        $sub = $gf['sub'];
                        // echo substr($sub, 4, 2) . "<br>";
                        if (substr($sub, 4, 2) == '37' || substr($sub, 4, 2) == '45') {
                    ?>
                            <tr>
                                <td><?php echo $gf['sub'] ?></td>
                                <td><?php echo $gf['ia1'] ?></td>
                                <td><?php echo $gf['ia2'] ?></td>
                                <td><?php echo $gf['ia3'] ?></td>
                                <td><?php echo intval(($gf['ia3'] + $gf['ia1'] + $gf['ia2']) / 3) ?></td>
                                <td><?php echo $gf['assignment_avg'] ?></td>
                                <td><?php echo intval(($gf['ia3'] + $gf['ia1'] + $gf['ia2']) / 3) + $gf['assignment_avg'] ?></td>
                                <td><?php echo $gf['external'] ?></td>
                                <td><?php echo intval(($gf['ia3'] + $gf['ia1'] + $gf['ia2']) / 3) + $gf['assignment_avg'] + $gf['external'] ?></td>
                                <?php $ter = 'select distinct att_avg from attendance_average where sub="' . $gf['sub'] . '" and usn="' . $usn . '"';
                                $ressult = $con->query($ter);
                                foreach ($ressult as $fr) {
                                    $att_avg = $fr['att_avg'];
                                }
                                ?>
                                <td><?php echo $att_avg ?>%</td>

                            </tr>
                    <?php }
                    } ?>
                </table>





























            <?php } else { ?>
                <table>
                    <tr>
                        <th>Subject</th>
                        <th>IA 1</th>
                        <th>IA 2</th>
                        <th>IA 3</th>
                        <th>Total IA</th>
                        <?php if ($sem != 3) { ?>
                            <th>IA Avg</th>
                        <?php } ?>
                        <th>Assignment avg</th>
                        <th>Total marks</th>
                        <th>External</th>
                        <th>Attendance avg</th>
                    </tr>
                    <?php $mark = 'select * from marks where usn="' . $usn . '"  and sem="' . $sem . '" and ia_total!=0';
                    $res = $con->query($mark);
                    foreach ($res as $rows) { ?>
                        <tr>
                            <td><?php echo $rows['sub'] ?></td>

                            <td><?php echo $rows['ia1'] ?></td>

                            <td><?php echo $rows['ia2'] ?></td>

                            <td><?php echo $rows['ia3'] ?></td>

                            <td><?php echo $rows['ia_total'] ?></td>
                            <?php if ($sem != 3) { ?>

                                <td><?php echo $rows['ia_avg'] ?></td>
                            <?php } ?>

                            <td><?php echo $rows['assignment_avg'] ?></td>
                            <?php if ($sem != 3) { ?>

                                <td><?php echo $rows['ia_avg'] + $rows['assignment_avg'] ?></td>
                            <?php } else { ?>
                                <td><?php echo $rows['ia_total'] + $rows['assignment_avg'] ?></td>

                            <?php } ?>

                            <?php if ($rows['external'] < 21) { ?>
                                <td style="color:red ;"><?php echo $rows['external'] ?></td>
                            <?php  } else { ?>
                                <td><?php echo $rows['external'] ?></td>
                            <?php  } ?>
                            <?php
                            $ter = 'select distinct att_avg from attendance_average where sub="' . $rows['sub'] . '" and usn="' . $usn . '"';
                            $ressult = $con->query($ter);
                            foreach ($ressult as $fr) {
                                $att_avg = $fr['att_avg'];
                            }
                            ?>
                            <td><?php echo $att_avg ?>%</td>

                        </tr>
                    <?php } ?>

                    <?php if ($sem == 8) {   ?>
                        <table>
                            <tr>
                                <h4>Project</h4>
                                <th>Phase 1</th>
                                <th>Phase 2</th>
                                <th>Total</th>
                            </tr>
                            <?php
                            $uty = 'select * from project_phase where usn="' . $usn . '"';
                            $ter = $con->query($uty);
                            foreach ($ter as $os) {
                            ?>
                                <tr>
                                    <td><?php echo $os['phase2']; ?></td>
                                    <td><?php echo $os['phase3']; ?></td>
                                    <td><?php echo $os['phase_total']; ?></td>
                                </tr>

                            <?php }
                        } else { ?>
                        </table>
                        <table>

                            <tr>
                                <th>Subject</th>
                                <th>IA 1</th>
                                <th>IA 2</th>
                                <th>IA Total</th>
                                <th>IA avg</th>
                                <th>Experiment avg</th>
                                <th>Total Internals</th>
                                <th>External</th>
                                <th>Attendance avg</th>

                            </tr>


                            <?php $labmark = 'select * from lab_marks where usn="' . $usn . '"';
                            $reslab = $con->query($labmark);
                            foreach ($reslab as $rowslab) {


                            ?>
                                <tr>
                                    <td><?php echo $rowslab['sub']; ?></td>

                                    <td><?php echo $rowslab['ia1_mark']; ?></td>

                                    <?php if ($rowslab['ia2_marks'] == 0) { ?>
                                        <td>N/A</td>
                                    <?php  } else { ?>
                                        <td><?php echo $rowslab['ia2_marks']; ?></td>
                                    <?php  } ?>

                                    <td><?php echo $rowslab['ia_total']; ?></td>

                                    <td><?php echo $rowslab['ia_avg']; ?></td>

                                    <td><?php echo $rowslab['exp_avg']; ?></td>

                                    <?php $totint = $rowslab['ia_avg'] + $rowslab['exp_avg'];   ?>
                                    <td><?php echo $totint; ?></td>

                                    <?php if ($rowslab['exam_mark'] < 21) { ?>
                                        <td style="color:red ;"><?php echo $rowslab['exam_mark']; ?></td>
                                    <?php  } else { ?>
                                        <td><?php echo $rowslab['exam_mark']; ?></td>
                                    <?PHP } ?>

                                    <?php
                                    $terr = 'select distinct att_avg from attendance_average where sub="' . $rowslab['sub'] . '" and usn="' . $usn . '"';
                                    $ressultr = $con->query($terr);
                                    foreach ($ressultr as $frr) {
                                        $att_avgr = $frr['att_avg'];
                                    }
                                    ?>
                                    <td><?php echo $att_avgr ?>%</td>

                                </tr>
                    <?php }
                        }
                    } ?>
                        </table>





                        <div class="card mt-2" style="padding:3%;">

                            <div class="row">

                                <p style="font-style: italic;font-weight:600;color:black;">Basic Details</p>

                                <div class="col col-lg-4 col-12 label mt-2">
                                    Admssion Number : <span class="value"><?php echo $row["adm_no"] ?></span>


                                </div>

                                <div class="col col-lg-4 col-12 label mt-2">
                                    Gender : <span class="value"><?php echo $row["gender"] ?></span>


                                </div>

                                <div class="col col-lg-4 col-12 label mt-2">
                                    Semester : <span class="value"><?php echo $row["semester"] ?></span>


                                </div>
                                <div class="col col-lg-4 col-12 label mt-2">
                                    Section : <span class="value"><?php echo $row["section"] ?></span>


                                </div>


                                <div class="col col-lg-4 col-12 label mt-2">
                                    Branch : <span class="value"><?php echo $row["branch"] ?></span>


                                </div>
                                <div class="col col-lg-4 col-12 label mt-2">
                                    Mobile Number :


                                </div>
                                <div class="col col-lg-4 col-12 label mt-2">
                                    Aadhar Number : <span class="value"><?php echo $row["aadhar"] ?></span>


                                </div>
                                <div class="col col-lg-4 col-12 label mt-2">
                                    Date Of Admission : <span class="value"><?php echo $row["data_of_admission"] ?></span>


                                </div>
                                <div class="col col-lg-4 col-12 label mt-2">
                                    Nationality : <span class="value"><?php echo $row["nationality"] ?></span>


                                </div>
                                <div class="col col-lg-4 col-12 label mt-2">
                                    KCET : <span class="value"><?php echo $row["kcet"] ?></span>


                                </div>
                                <div class="col col-lg-4 col-12 label mt-2">
                                    COME DK : <span class="value"><?php echo $row["comedk"] ?></span>


                                </div>
                                <div class="col col-lg-4 col-12 label mt-2">
                                    JEE : <span class="value"><?php echo $row["jee"] ?></span>


                                </div>
                            </div>
                            <div class="row mt-4">
                                <p style="font-style: italic;font-weight:600;color:black;">Present Address</p>
                                <div class="col col-lg-4 col-12 label ">
                                    District: <span class="value"><?php echo $row["present_state"] ?></span>


                                </div>
                                <div class="col col-lg-4 col-12 label ">
                                    District: <span class="value"><?php echo $row["present_dist"] ?></span>


                                </div>
                                <div class="col col-lg-4 col-12 label ">
                                    House Number: <span class="value"><?php echo $row["present_house_no_name"] ?></span>


                                </div>
                                <div class="col col-lg-4 col-12 label mt-2">
                                    Post Village <span class="value"><?php echo $row["present_post_village"] ?></span>


                                </div>
                                <div class="col col-lg-4 col-12 label mt-2 ">
                                    Pin-Code: <span class="value"><?php echo $row["present_pincode"] ?></span>


                                </div>
                            </div>

                            <div class="row mt-4">
                                <p style="font-style: italic;font-weight:600;color:black;">Permanent Address</p>
                                <div class="col col-lg-4 col-12 label ">
                                    District: <span class="value"><?php echo $row["permanent_state"] ?></span>


                                </div>
                                <div class="col col-lg-4 col-12 label ">
                                    District: <span class="value"><?php echo $row["permanent_dist"] ?></span>


                                </div>
                                <div class="col col-lg-4 col-12 label ">
                                    House Number: <span class="value"><?php echo $row["permanent_house_no_name"] ?></span>


                                </div>
                                <div class="col col-lg-4 col-12 label mt-2">
                                    Post Village <span class="value"><?php echo $row["permanent_post_village"] ?></span>


                                </div>
                                <div class="col col-lg-4 col-12 label mt-2 ">
                                    Pin-Code: <span class="value"><?php echo $row["permanent_pin_code"] ?></span>


                                </div>
                            </div>

                        </div>


                    <?php
                }
                // } 
                    ?>

                    <!-- parents details -->
                    <?php
                    // $con = mysqli_connect("localhost", "root", "", "erp_alvas");
                    // if (mysqli_connect_error()) {
                    //     echo "error";
                    // } else {
                    // $usn = $_SESSION["username"];
                    $que = "select adm_no from students where usn=\"$usn\"";
                    $result = $con->query($que);

                    foreach ($result as $row) {
                        $admission_no = $row["adm_no"];
                        $_SESSION["adm_no"] = $row["adm_no"];
                        $que = "select * from parents_details where adm_no=\"$admission_no\"";
                        $re = $con->query($que);

                        foreach ($re as $r1) {
                    ?>


                            <div class="card mt-3" style="padding:3%;">
                                <div class="row">
                                    <p style="font-style: italic;font-weight:600;color:black;">Parents Details</p>
                                    <p style="font-style: italic;font-weight:600;color:black;">Father Details</p>
                                    <div class="col col-lg-4 col-12 label mt-2">
                                        Name : <span class="value"><?php echo $r1["father_name"] ?></span>


                                    </div>
                                    <div class="col col-lg-4 col-12 label mt-2">
                                        Mobile Number : <span class="value"><?php echo $r1["father_mob_no"] ?></span>



                                    </div>


                                    <div class="col col-lg-4 col-12 label mt-2">
                                        Email ID : <span class="value"><?php echo $r1["father_email_id"] ?></span>


                                    </div>
                                    <div class="col col-lg-4 col-12 label mt-2">
                                        Aadhar card Number : <span class="value"><?php echo $r1["father_aadhar"] ?></span>


                                    </div>
                                    <div class="col col-lg-4 col-12 label mt-2">
                                        PAN card Number : <span class="value"><?php echo $r1["father_pan_cad"] ?></span>

                                    </div>


                                    <div class="col col-lg-4 col-12 label mt-2">
                                        Occupation : <span class="value"><?php echo $r1["father_occupation"] ?></span>


                                    </div>
                                    <p style="font-style: italic;font-weight:600;color:black;"></p>
                                    <p style="font-style: italic;font-weight:600;color:black;">Mother Details</p>
                                    <div class="col col-lg-4 col-12 label mt-2">
                                        Name : <span class="value"><?php echo $r1["mother_name"] ?></span>


                                    </div>
                                    <div class="col col-lg-4 col-12 label mt-2">
                                        Mobile Number : <span class="value"><?php echo $r1["mother_mob_no"] ?></span>


                                    </div>
                                    <div class="col col-lg-4 col-12 label mt-2">
                                        Email ID : <span class="value"><?php echo $r1["mother_email_id"] ?></span>


                                    </div>
                                    <div class="col col-lg-4 col-12 label mt-2">
                                        aadhar card Number : <span class="value"><?php echo $r1["mother_aadhar"] ?></span>


                                    </div>
                                    <div class="col col-lg-4 col-12 label mt-2">
                                        PAN card Number : <span class="value"><?php echo $r1["mother_pan_card"] ?></span>

                                    </div>


                                    <div class="col col-lg-4 col-12 label mt-2">
                                        Occupation : <span class="value"><?php echo $r1["mother_occupation"] ?></span>


                                    </div>

                                </div>
                            </div>

                    <?php
                        }
                    }
                    ?>

                    <!-- sslc marks details -->
                    <?php
                    // $con = mysqli_connect("localhost", "root", "", "erp_alvas");
                    // if (mysqli_connect_error()) {
                    //     echo "error";
                    // } else {
                    // $usn = $_SESSION["username"];
                    $que = "select adm_no from students where usn=\"$usn\"";
                    $result = $con->query($que);

                    foreach ($result as $row) {
                        $admission_no = $row["adm_no"];
                        $_SESSION["adm_no"] = $row["adm_no"];
                        $que = "select * from sslc_details where adm_no=\"$admission_no\"";
                        $re = $con->query($que);

                        foreach ($re as $r) {
                    ?>


                            <div class="card mt-3" style="padding:3%;">
                                <div class="row">
                                    <p style="font-style: italic;font-weight:600;color:black;">SSLC Details</p>

                                    <div class="col col-lg-4 col-12 label mt-2">
                                        School Name : <span class="value"><?php echo $r["sslc_school"] ?></span>


                                    </div>
                                    <div class="col col-lg-4 col-12 label mt-2">
                                        School Board : <span class="value"><?php echo $r["sslc_board_university"] ?></span>


                                    </div>


                                    <div class="col col-lg-4 col-12 label mt-2">
                                        SSLC Reg No : <span class="value"><?php echo $r["sslc_reg_no"] ?></span>


                                    </div>
                                    <div class="col col-lg-4 col-12 label mt-2">
                                        SSLC Year :<span class="value"><?php echo $r["sslc_year"] ?></span>


                                    </div>
                                    <div class="col col-lg-4 col-12 label mt-2">
                                        SSLC Max Marks: <span class="value"><?php echo $r["sslc_max_marks"] ?></span>


                                    </div>
                                    <div class="col col-lg-4 col-12 label mt-2">
                                        SSLC Obtained Marks : <span class="value"><?php echo $r["sslc_obtained_marks"] ?></span>


                                    </div>
                                    <div class="col col-lg-4 col-12 label mt-2">
                                        SSLC Percentage : <span class="value"><?php echo $r["sslc_percentage"] ?></span>


                                    </div>

                                </div>
                            </div>

                    <?php
                        }
                    }
                    //} 
                    ?>

                    <?php
                    // $con = mysqli_connect("localhost", "root", "", "erp_alvas");
                    // if (mysqli_connect_error()) {
                    //     echo "error";
                    // } else {
                    // $usn = $_SESSION["username"];


                    $que = "select * from puc_details where adm_no=\"$admission_no\"";

                    $re = $con->query($que);

                    foreach ($re as $r) {
                    ?>


                        <div class="card mt-3" style="padding:3%;">
                            <div class="row">
                                <p style="font-style: italic;font-weight:600;color:black;">PUC Details</p>

                                <div class="col col-lg-4 col-12 label mt-2">
                                    College Name : <span class="value"><?php echo $r["puc_school"] ?></span>


                                </div>
                                <div class="col col-lg-4 col-12 label mt-2">
                                    Board : <span class="value"><?php echo $r["puc_board_university"] ?></span>


                                </div>


                                <div class="col col-lg-4 col-12 label mt-2">
                                    Reg No : <span class="value"><?php echo $r["puc_reg_no"] ?></span>


                                </div>

                                <div class="col col-lg-4 col-12 label mt-2">
                                    Max Marks: <span class="value"><?php echo $r["puc_max_marks"] ?></span>


                                </div>
                                <div class="col col-lg-4 col-12 label mt-2">
                                    PUC Obtained Marks : <span class="value"><?php echo $r["puc_obtained_marks"] ?></span>


                                </div>
                                <div class="col col-lg-4 col-12 label mt-2">
                                    Year :<span class="value"><?php echo $r["puc_year"] ?></span>


                                </div>
                                <div class="col col-lg-4 col-12 label mt-2">
                                    Physics maximum marks : <span class="value"><?php echo $r["puc_phy_max_marks"] ?></span>


                                </div>
                                <div class="col col-lg-4 col-12 label mt-2">
                                    Physics Obtained marks : <span class="value"><?php echo $r["puc_phy_obtained_marks"] ?></span>


                                </div>
                                <div class="col col-lg-4 col-12 label mt-2">
                                    Percentage : <span class="value"><?php echo $r["puc_percentage"] ?></span>


                                </div>


                                <div class="col col-lg-4 col-12 label mt-2">
                                    Maths maximum marks : <span class="value"><?php echo $r["puc_maths_max_marks"] ?></span>


                                </div>
                                <div class="col col-lg-4 col-12 label mt-2">
                                    Maths Obtained marks : <span class="value"><?php echo $r["puc_phy_obtained_marks"] ?></span>


                                </div>
                                <div class="col col-lg-4 col-12 label mt-2">
                                    Subject Total Marks : <span class="value"><?php echo $r["puc_sub_total_marks"] ?></span>


                                </div>
                                <div class="col col-lg-4 col-12 label mt-2">
                                    Chemistry maximum marks : <span class="value"><?php echo $r["puc_che_max_marks"] ?></span>


                                </div>
                                <div class="col col-lg-4 col-12 label mt-2">
                                    Chemistry Obtained marks : <span class="value"><?php echo $r["puc_phy_obtained_marks"] ?></span>


                                </div>
                                <div class="col col-lg-4 col-12 label mt-2">
                                    English Maximum Marks : <span class="value"><?php echo $r["puc_eng_max_marks"] ?></span>


                                </div>
                                <div class="col col-lg-4 col-12 label mt-2">
                                    Bio/CS/E/S maximum marks : <span class="value"><?php echo $r["puc_elective_max_marks"] ?></span>


                                </div>
                                <div class="col col-lg-4 col-12 label mt-2">
                                    Bio/CS/E/S Obtained marks : <span class="value"><?php echo $r["puc_elective_obtained_marks"] ?></span>


                                </div>

                                <div class="col col-lg-4 col-12 label mt-2">
                                    English Max Marks : <span class="value"><?php echo $r["puc_eng_obtained_marks"] ?></span>


                                </div>


                            </div>
                        </div>

        </div>
        <table>
            <h4>CGPA/SGPA</h4>
            <tr>
                <th>SGPA1</th>
                <th>CGPA1</th>
                <th>SGPA2</th>
                <th>CGPA2</th>
                <th>SGPA3</th>
                <th>CGPA3</th>
                <th>SGPA4</th>
                <th>CGPA4</th>
                <th>SGPA5</th>
                <th>CGPA5</th>
                <th>SGPA6</th>
                <th>CGPA6</th>
                <th>SGPA7</th>
                <th>CGPA7</th>
                <th>SGPA8</th>
                <th>CGPA8</th>
            </tr>
            <?php
                        $ftr = 'select * from cgpa where usn="' . $usn . '"';
                        $js = $con->query($ftr);
                        foreach ($js as $tf) {




            ?>
                <tr>
                    <td><?php if ($tf['sgpa1'] == 0) {
                                echo "N/A";
                            } else {
                                echo round($tf['sgpa1'], 2);
                            } ?></td>
                    <td><?php if ($tf['cgpa1'] == 0) {
                                echo "N/A";
                            } else {
                                echo round($tf['cgpa1'], 2);
                            } ?></td>
                    <td><?php if ($tf['sgpa2'] == 0) {
                                echo "N/A";
                            } else {
                                echo round($tf['sgpa2'], 2);
                            } ?></td>
                    <td><?php if ($tf['cgpa2'] == 0) {
                                echo "N/A";
                            } else {
                                echo round($tf['cgpa2'], 2);
                            } ?></td>
                    <td><?php if ($tf['sgpa3'] == 0) {
                                echo "N/A";
                            } else {
                                echo round($tf['sgpa3'], 2);
                            } ?></td>
                    <td><?php if ($tf['cgpa3'] == 0) {
                                echo "N/A";
                            } else {
                                echo round($tf['cgpa3'], 2);
                            } ?></td>
                    <td><?php if ($tf['sgpa4'] == 0) {
                                echo "N/A";
                            } else {
                                echo round($tf['sgpa4'], 2);
                            } ?></td>
                    <td><?php if ($tf['cgpa4'] == 0) {
                                echo "N/A";
                            } else {
                                echo round($tf['cgpa4'], 2);
                            } ?></td>
                    <td><?php if ($tf['sgpa5'] == 0) {
                                echo "N/A";
                            } else {
                                echo round($tf['sgpa5'], 2);
                            } ?></td>
                    <td><?php if ($tf['cgpa5'] == 0) {
                                echo "N/A";
                            } else {
                                echo round($tf['cgpa5'], 2);
                            } ?></td>
                    <td><?php if ($tf['sgpa6'] == 0) {
                                echo "N/A";
                            } else {
                                echo round($tf['sgpa6'], 2);
                            } ?></td>
                    <td><?php if ($tf['cgpa6'] == 0) {
                                echo "N/A";
                            } else {
                                echo round($tf['cgpa6'], 2);
                            } ?></td>
                    <td><?php if ($tf['sgpa7'] == 0) {
                                echo "N/A";
                            } else {
                                echo round($tf['sgpa7'], 2);
                            } ?></td>
                    <td><?php if ($tf['cgpa7'] == 0) {
                                echo "N/A";
                            } else {
                                echo round($tf['cgpa7'], 2);
                            } ?></td>
                    <td><?php if ($tf['sgpa8'] == 0) {
                                echo "N/A";
                            } else {
                                echo round($tf['sgpa8'], 2);
                            } ?></td>
                    <td><?php if ($tf['cgpa8'] == 0) {
                                echo "N/A";
                            } else {
                                echo round($tf['cgpa8'], 2);
                            } ?></td>
                </tr>
            <?php } ?>
        </table>


        <div>
            <?php include "../template/scroll.php"; ?>
        </div>
        </div>
    <?php
                    }
                    include("../template/footer-fac.php");
    ?>
    <script>
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
            });
        });                                                   
    </script>