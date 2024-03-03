<!-- 
    This HTML file represents a basic navbar with a fixed position at the top of the page.
    The navbar includes a logo on the left and a "Home" link on the right.
    The styling uses a purple background color with white text, and the appearance changes on hover.
-->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Basic Navbar</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Benton+Sans:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <style>
      body {
        font-family: 'Benton Sans', sans-serif;
        margin: 0;
        padding: 0;
        margin-top: 200px;
        margin-bottom: 400px
      }

      nav {
        background-color: rgba(79, 45, 131, 255);
        overflow: hidden;
        position: fixed;
        width: 100%;
        top: 0;
        z-index: 1000; /* Adjust the z-index as needed */
      }

      nav img {
        float: left;
        display: block;
        color: white;
        text-align: center;
        text-decoration: none;
        padding-left: 10px;
      }

      nav a {
        display: block;
        color: white;
        text-align: center;
        padding: 40px 30px 40px 30px;
        text-decoration: none;
        float: left; /* Add this line to make "Home" appear to the right */
        font-size: 24px;
        font-weight: 100;
      }

      nav a:hover {
        background-color: #ddd;
        color: rgb(88, 44, 131);
      }
    </style>
  </head>
  <body>
    <nav>
      <img
        src="https://www.communications.uwo.ca/img/logo_teasers/Stacked_Rev_Full.gif"
        height="100px"
      />
      <a href="mainmenu.php">Home</a>
    </nav>
  </body>
</html>
