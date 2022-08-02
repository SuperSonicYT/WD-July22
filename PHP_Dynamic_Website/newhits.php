<?php 
  include "config.php";

  if(isset($_GET['logout'])) {
    session_destroy();
    header('Location:index.php');
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MUSIC HUB</title>
    <link href="assets/vendors/bootstrap/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/external.css" rel="stylesheet" />
</head>
<body>
    <div id="header">
        <a>Privacy Policy</a>
        <a>Terms & Conditions</a>
        <?php if(isset($_SESSION['username'])) { ?>
        <div id="login-dropdown">
            <button><?php echo $_SESSION['username'] ?></button>
            <div id="dropdown-content">
                <a href="authentication/changepwd.php">Change password</a>
                <a href="index.php?logout=true">Logout</a>
            </div>
        </div>
        <?php } else { ?>
        <div id="login-dropdown">
            <button>Login/Register</button>
            <div id="dropdown-content">
                <a href="authentication/login.php">Login</a>
                <a href="authentication/register.php">Register</a>
            </div>
        </div>
        <?php } ?>
    </div>
    <div id="logo-section">
        <div class="left-align">
            <img src="assets/images/logo.gif" height="150px" width="150px"/>
            <h1>MUSIC HUB</h1>
            <p>----------------------------------------------------<br>One stop shop for all your musical needs</p>
        </div>
        <div class="right-align">
            <form action="search.php" method="get">
                <input name="keyword" id="search-input" placeholder="Search songs, artists, playlists,etc"/>
                <button id="search-btn"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                  </svg></button>
            </form>
        </div>
    </div>
    <div id="menubar">
        <ul>
            <li class="active"><a href="index.html" >Home</a></li>
            <li><a href="hits.html">New Hits</a></li>
            <li><a href="recent.html">Recently Added</a></li>
            <li><a href="favs.html">Favourites</a></li>
            <li><a href="playlists.php">Playlists</a></li>
            <li><a href="about.html">About us</a></li>
        </ul>
    </div>
    <div id="web-content">
        <section id="products"> 
          <div class="row row-cols-1 m-5 row-cols-md-3 g-4">
            <?php 
            $sql_query = "SELECT id,name,dor,doa,album,views,singer,composer,songwriter,label,starring,image,link from music order by dor desc;";
            $result = mysqli_query($conn,$sql_query);
            while($data=mysqli_fetch_array($result)) {
            ?>
              <div class="col">
                  <div class="card h-100">
                    <img src="musicimg/<?php echo $data['image']; ?>" class="card-img-top" alt="<?php echo $data['name'].' image'; ?>">
                    <div class="card-body">
                      <audio controls>
                        <source type="audio/mpeg" src="music/<?php echo $data['link']; ?>"
                      </audio>
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                    <div class="card-footer">
                      <small class="text-muted"><?php echo $data['views'].' views'; ?></small>
                    </div>
                  </div>
                </div>

            <?php } ?>
          </div>
        </section>
        <section id="faqs">
            <h1>Frequently Asked Questions</h1>
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                      Accordion Item #1
                    </button>
                  </h2>
                  <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the first item's accordion body.</div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="flush-headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                      Accordion Item #2
                    </button>
                  </h2>
                  <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion body. Let's imagine this being filled with some actual content.</div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="flush-headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                      Accordion Item #3
                    </button>
                  </h2>
                  <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
                  </div>
                </div>
              </div>
        </section>
    </div>
    <script src="assets/vendors/bootstrap/bootstrap.min.js"></script>
</body>
</html>