<?php
include 'admin_header.php';
include '../includes/connection.php';

if (isset($_GET['block_user'])) {
    $user_id = intval($_GET['block_user']);
    mysqli_query($conn, "UPDATE users_table SET blocked = 1 WHERE id = $user_id");
    header("Location: dashboard.php");
    exit;
}

$users = mysqli_query($conn, "SELECT * FROM users_table");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
</head>
<style>
    .usertbl {
        font-family: 'Inter', sans-serif;
    }
</style>
<body>

    <div class="max-w-6xl mx-auto px-4 py-8">
        <h3 class="text-2xl font-semibold text-gray-800 mb-6">Users List</h3>

        <div class="overflow-x-auto bg-white shadow-md rounded-lg usertbl">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-green-100">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">No</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Action</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    <?php 
                    $i = 1; 
                    while ($row = mysqli_fetch_assoc($users)):?>
                    <tr class="hover:bg-gray-50">
                        <?php  echo "<td class='py-2 px-4'>{$i}</td>"; $i++?>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800"><?php echo htmlspecialchars($row['name']); ?></td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800"><?php echo htmlspecialchars($row['email']); ?></td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium"><?php echo $row['blocked'] ? '<span class="text-red-600">Blocked</span>' : '<span class="text-green-600">Active</span>'; ?></td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <?php if (!$row['blocked']): ?>
                            <a href="?block_user=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to block this user?');" class="inline-block bg-red-500 hover:bg-red-600 text-white text-xs font-semibold px-4 py-2 rounded">Block</a>
                            <?php else: ?>
                            <span class="text-gray-400 text-sm font-semibold">Blocked</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php include 'admin_footer.php'?>
</body>
</html>