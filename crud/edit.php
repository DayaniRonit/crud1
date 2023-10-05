<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?PHP

    include "header.php";
    include "db.php";

    if (isset($_GET["id"])) {
        $getid = $_GET["id"];  

        $sql = " SELECT * FROM student_detail  WHERE  id = '$getid' ";
        $result = mysqli_query($conn, $sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {

                $gender = $row["gender"];
                $language = explode(',', $row["Language"]);
                $city = $row["city"];

    ?>
                <div class="container">
                    <h2>student details</h2>
                    <form action="update.php" method="post" class="row g-3" enctype="multipart/form-data" class="row g-3">

                        <div class="col-md-6">
                            <input type="hidden" name="id" id="id" value="<?PHP echo $row['id'] ?>">

                            <label for="name" class="form-label">Name:-</label>
                            <input type="text" class="form-control" id="name" name="name"  value="<?PHP echo $row['name'] ?>">

                        </div>
                        <div class="col-md-6">

                            <label for="email" class="form-label">Email:-</label>
                            <input type="text" class="form-control" id="email" name="email"  value="<?PHP echo $row['email'] ?>">

                        </div>
                        <div class="col-md-6 mt-4">

                            <label for="phone" class="form-label">Phone:-</label>
                            <input type="text" class="form-control" id="phone" name="phone"   value="<?PHP echo $row['phone'] ?>">

                        </div>
                        <div class="col-md-6 mt-4">

                            <label for="address" class="form-label">Address:-</label>
                            <input type="text" class="form-control" id="address" name="address"  value="<?PHP echo $row['address'] ?>">

                        </div>

                        <div class="col-md-6 mt-4">

                            <label for="" class="form-labal">Gender:-</label>
                            <div class="form-check-labal">
                                <input type="radio" id="male" name="gender" value="male" <?PHP if($gender == "male") {echo "checked";} ?>>
                                <label for="male">male</label>
                                <input type="radio" id="female" name="gender" value="female" <?PHP if($gender == "female") {echo "checked";} ?>>
                                <label for="female">female</label><br>
                            </div>
                        </div>
                        <div class="col-md-6 mt-4">

                            <label for="" class="form-labal">Language:-</label>
                            <div class="form-check-labal">
                                <input type="checkbox" id="Hindi" name="Language[]" value="Hindi" <?PHP if(in_array("Hindi",$language)) {echo "checked";} ?>>
                                <label for="Hindi"> Hindi</label>
                                <input type="checkbox" id="Gujrati" name="Language[]" value="Gujrati" <?PHP if(in_array("Gujrati",$language)) {echo "checked";} ?>>
                                <label for="Gujrati"> Gujrati</label>
                                <input type="checkbox" id="English" name="Language[]" value="English" <?PHP if(in_array("English",$language)) {echo "checked";} ?>>
                                <label for="English">English</label>
                            </div>

                        </div>
                        <div class="col-md-6 mt-4">

                            <label for="city" class="form-labal">Select yout city:</label>
                            <select id="city" name="city" class="form-control">
                                <option value="Surat" <?PHP if($city == "Surat") {echo "selected";} ?>>Surat</option>
                                <option value="Ahemdabad" <?PHP if($city == "Ahemdabad") {echo "selected";} ?>>Ahemdabad</option>
                                <option value="Pune" <?PHP if($city == "Pune") {echo "selected";} ?>>Pune</option>
                                <option value="Bhavnagar" <?PHP if($city == "Bhavnagar") {echo "selected";} ?>>Bhavnagar</option>
                            </select>
                        </div>

                        <div class="col-md-6 mt-4">
                            <label for="password" class="form-labal">password:-</label>
                            <input type="text" name="password" id="password" class="form-control" value="<?PHP echo $row['password'] ?>">
                        </div>
                        <div class="col-md-6 mt-4">
                            <label for="file" class="form-labal">Select a file :-</label>
                            <input type="file" name="file" id="file" class="form-control">
                            <img src="<?PHP echo $row['file']  ?>" width="75">
                        </div>

                        <div class="col-md-12 mt-4">
                            <button type="submit" name="submit" class="btn btn-dark">Submit</button>
                        </div>
                    </form>
                </div>
    <?PHP

            }
        }
    }
    ?>
</body>

</html>