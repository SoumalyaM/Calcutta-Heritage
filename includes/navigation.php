<nav class="navbar p-x">
    <div class="navbar__left">
        <a href="http://localhost/otb/" class="navbar__logo">
            <div class="navbar__logo--text">Calcutta Heritage</div>
        </a>
        <div class="navbar__search" for="search">
            <form action="search.php" method="POST">
                <input name="search-input" type="search" placeholder="Search for attractions and places" required>
                <button name="search-submit" type="submit"><img src="./assets/search.png"></button>
            </form>
        </div>
    </div>
    <div class="navbar__right">
        <!-- <div class="navbar__right__location"></div> -->
        <?php if (isset($_SESSION['user-id'])): ?>
            <a class="dashboard" href="admin/">Dashboard</a>
        <?php endif ?>
        <!-- <select name="location" id="location">
            <option value="location 1" selected disabled>Select location</option>
            <option value="location 1">Kolkata</option>
            <option value="location 1">a</option>
        </select> -->
        <?php if (!isset($_SESSION['user-id'])): ?>
            <div class="navbar__right__buttons">
                <a href="signup.php" class="btn" draggable="false">Sign Up</a>
                <a href="login.php" class="btn" draggable="false">Login</a>
            </div>
        <?php endif ?>
    </div>
</nav>