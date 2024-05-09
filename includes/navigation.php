<nav class="navbar p-x">
    <div class="navbar__left">
        <div class="navbar__logo">
            <div class="navbar__logo--text">Calcutta Heritage</div>
        </div>
        <div class="navbar__search" for="search">
            <form action="search.php" method="POST">
                <input name="search-input" type="search" placeholder="Search for attractions and places">
                <button name="search-submit" type="submit"><img src="./assets/search.png" alt=""></button>
            </form>
        </div>
    </div>
    <div class="navbar__right">
        <div class="navbar__right__location"></div>
        <select name="location" id="location">
            <option value="location 1" selected disabled>Select location</option>
            <option value="location 1">Kolkata</option>
            <option value="location 1">a</option>
        </select>
        <div class="navbar__right__buttons">
            <a href="/otb/admin/">Admin</a>
            <a href="signup.php" class="btn" draggable="false">Sign Up</a>
            <a href="login.php" class="btn" draggable="false">Login</a>
        </div>
    </div>
</nav>