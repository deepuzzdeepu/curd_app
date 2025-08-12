<html>

<head>
    <title>GeeksForGeeks</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

</head>

<body>
    <header>
        <div class="logosec">
            <div class="logo">Dashboard</div>
            <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210182541/Untitled-design-(30).png"
                class="icn menuicn" id="menuicn" alt="menu-icon" />
        </div>
        <div class="searchbar">
            <input type="text" placeholder="Search" />
            <div class="searchbtn">
                <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210180758/Untitled-design-(28).png"
                    class="icn srchicn" alt="search-icon" />
            </div>
        </div>

        <div class="message">
            <div class="circle"></div>
            <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183322/8.png" class="icn" alt="" />
            <div class="dp">
                <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210180014/profile-removebg-preview.png"
                    class="dpicn" alt="dp" />
            </div>
        </div>
    </header>

    <div class="main-container">
        <div class="navcontainer">
            <nav class="nav">
                <div class="nav-upper-options">
                    <a href="{{ route('dashboard') }}" class="nav-option option1">
                        <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210182148/Untitled-design-(29).png"
                            class="nav-img" alt="dashboard" />
                        <h3>Dashboard</h3>
                    </a>

                    <a href="{{ route('edit_profile') }}" class="nav-option option2">
                        <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183322/9.png"
                            class="nav-img" alt="articles" />
                        <h3>Profile</h3>
                    </a>
                
                    <a href="" class="nav-option option3">
                        <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183320/5.png"
                            class="nav-img" alt="report" />
                        <h3>Report</h3>
                    </a>
                
                    <a href="" class="nav-option option4">
                        <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183321/6.png"
                            class="nav-img" alt="institution" />
                        <h3>Institution</h3>
                    </a>
                
                    <a href="" class="nav-option option5">
                        <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183323/10.png"
                            class="nav-img" alt="profile" />
                        <h3>Profile</h3>
                    </a>
                
                    <a href="" class="nav-option option6">
                        <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183320/4.png"
                            class="nav-img" alt="settings" />
                        <h3>Settings</h3>
                    </a>
                
                    <a href="" class="nav-option logout">
                        <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183321/7.png"
                            class="nav-img" alt="logout" />
                        <h3>Logout</h3>
                    </a>
                </div>
            </nav>
        </div>
        <div class="main">
            <div class="searchbar2">
                <input type="text" name="" id="" placeholder="Search" />
                <div class="searchbtn">
                    <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210180758/Untitled-design-(28).png"
                        class="icn srchicn" alt="search-button" />
                </div>
            </div>

            

            
        </div>
    </div>

    <script src="{{ asset('js/index.js') }}"></script>

</body>

</html>