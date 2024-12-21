<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>ITTHINK - Login</title>
</head>
<body class="bg-gray-100">
    <!-- Login Container -->
    <div class="min-h-screen flex items-center justify-center p-4" id="container">
        <div class="max-w-md w-full space-y-8">
            <div class="text-center">
                <h1 class="text-3xl font-bold text-gray-900">LOGIN</h1>
            </div>
            
            <div class="bg-white p-8 rounded-lg shadow-md">
                <form class="space-y-6" action="process_login.php" method="POST">
                    <div>
                        <label for="username-login" class="block text-sm font-medium text-gray-700">Username</label>
                        <input type="text" id="username-login" name="username" required
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Username">
                    </div>

                    <div>
                        <label for="password-login" class="block text-sm font-medium text-gray-700">Password</label>
                        <input type="password" id="password-login" name="password" required
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Password">
                    </div>

                    <button type="submit"
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Log in
                    </button>
                </form>
            </div>

            <div class="text-center">
                <span class="text-sm text-gray-600">
                    Don't have an account? 
                    <button id="dont-have-account" 
                        class="font-medium text-blue-600 hover:text-blue-500 focus:outline-none">
                        Sign up here
                    </button>
                </span>
            </div>
        </div>
    </div>

    <!-- Sign Up Container -->
    <div class="min-h-screen flex items-center justify-center p-4 hidden" id="container2">
        <div class="max-w-md w-full space-y-8">
            <div class="text-center">
                <h1 class="text-3xl font-bold text-gray-900">SIGN UP</h1>
            </div>
            
            <div class="bg-white p-8 rounded-lg shadow-md">
                <form class="space-y-6" action="process_signup.php" method="POST">
                    <div>
                        <label for="username-sign-up" class="block text-sm font-medium text-gray-700">Username</label>
                        <input type="text" id="username-sign-up" name="username"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Username">
                    </div>

                    <div>
                        <label for="password-sign-up" class="block text-sm font-medium text-gray-700">Password</label>
                        <input type="password" id="password-sign-up" name="password"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Password">
                    </div>

                    <div>
                        <label for="email-sign-up" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="email-sign-up" name="email"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Email">
                    </div>

                    <div>
                        <label for="phone-sign-up" class="block text-sm font-medium text-gray-700">Phone Number</label>
                        <input type="tel" id="phone-sign-up" name="phone"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Phone number">
                    </div>

                    <div id="error-messages" class="text-red-500 text-sm"></div>

                    <button type="submit"
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Sign up
                    </button>
                </form>
            </div>

            <div class="text-center">
                <span class="text-sm text-gray-600">
                    Already have an account? 
                    <button id="already-have-account" 
                        class="font-medium text-blue-600 hover:text-blue-500 focus:outline-none">
                        Log in here
                    </button>
                </span>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const loginContainer = document.getElementById('container');
            const signupContainer = document.getElementById('container2');
            const dontHaveAccountBtn = document.getElementById('dont-have-account');
            const alreadyHaveAccountBtn = document.getElementById('already-have-account');
            const errorMessages = document.getElementById('error-messages');

            dontHaveAccountBtn.addEventListener('click', () => {
                loginContainer.classList.add('hidden');
                signupContainer.classList.remove('hidden');
            });

            alreadyHaveAccountBtn.addEventListener('click', () => {
                signupContainer.classList.add('hidden');
                loginContainer.classList.remove('hidden');
            });
        });
    </script>
</body>
</html>