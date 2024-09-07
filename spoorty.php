<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CR Election</title>
    <link rel="stylesheet" type="text/css" href="front.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />"
</head>
<body>
    <header> <br><h1 style="align-content: center;font-size: 59px; font-weight: bold;">CR ELECTIONS</h1>
        <br>
   
<br></header>
    <div class="header1">
     
        <div class="logo">
            <img src="SIT logo.png" alt="SIT Logo" style="width: 60px; height: 53px;">
            <p>SIT,Tumkur-572102</p>
        </div>
        <nav>
            <ul>
                <li style="font-size:15px;"><a href="#" >Home</a></li>
                <li style="font-size:15px;"><a href="#">Schedule &nbsp<i class="fa-solid fa-calendar-days"></i></a></li>
                <li style="font-size: 15px;" onclick="showAboutCard()">About us</li>

                <!-- Add a div for the about card -->
                
               
               <!-- Add the following to your navigation list item -->
<!--li style="font-size:15px;"><a href="#" onclick="toggleContactCard()">Contact Us</a></li-->

<!-- Add a div for the contact card -->
<div id="contact-card" class="card5" style="display: none;">
    <div class="card-content5">
        <h3>Contact Information</h3>
        <p>General Inquiries: 0816 221 4001</p>
        <p>Other:096633 67140</p>
        <!-- Add additional contact information as needed -->
    </div>
</div>
<li style="font-size:15px;"   onclick="toggleContactCard()">ContactUs</li>


<div id="about-card" class="card-about" style="display: none;">
    <h3>About Us</h3>
    <p>This is some text about your organization.</p>
    <p>cnsam,d njgfslakd; SNLDFKAMD</p>
    <P>HBFSJDAKSDJKFLKSA;Lak</P>
    <!-- Add additional about information as needed -->
</div>





                <!--li ><img src="dark11.svg" class="dark-theme-logo"-->
<button id="theme-toggle" onclick="toggleTheme()">
    <img src="dark11.svg" alt="Light Mode Icon" id="theme-icon">
</button>


            </ul>
        </font-nav>
    </div>
    <div class="blur-background"></div>

    <main>
        <div class="content-wrapper">
            <div class="left">
                <!-- Your image goes here -->
                <div class="hero-image">
                    <img src="pic6.png" alt="Your Image" style="width: 80%; height: auto;">
                </div>
            </div>
            <div class="right">
       <div class="card4"><a href="#" style="text-decoration: none;">
                <div class="card-content">
                    <div class="voter-stats1">
                    
                        <img src="admin.png.jpg" style="height: 105px;left: 0px;">
                        
                    </div>
                    <div class="voter-stats">
                        <h3 style="font-size: 25px; text-decoration:none ;"> Admin Login</h3>
                        
                    </div>
                </div></a>
                </div>
        <div class="card4"><a href="#" style="text-decoration: none;">
            <div class="card-content">
                <div class="voter-stats1">
                    <img src="student.png" style="height: 80px;left: 0px;">
                    
                </div>
                <div class="voter-stats">
                    <h3 style="font-size: 25px;">Student Login</h3>
                    
                </div>
            </div></a>
            </div>

            <div class="card4"><a href="#" style="text-decoration: none;">
                <div class="card-content">
                    <div class="voter-stats1">
                        <img src="results.png" style="height: 80px;left: 0px;">
                        
                    </div>
                    <div class="voter-stats">
                        <h3 style="font-size: 25px;">Results</h3>
                        
                    </div>
                </div></a>
                </div>

                

        </div>
                <!-- Cards section -->
               
        
        
        
       
    </main>
    <footer id="footer-section">
        <p id="copy">&copy; SIT CR Elections</p>
        <div class="icons"><a href="https://www.facebook.com/tumkursit/" style="text-decoration: null; color: aliceblue;">
            <i class="fa-brands fa-facebook"></i></a>
            <a href="" style="text-decoration: null; color: aliceblue;">
            <i class="fa-solid fa-envelope"></i></a>
            <a href="https://in.linkedin.com/school/sit-tumkur/" style="text-decoration: null; color: aliceblue;">
            <i class="fa-brands fa-linkedin"></i></a>
            <a href="https://twitter.com/sit_tumakuru?lang=en" style="text-decoration: null; color: aliceblue;">
            <i class="fa-brands fa-twitter"></i></a>
        </div>
    </footer>
   
</body>
<script>

function showAboutCard() {
            const aboutCard = document.getElementById('about-card');
            aboutCard.style.display = 'block';

            // Set a timeout to hide the about card after 10 seconds (10000 milliseconds)
            setTimeout(() => {
                aboutCard.style.display = 'none';
            }, 10000);

            // Add event listener to close the card when clicking outside
            document.addEventListener('click', closeAboutCard);
        }

        // Function to close the about card when clicking outside
        function closeAboutCard(event) {
            const aboutCard = document.getElementById('about-card');
            
            // Check if the clicked element is outside the about card
            if (!aboutCard.contains(event.target)) {
                aboutCard.style.display = 'none';
                document.removeEventListener('click', closeAboutCard);
            }
        }


// Add this script at the end of your HTML or in a separate script file

// Check if a theme preference is stored in local storage
document.body.classList.toggle('dark-theme', currentTheme === 'dark');

// Function to toggle between dark and light modes
function toggleTheme() {
    const isDarkMode = document.body.classList.toggle('dark-theme');

    // Store the current theme preference in local storage
    localStorage.setItem('theme', isDarkMode ? 'dark' : 'light');
}

// Add this script at the end of your HTML or in a separate script file

// Function to toggle between dark and light modes
function toggleTheme() {
    const isDarkMode = document.body.classList.toggle('dark-theme');

    // Store the current theme preference in local storage
    localStorage.setItem('theme', isDarkMode ? 'dark' : 'light');
}

// Function to toggle the display of the contact card
function toggleContactCard() {
    const contactCard = document.getElementById('contact-card');
    contactCard.style.display = contactCard.style.display === 'none' ? 'block' : 'none';
}

// Function to close the contact card when clicking outside
function closeContactCard(event) {
    const contactCard = document.getElementById('contact-card');
    
    // Check if the clicked element is outside the contact card and not the contact link
    if (!contactCard.contains(event.target) && event.target.id !== 'contact-link') {
        contactCard.style.display = 'none';
        document.removeEventListener('click', closeContactCard);
    }
}

// Add event listener for the contact link to toggle the contact card
document.getElementById('contact-link').addEventListener('click', function (event) {
    event.preventDefault();
    toggleContactCard();

    // Add a click event listener to the document to close the card on outside click
    document.addEventListener('click', closeContactCard);
});

function closeContactCard(event) {
    const contactCard = document.getElementById('contact-card');
    
    // Check if the clicked element is outside the contact card and not the contact link
    if (!contactCard.contains(event.target) && event.target.id !== 'contact-link') {
        contactCard.style.display = 'none';
        document.removeEventListener('click', closeContactCard);
    }
}

// Add event listener for the contact link to toggle the contact card
document.getElementById('contact-link').addEventListener('click', function (event) {
    event.preventDefault();
    toggleContactCard();

    // Add a click event listener to the document to close the card on outside click
    document.addEventListener('click', closeContactCard);
});


        // Function to close the about card when clicking outside
        function closeAboutCard(event) {
            const aboutCard = document.getElementById('about-card');
            
            // Check if the clicked element is outside the about card and not the "About us" link
            if (!aboutCard.contains(event.target) && event.target.textContent !== 'About us') {
                aboutCard.style.display = 'none';
                document.removeEventListener('click', closeAboutCard);
            }
        }




</script>
</html>