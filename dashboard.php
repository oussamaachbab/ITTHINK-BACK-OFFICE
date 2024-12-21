<?php
session_start();
require_once 'config/database.php';
require_once 'includes/auth.php';

checkAdminAuth();

$counts = [
    'users' => getCount($conn, 'users'),
    'projects' => getCount($conn, 'projects'),
    'freelancers' => getCount($conn, 'freelancers'),
    'offers' => getCount($conn, 'offers')
];

function getCount($conn, $table) {
    $query = "SELECT COUNT(*) AS count FROM $table";
    return mysqli_fetch_assoc(mysqli_query($conn, $query))['count'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ITTHINK - Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">
    <!-- Container -->
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-900 text-white flex flex-col">
            <div class="p-6 text-2xl font-bold">
                <span class="text-blue-400">Admin</span> DASHBOARD
            </div>
            <nav class="flex-1">
                <ul>
                    <li><a href="#" class="block py-2 px-4 hover:bg-gray-700">Projets</a></li>
                    <li><a href="#" class="block py-2 px-4 hover:bg-gray-700">Categories</a></li>
                    <li><a href="#" class="block py-2 px-4 hover:bg-gray-700">Sous-Categories</a></li>
                    <li><a href="#" class="block py-2 px-4 hover:bg-gray-700">Freelances</a></li>
                    <li><a href="#" class="block py-2 px-4 hover:bg-gray-700">Offres</a></li>
                </ul>
            </nav>
            <a href="#" class="block py-2 px-4 bg-red-600 text-center hover:bg-red-700">Déconnexion</a>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            <!-- Top Header -->
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-semibold">Dashboard</h1>
                <input type="search" placeholder="Search" class="border px-4 py-2 rounded">
            </div>

            <!-- Stats Cards -->
            <?php
            $utilisateurs_count_query = "SELECT COUNT(*) AS count FROM users";
            $utilisateurs_count = mysqli_fetch_assoc(mysqli_query($conn, $utilisateurs_count_query))['count'];
            $projects_count_query = "SELECT COUNT(*) AS count FROM projects";
            $projets_count = mysqli_fetch_assoc(mysqli_query($conn, $projects_count_query))['count'];
            $freelancers_count_query = "SELECT COUNT(*) AS count FROM freelancers";
            $freelances_count = mysqli_fetch_assoc(mysqli_query($conn, $freelancers_count_query))['count'];
            $offers_count_query = "SELECT COUNT(*) AS count FROM offers";
            $offres_count = mysqli_fetch_assoc(mysqli_query($conn, $offers_count_query))['count'];
            ?>

            <div class="grid grid-cols-4 gap-4 mb-6">
                <div class="bg-white p-4 rounded shadow">
                    <h2 class="text-xl font-semibold"><?php echo $utilisateurs_count ?></h2>
                    <p>Utilisateurs</p>
                </div>
                <div class="bg-white p-4 rounded shadow">
                    <h2 class="text-xl font-semibold"><?php echo $projets_count ?></h2>
                    <p>Projets</p>
                </div>
                <div class="bg-white p-4 rounded shadow">
                    <h2 class="text-xl font-semibold"><?php echo $freelances_count ?></h2>
                    <p>Freelances</p>
                </div>
                <div class="bg-white p-4 rounded shadow">
                    <h2 class="text-xl font-semibold"><?php echo $offres_count ?></h2>
                    <p>Offres</p>
                </div>
            </div>

            <!-- Table -->
            <div class="bg-white rounded shadow overflow-auto h-80">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="p-3 border-b">Id d'utilisateur</th>
                            <th class="p-3 border-b">Nom d'utilisateur</th>
                            <th class="p-3 border-b">Role</th>
                            <th class="p-3 border-b">phone</th>
                            <th class="p-3 border-b">Email</th>
                            <th class="p-3 border-b">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT user_id, username, email, role, phone FROM users";
                        $result = mysqli_query($conn, $sql);
                        if(mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                                echo "<tr class='hover:bg-gray-100'>";
                                echo "<td class='p-3 border-b'>" . $row['user_id'] . "</td>";
                                echo "<td class='p-3 border-b'>" . $row['username'] . "</td>";
                                echo "<td class='p-3 border-b'>" . $row['role'] . "</td>";
                                echo "<td class='p-3 border-b'>" . $row['phone'] . "</td>";
                                echo "<td class='p-3 border-b'>" . nl2br($row['email']) . "</td>";
                                echo "<td class='p-3 border-b'>";
                                echo "<div class='flex flex-col items-start'>";
                                echo "<a href='edit_user.php?user_id=" . $row['user_id'] . "' class='text-blue-500 mb-1'>Modifier</a>";
                                echo "<a href='#' class='text-red-500'>Supprimer</a>";
                                echo "</div>";
                                echo "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6' class='text-center p-3 border-b'>No users found.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
</html>