<?php
    session_start();
    $year = explode(' - ', $_POST['year']);
    // print_r($year);
    $_SESSION['year1'] = $year[0];
    $_SESSION['year2'] = $year[1];
    $_SESSION['is_archive'] = 1;
    header("Location: fac_dashboard.php");