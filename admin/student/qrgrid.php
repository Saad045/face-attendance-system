<?php
    include '../includes/header.php';
    include '../includes/config.php';
?>
<style>
    .grid-container {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        /* grid-gap: 10px; */
    }

    .grid-item {
        width: 100%;
        height: 100%;
        border: 1px dotted #3333;
    }
   
    @media print{
        .hide-content *{
            display:none;
        }
    }
</style>
<body>
    <div class="hide-content d-flex justify-content-between sticky-top bg-white ">
    <a href="student.php" class=" btn btn-dark btn-sm m-3">
        <i class="fas fa-arrow-left text-white mr-1"></i>
        Back
    </a>
    <h3 class="m-3" >All QR Codes</h3>
    <button onclick="window.print()" class="btn btn-dark btn-sm m-3 ">
        <i class="fas fa-print text-white mr-1"></i>
        Print

    </button>

    </div>
    
   
    <div class="grid-container">
        <?php
        $images = glob('qrcode/*.png'); // Change the file extension if your images have a different format
        foreach ($images as $image) {
            echo "<div class='grid-item'><img src='$image'></div>";
        }
        ?>
    </div>
    
</body>
</html>
