<div class="col-md-3">
    <p class="lead">Shop Name</p>
    <div class="list-group">
        <?php
        $query = "SELECT * FROM categories ";
        $send_query = mysqli_query($connection, $query);
if(!$send_query)
{
    die("QUERY FAILED" . mysqli_error($connection));
}
        while ($row = mysqli_fetch_row($send_query))
        {
            echo "<a href='category.html' class='list-group-item'> {$row['cat_title']}</a>";
        }

        ?>

    </div>