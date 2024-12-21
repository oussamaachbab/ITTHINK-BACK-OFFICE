<?php
session_start();
require_once 'config/database.php';
require_once 'includes/auth.php';

checkAdminAuth();

$user_data = [];
if (isset($_GET['user_id'])) {
    $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
    $query = "SELECT * FROM users WHERE user_id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user_data = mysqli_fetch_assoc($result);
}

if (!$user_data) {
    header('Location: dashboard.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ITTHINK - Edit User</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="min-h-screen flex items-center justify-center bg-gray-100 p-4">
        <div class="w-full max-w-lg bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Modifier un utilisateur</h2>
            <form action="dashboard.php" method="POST">
                <input type="hidden" name="user_id" value="<?php echo isset($user_data['user_id']) ? $user_data['user_id'] : ''; ?>">
                
                <!-- Nom d'utilisateur -->
                <div class="mb-4">
                    <label for="username" class="block text-gray-700 font-medium mb-2">Nom d'utilisateur</label>
                    <input type="text" id="username" name="username" value="<?php echo isset($user_data['username']) ? htmlspecialchars($user_data['username']) : ''; ?>"class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none"/>
                </div>

                <!-- Role -->
                <div class="mb-4">
                    <label for="role" class="block text-gray-700 font-medium mb-2">Role</label>
                    <select id="role" name="role" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        <option value="admin" <?php echo (isset($user_data['role']) && $user_data['role'] == 'admin') ? 'selected' : ''; ?>>Admin</option>
                        <option value="freelancer" <?php echo (isset($user_data['role']) && $user_data['role'] == 'freelancer') ? 'selected' : ''; ?>>Freelancer</option>
                        <option value="user" <?php echo (isset($user_data['role']) && $user_data['role'] == 'user') ? 'selected' : ''; ?>>User</option>
                    </select>
                </div>

                <!-- Phone -->
                <div class="mb-4">
                    <label for="phone" class="block text-gray-700 font-medium mb-2">Phone</label>
                    <input type="tel" id="phone" name="phone" value="<?php echo isset($user_data['phone']) ? htmlspecialchars($user_data['phone']) : ''; ?>"class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none"/>
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                    <input type="email" id="email" name="email" value="<?php echo isset($user_data['email']) ? htmlspecialchars($user_data['email']) : ''; ?>" class="w-full px-4 py-2 border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none"/>
                </div>

                <!-- Submit Button -->
                <div class="mt-6">
                    <button type="submit" class="w-full bg-blue-500 text-white font-medium py-2 px-4 rounded-md hover:bg-blue-600 transition duration-300">
                        Enregistrer les modifications
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>