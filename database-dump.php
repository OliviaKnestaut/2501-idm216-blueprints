<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Dump | Blueprints</title>
    <link rel="icon" href="images/team-site/fish.svg">
    <link rel="stylesheet" href="css/team_styles.css">
</head>
<body>

<?php require_once 'alpha/includes/db.php';
    
$resultusers = mysqli_query($connection,"SELECT * FROM `idm-216_users`");
$userdata = $resultusers->fetch_all(MYSQLI_ASSOC);

?>

    <h1>Users Database Dump</h1>
    <p>IDM-216 Project, Team Blueprints</p>

    <picture>
        <source
        media="(min-width: 1034px)"
        srcset="images/team-site/fish-desktop.svg">
        
        <source
        media="(min-width: 700px)"
        srcset="images/team-site/fish-tablet.svg">

        <img class="fish-img"
        src="images/team-site/fish-mobile.svg"
        alt="Row of simple blue fish swimming across the screen">
    </picture>

<h3>idm-216_users</h3>
<div class="tablewrapper">
    <table>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Password Hash</th>
            <th>Created At</th>
        </tr>
        <?php foreach($userdata as $row): ?>
        <tr>
            <td><?= htmlspecialchars($row['firstname']) ?></td>
            <td><?= htmlspecialchars($row['lastname']) ?></td>
            <td><?= htmlspecialchars($row['username']) ?></td>
            <td><?= htmlspecialchars($row['password']) ?></td>
            <td><?= htmlspecialchars($row['created_at']) ?></td>
        </tr>
        <?php endforeach ?>
    </table>
</div>

<?php
$resultmenu = mysqli_query($connection,"SELECT * FROM `idm-216_menu`");
$menudata = $resultmenu->fetch_all(MYSQLI_ASSOC); ?>

<h3>idm-216_menu</h3>
<div class="tablewrapper">
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Category</th>
            <th>Diet</th>
        </tr>
        <?php foreach($menudata as $row): ?>
        <tr>
            <td><?= htmlspecialchars($row['id']) ?></td>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td><?= htmlspecialchars($row['description']) ?></td>
            <td><?= htmlspecialchars($row['price']) ?></td>
            <td><?= htmlspecialchars($row['category']) ?></td>
            <td><?= htmlspecialchars($row['diet']) ?></td>
        </tr>
        <?php endforeach ?>
    </table>
</div>

<?php mysqli_close($connection); ?>

</body>
</html>