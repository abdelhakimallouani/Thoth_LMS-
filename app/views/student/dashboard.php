<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
<h2>Welcome, <?= $student['name'] ?></h2>
<a href="/logout">Logout</a>

<h3>Available Courses</h3>
<ul>
    <?php foreach($courses as $course): ?>
        <li>
            <strong><?= $course['title'] ?></strong><br>
            <?= $course['description'] ?>
        </li>
    <?php endforeach; ?>
</ul>
</body>
</html>
