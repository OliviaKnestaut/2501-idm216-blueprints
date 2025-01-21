<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blueprints Database Dump</title>
    <link rel="icon" href="images/team-site/fish.svg">
    <link rel="stylesheet" href="css/team_styles.css">
</head>
<body>

<?php require_once 'alpha/includes/db.php';
    
$result = mysqli_query($connection,"SELECT * FROM `idm-216_users`");
$data = $result->fetch_all(MYSQLI_ASSOC);
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

<div class="tablewrapper">
    <table>
        <tr>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Password Hash</th>
            <th>Created At</th>
        </tr>
        <?php foreach($data as $row): ?>
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

<?php mysqli_close($connection); ?>

</body>
</html>