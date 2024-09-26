<!-- Carousel -->
<div id="demo" class="carousel slide h-100" data-bs-ride="carousel">

    <!-- Indicators/dots -->
    <div class="carousel-indicators">
        <?php
        $ans = mysqli_query($con, "select * from slider WHERE status='Active'");
        $num_rows = mysqli_num_rows($ans);
        for ($i = 0; $i < $num_rows; $i++) {
            $active_class = ($i == 0) ? 'active' : ''; // Add active class only to the first item
            echo '<button type="button" data-bs-target="#demo" data-bs-slide-to="' . $i . '" class="' . $active_class . '"></button>';
        }
        ?>
    </div>

    <!-- The slideshow/carousel -->
    <div class="carousel-inner">
        <?php
        $ans = mysqli_query($con, "select * from slider WHERE status='Active'");
        $first_row = true; // Flag to check if it's the first row
        while ($row = mysqli_fetch_array($ans)) {
            $active_class = ($first_row) ? 'active' : ''; // Add active class only to the first item
            ?>

            <div class="carousel-item <?php echo $active_class; ?>">
                <img src="image/<?php echo $row['image']; ?>" alt="Los Angeles" class="d-block" style="width:100%">
                <div class="carousel-caption">
                    <h3>
                        <?php echo $row['caption1']; ?>
                    </h3>
                    <p>
                        <?php echo $row['caption2']; ?>
                    </p>
                </div>
            </div>

            <?php
            $first_row = false; // Set the flag to false after the first row
        }
        ?>
    </div>

    <!-- Left and right controls/icons -->
    <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>