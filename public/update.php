<?php

/**
 * List all users with a link to edit
 */

require "../config.php";
require "../common.php";

try {
  $connection = new PDO($dsn, $username, $password, $options);

  $sql = "SELECT * FROM Hogwarts";

  $statement = $connection->prepare($sql);
  $statement->execute();

  $result = $statement->fetchAll();
} catch(PDOException $error) {
  echo $sql . "<br>" . $error->getMessage();
}
?>
<?php require "templates/header.php"; ?>
        
<h2>Update Users</h2>

<table>
    <thead>
        <tr>
            <th>UserID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>HouseID</th>
            <th>ActivityID</th>
            <th>LocationID</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($result as $row) : ?>
        <tr>
            <td><?php echo escape($row["UserID"]); ?></td>
            <td><?php echo escape($row["FirstName"]); ?></td>
            <td><?php echo escape($row["LastName"]); ?></td>
            <td><?php echo escape($row["HouseID"]); ?></td>
            <td><?php echo escape($row["ActivityID"]); ?></td>
            <td><?php echo escape($row["LocationID"]); ?></td>
            <td><a href="update-single.php?id=<?php echo escape($row["UserID"]); ?>">Edit</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<a href="home.php">Back to home</a>

<?php require "templates/footer.php"; ?>