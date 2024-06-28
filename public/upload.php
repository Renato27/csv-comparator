<?php
include_once __DIR__ . '/../src/classes/CsvComparator.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $oldFile = $_FILES['old_file']['tmp_name'];
    $newFile = $_FILES['new_file']['tmp_name'];

    $comparator = new CsvComparator($oldFile, $newFile);
    $differences = $comparator->getDifferences();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CSV Comparator - Results</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h1>CSV Comparator Results</h1>

        <h2>Identical Rows <?= count($differences['identical'])?></h2>
        <?php if (count($differences['identical']) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Old Data (Line)</th>
                        <th>New Data (Line)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($differences['identical'] as $pair): ?>
                        <tr>
                            <td>
                                <strong>Line <?= $pair['old']['index'] + 1 ?>:</strong>
                                <div class="nested-table-container">
                                    <table class="nested-table">
                                        <thead>
                                            <tr>
                                                <?php foreach (array_keys($pair['old']['data']) as $key): ?>
                                                    <th><?= $key ?></th>
                                                <?php endforeach; ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <?php foreach ($pair['old']['data'] as $value): ?>
                                                    <td><?= $value ?></td>
                                                <?php endforeach; ?>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                            <td>
                                <strong>Line <?= $pair['new']['index'] + 1 ?>:</strong>
                                <div class="nested-table-container">
                                    <table class="nested-table">
                                        <thead>
                                            <tr>
                                                <?php foreach (array_keys($pair['new']['data']) as $key): ?>
                                                    <th><?= $key ?></th>
                                                <?php endforeach; ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <?php foreach ($pair['new']['data'] as $value): ?>
                                                    <td><?= $value ?></td>
                                                <?php endforeach; ?>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No identical rows found.</p>
        <?php endif; ?>

        <h2>Updated Rows <?= count($differences['updated'])?></h2>
        <?php if (count($differences['updated']) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Old Data (Line)</th>
                        <th>New Data (Line)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($differences['updated'] as $pair): ?>
                        <tr>
                            <td>
                                <strong>Line <?= $pair['old']['index'] + 1 ?>:</strong>
                                <div class="nested-table-container">
                                    <table class="nested-table">
                                        <thead>
                                            <tr>
                                                <?php foreach (array_keys($pair['old']['data']) as $key): ?>
                                                    <th><?= $key ?></th>
                                                <?php endforeach; ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <?php foreach ($pair['old']['data'] as $value): ?>
                                                    <td><?= $value ?></td>
                                                <?php endforeach; ?>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                            <td>
                                <strong>Line <?= $pair['new']['index'] + 1 ?>:</strong>
                                <div class="nested-table-container">
                                    <table class="nested-table">
                                        <thead>
                                            <tr>
                                                <?php foreach (array_keys($pair['new']['data']) as $key): ?>
                                                    <th><?= $key ?></th>
                                                <?php endforeach; ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <?php foreach ($pair['new']['data'] as $value): ?>
                                                    <td><?= $value ?></td>
                                                <?php endforeach; ?>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No updated rows found.</p>
        <?php endif; ?>

        <h2>Added Rows <?= count($differences['added'])?></h2>
        <?php if (count($differences['added']) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>New Data (Line)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($differences['added'] as $pair): ?>
                        <tr>
                            <td>
                                <strong>Line <?= $pair['new']['index'] + 1 ?>:</strong>
                                <div class="nested-table-container">
                                    <table class="nested-table">
                                        <thead>
                                            <tr>
                                                <?php foreach (array_keys($pair['new']['data']) as $key): ?>
                                                    <th><?= $key ?></th>
                                                <?php endforeach; ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <?php foreach ($pair['new']['data'] as $value): ?>
                                                    <td><?= $value ?></td>
                                                <?php endforeach; ?>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No added rows found.</p>
        <?php endif; ?>

        <a href="index.php">Go back</a>
    </div>
</body>
</html>
