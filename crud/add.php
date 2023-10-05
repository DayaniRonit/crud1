<?php

include "header.php";

include "db.php";

if (isset($_POST["submit"])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $language = implode(',', $_POST['Language']);  
    $city = $_POST['city'];
    $password = md5($_POST['password']);

    $file_name = $_FILES['file']['name'];
    $tmp_name = $_FILES['file']['tmp_name'];
    $filepath = "./images/" . uniqid() . "-" . $file_name;
    move_uploaded_file($tmp_name, $filepath);

    $sql = "INSERT INTO student_detail (name,email,phone,address,gender,Language,city,file,password) VALUES ('$name','$email','$phone','$address','$gender','$language','$city','$filepath','$password')";

    mysqli_query($conn, $sql);
    header("location:index.php");
}
?>

<div class="container">
    <h2>student details</h2>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" class="row g-3" enctype="multipart/form-data" class="row g-3">

        <div class="col-md-6">

            <label for="name"   class="form-label">Name:-</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="please enter your name..">

        </div>
        <div class="col-md-6">

            <label for="email" class="form-label">Email:-</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="please enter your email..">

        </div>
        <div class="col-md-6 mt-4">

            <label for="phone" class="form-label">Phone:-</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="please enter your phone number..">

        </div>
        <div class="col-md-6 mt-4">

            <label for="address" class="form-label">Address:-</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="please enter your address..">

        </div>

        <div class="col-md-6 mt-4">

            <label for="" class="form-labal">Gender:-</label>
            <div class="form-check-labal">
                <input type="radio" id="male" name="gender" value="male">
                <label for="male">male</label>
                <input type="radio" id="female" name="gender" value="female">
                <label for="female">female</label><br>
            </div>
        </div>
        <div class="col-md-6 mt-4">  

            <label for="" class="form-labal">Language:-</label>
            <div class="form-check-labal">
                <input type="checkbox" id="Hindi" name="Language[]" value="Hindi">
                <label for="Hindi"> Hindi</label>
                <input type="checkbox" id="Gujrati" name="Language[]" value="Gujrati">
                <label for="Gujrati"> Gujrati</label>
                <input type="checkbox" id="English" name="Language[]" value="English">
                <label for="English">English</label>
            </div>

        </div>
        <div class="col-md-6 mt-4">

            <label for="city" class="form-labal">Select yout city:</label>
            <select id="city" name="city" class="form-control">
                <option value="Surat">Surat</option>
                <option value="Ahemdabad">Ahemdabad</option>
                <option value="Pune">Pune</option>
                <option value="Bhavnagar">Bhavnagar</option>
            </select>
        </div>

        <div class="col-md-6 mt-4">
            <label for="password" class="form-labal">password:-</label>
            <input type="text" name="password" id="password" class="form-control" placeholder="Enter your password">
        </div>
        <div class="col-md-6 mt-4">
            <label for="file" class="form-labal">Select a file :-</label>
            <input type="file" name="file" id="file" class="form-control">
        </div>

        <div class="col-md-12 mt-4">
            <button type="submit" name="submit" class="btn btn-dark">Submit</button>
        </div>
    </form>
</div>