<!DOCTYPE html>
<html>
<?php include '../header_files.php';?>
<head>
    <title>QR CODE Download/Print</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.6.0/css/all.min.css"
        integrity="sha512-ykRBEJhyZ+B/BIJcBuOyUoIxh0OfdICfHPnPfBy7eIiyJv536ojTCsgX8aqrLQ9VJZHGz4tvYyzOM0lkgmQZGw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
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
</head>
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
