<?php

$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],

];



// var_dump($_GET);


// $filtered_by_park = array_filter($hotels, function ($el){
//     return $el['parking'] == $_GET['parking'];
// });

// $filtered_by_rate = array_filter($hotels, function ($el){
//     return $el['vote'] >= $_GET['rating'];
// });


$filtered_hotels = array_filter($hotels, function($el){
    $park_input = isset($_GET['parking']) ? $_GET['parking'] : '';
    $rate_input = isset($_GET['rating']) ? $_GET['rating'] : 0;
    return $el['parking'] == $park_input && $el['vote'] >= $rate_input;
});

// var_dump($filtered_by_park);
// var_dump($filtered_by_rate);
// var_dump($filtered_hotels);


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>hotelz</title>
</head>
<body>


    <div class="container my-5">

        <div class="row">

            <form action="./index.php" method="GET" class="d-flex gap-5">

                <select class="form-select" name="parking" value="<?php echo $park_input; ?>">
                    <option value="">-- select --</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>

                <select class="form-select" name="rating" value="<?php echo $rate_input; ?>">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>

                <button type="submit" class="btn btn-primary">Send</button>

            </form>

        </div>

    </div>


    <div class="container">

        <table class="table">

            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Hotel</th>
                    <th scope="col">Description</th>
                    <th scope="col">Parking</th>
                    <th scope="col">Vote</th>
                    <th scope="col">Distance to center</th>
                </tr>
            </thead>

            <tbody>
                <?php 
                foreach ($filtered_hotels as $key => $hotel){
                ?>
                    <tr>
                        <th scope="row"><?php echo $key ?></th>

                        <?php
                        foreach ($hotel as $key => $info){
                        ?>
                            <td><?php echo $info ?></td>
                        <?php
                        }
                        ?>

                    </tr>
                <?php
                }
                ?>

                <!-- <tr>
                    <th scope="row">1</th>
                    <td>name...</td>
                    <td>desc...</td>
                    <td>park...</td>
                    <td>vote...</td>
                    <td>distance...</td>
                </tr> -->
            </tbody>

        </table>
        
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>   
</body>
</html>