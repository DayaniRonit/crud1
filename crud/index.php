<?php

include "header.php";

include "db.php";

$sql = " SELECT * FROM student_detail order by id ";
$result = mysqli_query($conn, $sql);

// echo" <pre>";
// print_r($result);        
// echo" </pre>";

?>

<div class="container">

    <h2>Srudent Details</h2>
    <table class="table">
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Gender</th>
            <th>Language</th>
            <th>City</th>
            <th>Images</th>
            <th>Action</th>
        </tr>
        <tr>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                // echo" <pre>";
                // print_r($row);
                // echo" </pre>";
            
            ?>
            <td><?php echo $row["id"]?></td>
            <td><?php echo $row["name"]?></td>
            <td><?php echo $row["email"]?></td>
            <td><?php echo $row["phone"]?></td>
            <td><?php echo $row["address"]?></td>
            <td><?php echo $row["gender"]?></td>
            <td><?php echo $row["Language"]?></td>
            <td><?php echo $row["city"]?></td>
            <td><img src="<?php echo $row["file"] ?>" width="50"></td>
            <td>
                <a href="edit.php?id=<?php echo $row['id'] ?>">Edit</a>
                <a href="delet.php?ids=<?php echo $row['id'] ?>">Delet</a>
            </td>
        </tr>
        <?php
}
        ?>
    </table>
</div>