<?php
require_once 'db.php';
 
$destination = isset($_GET['destination']) ? $_GET['destination'] : '';
$checkin = isset($_GET['checkin']) ? $_GET['checkin'] : '';
$checkout = isset($_GET['checkout']) ? $_GET['checkout'] : '';
 
$sql = "SELECT * FROM hotels WHERE location LIKE ? AND availability = 1";
$stmt = $conn->prepare($sql);
$searchTerm = "%$destination%";
$stmt->bind_param("s", $searchTerm);
$stmt->execute();
$result = $stmt->get_result();
$hotels = $result->fetch_all(MYSQLI_ASSOC);
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Listings</title>
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
 
        .filters {
            padding: 20px;
            text-align: center;
        }
 
        .filters select, .filters input {
            padding: 10px;
            margin: 5px;
            border-radius: 5px;
            border: none;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
 
        .hotel-list {
            padding: 40px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }
 
        .hotel-card {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;
        }
 
        .hotel-card:hover {
            transform: scale(1.05);
        }
 
        .hotel-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
 
        .hotel-info {
            padding: 15px;
        }
 
        .hotel-info h3 {
            font-size: 1.5em;
            color: #1a2a44;
        }
 
        .hotel-info p {
            color: #555;
            margin: 5px 0;
        }
 
        .book-btn {
            background: #ff6f61;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            margin-top: 10px;
            transition: background 0.3s ease;
        }
 
        .book-btn:hover {
            background: #e55a50;
        }
 
        @media (max-width: 768px) {
            .hotel-list {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>Available Hotels</h1>
    </header>
 
    <div class="filters">
        <select id="sort">
            <option value="price-asc">Price: Low to High</option>
            <option value="price-desc">Price: High to Low</option>
            <option value="rating">Best Rated</option>
        </select>
        <input type="number" id="maxPrice" placeholder="Max Price">
        <input type="number" id="minRating" placeholder="Min Rating">
    </div>
 
    <div class="hotel-list" id="hotelList">
        <?php foreach ($hotels as $hotel): ?>
            <div class="hotel-card">
                <img src="<?php echo $hotel['image_url']; ?>" alt="<?php echo $hotel['name']; ?>">
                <div class="hotel-info">
                    <h3><?php echo $hotel['name']; ?></h3>
                    <p><?php echo $hotel['location']; ?></p>
                    <p>Price: $<?php echo $hotel['price_per_night']; ?>/night</p>
                    <p>Rating: <?php echo $hotel['rating']; ?>/5</p>
                    <p><?php echo $hotel['amenities']; ?></p>
                    <button class="book-btn" onclick="bookHotel(<?php echo $hotel['id']; ?>, '<?php echo $checkin; ?>', '<?php echo $checkout; ?>')">Book Now</button>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
 
    <script>
        function bookHotel(hotelId, checkin, checkout) {
            window.location.href = `booking.php?hotel_id=${hotelId}&checkin=${checkin}&checkout=${checkout}`;
        }
 
        document.getElementById('sort').addEventListener('change', function() {
            // Sorting logic can be added here using JavaScript or server-side
        });
    </script>
</body>
</html>
