<div class="card card-gray">
    <div class="card-header">
        <h4>Daftar User JSON</h4>
    </div>
    <div class="card-body">
        <?php
        foreach ($users as $row) {
            echo '<pre>' . json_encode($row, JSON_PRETTY_PRINT) . '</pre>';
        }
        ?>
    </div>
</div>