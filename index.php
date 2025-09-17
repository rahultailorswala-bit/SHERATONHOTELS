<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sheraton Hotels - Home</title>
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
 
        header h1 {
            font-size: 2.5em;
            letter-spacing: 2px;
        }
 
        .search-container {
            background: url('https://images.unsplash.com/photo-1519669556878-63baad7a88a2') no-repeat center/cover;
            padding: 50px;
            text-align: center;
            color: white;
            margin: 20px;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
        }
 
        .search-container h2 {
            font-size: 2em;
            margin-bottom: 20px;
        }
 
        .search-form {
            display: flex;
            justify-content: center;
            gap: 10px;
            flex-wrap: wrap;
        }
 
        .search-form input, .search-form button {
            padding: 15px;
            border: none;
            border-radius: 25px;
            font-size: 1em;
        }
 
        .search-form input {
            width: 200px;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1);
        }
 
        .search-form button {
            background: #ff6f61;
            color: white;
            cursor: pointer;
            transition: background 0.3s ease;
        }
 
        .search-form button:hover {
            background: #e55a50;
        }
 
        .featured-hotels {
            padding: 40px;
            text-align: center;
        }
 
        .featured-hotels h2 {
            font-size: 2em;
            margin-bottom: 20px;
            color: #1a2a44;
        }
 
        .hotel-grid {
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
 
        .hotel-card h3 {
            font-size: 1.5em;
            padding: 10px;
            color: #1a2a44;
        }
 
        .hotel-card p {
            padding: 0 10px 10px;
            color: #555;
        }
 
        @media (max-width: 768px) {
            .search-form input {
                width: 100%;
            }
 
            .hotel-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>Sheraton Hotels</h1>
    </header>
 
    <div class="search-container">
        <h2>Find Your Perfect Stay</h2>
        <form id="searchForm" onsubmit="searchHotels(event)">
            <input type="text" id="destination" placeholder="Destination" required>
            <input type="date" id="checkin" required>
            <input type="date" id="checkout" required>
            <button type="submit">Search</button>
        </form>
    </div>
 
    <div class="featured-hotels">
        <h2>Featured Hotels</h2>
        <div class="hotel-grid">
            <div class="hotel-card">
                <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945" alt="Hotel 1">
                <h3>Sheraton Grand</h3>
                <p>Luxury stay in the heart of the city.</p>
            </div>
            <div class="hotel-card">
                <img src="https://images.unsplash.com/photo-1571003123894-1f0594d2b5d9" alt="Hotel 2">
                <h3>Sheraton Resort</h3>
                <p>Beachfront paradise with modern amenities.</p>
            </div>
        </div>
    </div>
 
    <script>
        function searchHotels(event) {
            event.preventDefault();
            const destination = document.getElementById('destination').value;
            const checkin = document.getElementById('checkin').value;
            const checkout = document.getElementById('checkout').value;
            window.location.href = `hotels.php?destination=${destination}&checkin=${checkin}&checkout=${checkout}`;
        }
    </script>
</body>
</html>
