<?php
require_once 'db.php';
 
$hotel_id = isset($_GET['hotel_id']) ? (int)$_GET['hotel_id'] : 0;
$checkin = isset($_GET['checkin']) ? $_GET['checkin'] : '';
$checkout = isset($_GET['checkout']) ? $_GET['checkout'] : '';
 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
 
    $sql = "INSERT INTO bookings (hotel_id, user_name, user_email, user_phone, check_in, check_out) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isssss", $hotel_id, $name, $email, $phone, $checkin, $checkout);
    if ($stmt->execute()) {
        echo "<script>alert('Booking confirmed!'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Booking failed. Please try again.');</script>";
    }
}
 
$sql = "SELECT * FROM hotels WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $hotel_id);
$stmt->execute();
$hotel = $stmt->get_result()->fetch_assoc();
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Hotel</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }
 
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        }
 
        header {
            background: #1a2a44;
            color: white;
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
 
        .booking-container {
            max-width: 600px;
            margin: 40px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
 
        .booking-container h2 {
            font-size: 1.8em;
            color: #1a2a44;
            margin-bottom: 20px;
        }
 
        .booking-form input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1);
        }
 
        .booking-form button {
            background: #ff6f61;
            color: white;
            border: none;
            padding: 15px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            transition: background 0.3s ease;
        }
 
        .booking-form button:hover {
            background: #e55a50;
        }
 
        .hotel-details img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 10px;
        }
 
        @media (max-width: 768px) {
            .booking-container {
                margin: 20px;
                padding: 15px;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>Book Your Stay</h1>
    </header>
 
    <div class="booking-container">
        <div class="hotel-details">
            <h2><?php echo $hotel['name']; ?></h2>
            <img src="<?php echo $hotel['image_url']; ?>" alt="<?php echo $hotel['name']; ?>">
            <p>Location: <?php echo $hotel['location']; ?></p>
            <p>Price: $<?php echo $hotel['price_per_night']; ?>/night</p>
            <p>Check-in: <?php echo $checkin; ?></p>
            <p>Check-out: <?php echo $checkout; ?></p>
        </div>
 
        <form class="booking-form" method="POST">
            <input type="text" name="name" placeholder="Full Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="tel" name="phone" placeholder="Phone Number" required>
            <button type="submit">Confirm Booking</button>
        </form>
    </div>
</body>
</html>
