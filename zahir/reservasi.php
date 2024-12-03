<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kwetiau Djuara - Reservasi</title>
    <link rel="icon" type="image" href="https://i.imgur.com/uTgr4G3.jpeg">
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Inria+Serif:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <nav class="navbar">
            <div class="logo">
                <a href="home.php">
                    <img src="https://i.imgur.com/uTgr4G3.jpeg" alt="Logo" class="logo-img">
                </a>
                <a href="home.php" class="brand"></a>
            </div>
            <ul class="nav-links">
                <li><a href="home.php">Home</a></li>
                <li><a href="index.php" class="active">Reservasi</a></li>
                <li><a href="#my-reservasi">My Reservasi</a></li>
                <li><a href="menu.php">Menu</a></li>
                <li><a href="contact.php">Kontak</a></li>
                <li><a href="about.php">About</a></li>
            </ul>
        </nav>
    </header>
    <section class="res" id="home">
        <div class="res-c">
            <h1>Reservasi</h1>
        </div>
    </section>
    <section class="rus">
        <div>
            <h3>Reservasi</h3><br>
            <p class="stupid"><b>Schedule - Menu - Summary</b></p>
        </div>
        <div class="rus-c">
            <form method="post" action="reservasi.php">
                <label>Select Number of Pax</label><br />
                <input type="text" name="pax" placeholder="Pax" /><br /><br />
                <label>Select Reservation Date</label><br />
                <input type="date" name="date" placeholder="Date" /><br /><br />
                <label>Select Reservation Time</label><br />
                <input id="option" type="time" name="time" list="times" /><br /><br />
                <datalist id="times">
                    <option value="01:00:00">
                    <option value="02:00:00">
                    <option value="03:00:00">
                    <option value="04:00:00">
                    <option value="05:00:00">
                    <option value="06:00:00">
                    <option value="07:00:00">
                    <option value="08:00:00">
                    <option value="09:00:00">
                    <option value="10:00:00">
                    <option value="11:00:00">
                    <option value="12:00:00">
                    <option value="13:00:00">
                    <option value="14:00:00">
                    <option value="15:00:00">
                    <option value="16:00:00">
                    <option value="17:00:00">
                    <option value="18:00:00">
                    <option value="19:00:00">
                    <option value="20:00:00">
                    <option value="21:00:00">
                    <option value="22:00:00">
                    <option value="23:00:00">
                    <option value="00:00:00">
                </datalist>
                <label>Note (Optional)</label><br />
                <input type="text" name="note" placeholder="Note" /><br /><br />
                <input type="submit" name="Continue" value="Continue"
                    style="background-color: #ff7f50; font-weight: bold;" />
            </form>
        </div>
    </section>
</body>
</html>