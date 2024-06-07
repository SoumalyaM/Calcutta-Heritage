<?Php include "includes/header.php" ?>
<?php include "includes/db.php"; ?>
<?php include "includes/functions.php"; ?>

<?php if(isset($_SESSION['user-id'])) header("Location: index.php") ?>

<?php user_signup(); ?>

<?php
$name = $_SESSION['signup']['name'] ?? NULL;
$username = $_SESSION['signup']['username'] ?? NULL;
$email = $_SESSION['signup']['email'] ?? NULL;

unset($_SESSION['signup']);
?>

<script src="https://cdn.tailwindcss.com"></script>

</head>

<body>

    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-20 w-auto" src="assets/howrahBridge.jpg" alt="Your Company">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Create your account
            </h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <?php if (isset($_SESSION['signup-error'])): ?>
                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                    role="alert">
                    <span class="font-medium">
                        <?=
                            $_SESSION['signup-error'];
                        unset($_SESSION['signup-error']);
                        ?>
                    </span>
                </div>
            <?php endif ?>
            <form class="space-y-6" action="" method="POST">
                <div>
                    <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                    <div class="mt-2">
                        <input id="name" name="name" type="text" required value="<?= $name ?>"
                            class="block w-full rounded-md border-0 px-1.5 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div>
                    <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Username</label>
                    <div class="mt-2">
                        <input id="username" name="username" type="text" required value="<?= $username ?>"
                            class="block w-full rounded-md border-0 px-1.5 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                    <div class="mt-2">
                        <input id="email" name="email" type="text" required value="<?= $email ?>"
                            class="block w-full rounded-md border-0 px-1.5 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                        <div class="text-sm">
                            <!-- <a href="./login_update.php"
                                class="font-semibold text-indigo-600 hover:text-indigo-500">Update account?</a> -->
                        </div>
                    </div>
                    <div class="mt-2">
                        <input id="password" name="password" type="password" autocomplete="current-password" required
                            class="block w-full rounded-md border-0 px-1.5 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <!-- <div>
                    <label for="phone_number" pattern="[0-9]{10}"
                        class="block text-sm font-medium leading-6 text-gray-900">Phone Number</label>
                    <div class="mt-2">
                        <input id="phone_number" name="phone_number" type="number" required
                            class="block w-full rounded-md border-0 px-1.5 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div> -->
                <!-- <div>
                <label for="usertype" class="block text-sm font-medium leading-6 text-gray-900">User Type</label>
                <div class="mt-2">
                    <select id="usertype" name="usertype" type="number" required class="block w-full rounded-md border-0 px-1.5 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        <option value="0">User</option>
                        <option value="1">Admin</option>
                    </select>
                </div>
            </div> -->
                <div>
                    <button name="submit" type="submit"
                        class="flex w-full justify-center rounded-md bg-green-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign
                        Up</button>
                </div>
            </form>
        </div>
    </div>

    <?Php include "includes/footer.php" ?>