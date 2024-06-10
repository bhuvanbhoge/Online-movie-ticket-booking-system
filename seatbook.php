<?php include('header.php');
if (!isset($_SESSION['user'])) {
    header('location:login.php');
}
$qry2 = mysqli_query($con, "select * from tbl_movie where movie_id='" . $_SESSION['movie'] . "'");
$movie = mysqli_fetch_array($qry2);
?>

<?php
include('config.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $selected_seats = explode(',', $_POST['selected_seats']);

    if (!empty($selected_seats)) {
        foreach ($selected_seats as $seat) {
            $sql = "UPDATE seats SET is_booked = 1 WHERE seat_number = ?";
            $stmt = $con->prepare($sql);
            $stmt->bind_param('s', $seat);
            $stmt->execute();
        }
        echo "Seats successfully booked!";
    } else {
        echo "No seats selected!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Ticket Booking</title>
    <style>
        body {
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            text-align: center;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 10px;
        }

        .screen {
            background-color: #333;
            height: 70px;
            width: 100%;
            margin: 15px 0;
            color: white;
            line-height: 70px;
            font-size: 18px;
            text-align: center;
            border-radius: 5px;
        }

        .seats {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .row {
            display: flex;
            justify-content: center;
            margin-bottom: 10px;
        }

        .seat {
            background-color: #ddd;
            height: 35px;
            width: 35px;
            margin: 5px;
            border-radius: 5px;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
        }

        .seat.silver {
            background-color: #c0c0c0;
        }

        .seat.gold {
            background-color: #ffd700;
        }

        .seat.selected {
            background-color: #6c757d;
            color: #fff;
        }

        .btn {
            background-color: #28a745;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 20px;
        }

        .btn:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Select Your Seats</h1>
        <div class="screen">Screen</div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="seats">
                <!-- Silver Seats -->
                <div class="row">
                    <div class="seat silver" data-price="10" data-seat="S1">S1</div>
                    <div class="seat silver" data-price="10" data-seat="S2">S2</div>
                    <div class="seat silver" data-price="10" data-seat="S3">S3</div>
                    <div class="seat silver" data-price="10" data-seat="S4">S4</div>
                    <div class="seat silver" data-price="10" data-seat="S5">S5</div>
                </div>
                <div class="row">
                    <div class="seat silver" data-price="10" data-seat="S6">S6</div>
                    <div class="seat silver" data-price="10" data-seat="S7">S7</div>
                    <div class="seat silver" data-price="10" data-seat="S8">S8</div>
                    <div class="seat silver" data-price="10" data-seat="S9">S9</div>
                    <div class="seat silver" data-price="10" data-seat="S10">S10</div>
                </div>
                <!-- Gold Seats -->
                <div class="row">
                    <div class="seat gold" data-price="20" data-seat="G1">G1</div>
                    <div class="seat gold" data-price="20" data-seat="G2">G2</div>
                    <div class="seat gold" data-price="20" data-seat="G3">G3</div>
                    <div class="seat gold" data-price="20" data-seat="G4">G4</div>
                    <div class="seat gold" data-price="20" data-seat="G5">G5</div>
                </div>
                <div class="row">
                    <div class="seat gold" data-price="20" data-seat="G6">G6</div>
                    <div class="seat gold" data-price="20" data-seat="G7">G7</div>
                    <div class="seat gold" data-price="20" data-seat="G8">G8</div>
                    <div class="seat gold" data-price="20" data-seat="G9">G9</div>
                    <div class="seat gold" data-price="20" data-seat="G10">G10</div>
                </div>
                <div class="row">
                    <div class="seat gold" data-price="20" data-seat="G11">G11</div>
                    <div class="seat gold" data-price="20" data-seat="G12">G12</div>
                    <div class="seat gold" data-price="20" data-seat="G13">G13</div>
                    <div class="seat gold" data-price="20" data-seat="G14">G14</div>
                    <div class="seat gold" data-price="20" data-seat="G15">G15</div>
                </div>
            </div>
            <input type="hidden" name="selected_seats" id="selected_seats">
            <button type="submit" class="btn">Book Now</button>
        </form>
    </div>

    <script>
        const seats = document.querySelectorAll('.seat');
        const selectedSeatsInput = document.getElementById('selected_seats');
        seats.forEach(seat => {
            seat.addEventListener('click', () => {
                seat.classList.toggle('selected');
                updateSelectedSeats();
            });
        });

        function updateSelectedSeats() {
            const selectedSeats = document.querySelectorAll('.seat.selected');
            const seatsArray = Array.from(selectedSeats).map(seat => seat.getAttribute('data-seat'));
            selectedSeatsInput.value = seatsArray.join(',');
        }
    </
