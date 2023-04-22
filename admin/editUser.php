<?php
include '../admin/head.php';
include '../admin/header.php';
include '../admin/sidebar.php';
include '../db.php';
if($_SESSION['loggedinuserrole']=="User") {
    header('Location: ../index.php');
    die();
}
?>
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <div class="container-xl px-12 mt-12">
                <div style="justify-content: center;margin-top: 20px" class="row">
                    <div class="col-xl-10">
                        <div class="card mb-4">
                            <div class="card-header">Edit User Details</div>
                            <div class="card-body">
                                <form>
                                    <?php
                                    $sql = "SELECT * from users  where id='" . $_GET['id'] . "' ";
                                    $query = mysqli_query($db, $sql);

                                    if (mysqli_num_rows($query) > 0) {
                                        while ($row1 = mysqli_fetch_assoc($query)) {
                                    ?>
                                            <div class="row gx-3 mb-3">
                                                <!-- Form Group (first name)-->
                                                <div class="col-md-6">
                                                    <input type="hidden" name="id" id="id" value="<?= $_GET['id'] ?>">
                                                    <label class="small mb-1" for="inputFirstName">First name</label>
                                                    <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" value="<?php echo $row1['first_name']; ?>" />
                                                </div>
                                                <!-- Form Group (last name)-->
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputLastName">Last name</label>
                                                    <input class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" value="<?php echo $row1['last_name']; ?>" />
                                                </div>
                                            </div>
                                            <!-- Form Row        -->
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputPhone">Phone number</label>
                                                    <input class="form-control" id="inputPhoneNumber" type="tel" placeholder="Enter your phone number" value="<?php echo $row1['phone']; ?>" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputLocation">Password</label>
                                                    <input class="form-control" id="inputPassword" type="text" placeholder="Enter your password" value="<?php echo $row1['password']; ?>" />
                                                </div>
                                            </div>
                                            <!-- Form Group (email address)-->

                                            <!-- Form Row-->
                                            <div class="row gx-3 mb-3">
                                                <!-- Form Group (phone number)-->
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputEmailAddress">Email address</label>
                                                    <input class="form-control" id="inputEmailAddress" type="email" placeholder="Enter your email address" value="<?php echo $row1['email']; ?>" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputBirthday">User Role</label>
                                                    <select class="form-control" id="inputRole">
                                                        <?php if ($row1['role'] == "Admin"): ?>
                                                        <option value="Admin" selected>Admin</option>
                                                        <option value="User"  >User</option>
                                                        <?php elseif ($row1['role'] == "User"): ?>
                                                        <option value="User" selected>User</option>
                                                        <option value="Admin"  >Admin</option>
                                                        <?php else: ?>
                                                        <option value="User" >User</option>
                                                        <option value="Admin"  >Admin</option>
                                                        <?php endif ?>
                                                    </select>
                                                </div>
                                                        </div>
                                            <!-- Save changes button-->
                                            <button onclick="updateUser();" class="btn btn-primary" type="button">Save changes</button>
                                    <?php
                                        }
                                    }
                                    ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?php
        include '../admin/footer.php';
        ?>
    </div>

</div>

<script>
    function updateUser() {

        var inputFirstName = document.getElementById("inputFirstName").value;
        var inputLastName = document.getElementById("inputLastName").value;
        var inputEmailAddress = document.getElementById("inputEmailAddress").value;
        var inputPassword = document.getElementById('inputPassword').value;
        var inputPhoneNumber = document.getElementById('inputPhoneNumber').value;
        var id = document.getElementById('id').value;
        var inputRole = document.getElementById('inputRole').value;
        if (inputFirstName == "" || inputFirstName == "0"  || inputEmailAddress == "" || inputPassword == "" || inputPhoneNumber == "" || inputRole == ""  ) {
            alert("Please fill all the fields");
            return;
        }
        $.ajax({
            type: 'POST',
            url: 'updateUser.php',
            data: {
                inputFirstName: inputFirstName,
                inputLastName: inputLastName,
                inputEmailAddress: inputEmailAddress,
                inputPassword: inputPassword,
                inputPhoneNumber: inputPhoneNumber,
                inputId: id,
                inputRole: inputRole,

            },
            success: function(res) {
                alert(res);
             
                window.location.replace('allUsers.php');            
                console.log(res)
            }
        });

    }
</script>