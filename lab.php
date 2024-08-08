<?php
    require_once "config.php";
error_reporting(0);

    $q1 = 'select * from dept_pso';
    $q2 = 'select distinct semester from students';
    $result2 = $con->query($q2);
    $result1 = $con->query($q1);
?>

<body>
    <form action="show_students.php" method="POST">
        <div class="container mt-5">

            <div class="form-group">
                <select class="form-select" id="exampleSelect1">
                  <option selected disabled>select</option>
                  <option>disabled</option>
                  
                </select>
                        
             <button class="btn btn-primary" type="submit">SUBMIT</button>
            </div> 
            <table class="table table-hover mt-4">
                <thead>
                    <tr>
                        <th scope="col" style="width: 30px;"></th>
                        <th scope="col">USN</th>
                        <th scope="col">Name</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row"><input type="checkbox" style="width: 30px;"></th>
                        <td>4al17vs</td>
                        <td>Otto</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </form>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
        crossorigin="anonymous"></script>
</body>

</html>