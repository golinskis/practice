<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
               Admin
                <small>Subheading</small>
            </h1>





            <?php



            $resultSet = User::findAllUsers();

            while($row = mysqli_fetch_array($resultSet)){

                echo $row['username'] . "<br>";
            }



//
//            $foundUser = User::findUser(2);
//            $user = new User();
//            $user->setUsername($foundUser['username'])->setId($foundUser['id'])->setFirstName($foundUser['first_name'])->setLastName($foundUser['last_name'])->setPassword($foundUser['password']);
//           var_export($user);
//
//
//            $foundUser = User::findUser(1);
//            $user1 = User::instantion($foundUser);
//
//            var_export($user1);



            ?>






            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Blank Page
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

</div>
<!-- /.container-fluid -->