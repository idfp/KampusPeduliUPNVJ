<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Kwetiau Djuara</title>
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
                <li><a href="index.php">Reservasi</a></li>
                <li><a href="my-reservasi.php">My Reservasi</a></li>
                <li><a href="menu.php">Menu</a></li>
                <li><a href="contact.php" class="active">Kontak</a></li>
                <li><a href="about.php">About</a></li>
            </ul>
        </nav>
    </header>
    <section class="res" id="home">
        <div class="res-c">
            <h1>Contact Us</h1>
        </div>
    </section>
    <section class="rus">
        <div>
            <h3>Contact Us</h3><br>
            <p class="stupid"><b>Feel free to contact us anytime. We will get back to you as soon as we can!</b></p>
        </div>
        <div class="rus-c">
            <form method="post" action="contact.php">
                <label>Name</label><br/>
                <input type="text" name="name" placeholder="Name" /><br/><br/>
                <label>E-mail</label><br/>
                <input type="email" name="email" placeholder="Email" /><br/><br/>
                <label>Phone Number</label><br/>
                <input type="number" name="phone_number" placeholder="Phone_number" /><br/><br/>
                <label>Message</label><br/>
                <textarea rows="10" cols="115" name="message" placeholder="Message"></textarea><br/><br/>
                <input type="submit" name="Send" value="SEND" style="background-color: #ff7f50; font-weight: bold;"/>
            </form>        
        </div>
    </section>
</body>
</html>