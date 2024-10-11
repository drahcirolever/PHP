<?php require_once 'dbConfigRevelo.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $query = "SELECT
				CASE 
					WHEN year < 1960 THEN 'Ancient'
					WHEN year < 1980 THEN 'Classic'
					WHEN year < 2000 THEN 'Basic'
					WHEN year < 2005 THEN 'Modern'
				END AS year, COUNT(*) AS vehicle_id
				FROM vehicle
				GROUP BY year
			  ";

	$stmt = $pdo->prepare($query);
	$executeQuery = $stmt->execute();

	if ($executeQuery) {
		$year = $stmt->fetchAll();
	}

	else {
		echo "Query failed";
	}

	?>
	
	<table>
		<tr>
			<th>Year</th>
			<th>Vehicle ID</th>
		</tr>
		<?php foreach ($year as $row) { ?>
		<tr>
			<td><?php echo $row['year']; ?></td>
			<td><?php echo $row['vehicle_id']; ?></td>
		</tr>
		<?php } ?>
	</table> 

</body>
</html>