<?php include 'admin_header.php'; 
    include '../includes/connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body class="bg-gray-100">

<div class="max-w-6xl mx-auto mt-10 bg-white shadow-lg rounded-lg overflow-hidden min-h-96">
    <div class="bg-[#70B2B2] text-white text-lg font-semibold px-6 py-3">Total Feedback From Users</div>

    <div class="p-4 overflow-x-auto">
        <table class="table-fixed w-full border border-gray-200 text-sm text-left">
            <thead class="bg-gray-100">
                <tr>
                    <th class="w-6 border px-4 py-2">No</th>
                    <th class="w-20 border px-4 py-2">Name</th>
                    <th class="w-28 border px-4 py-2">E-Mail</th>
                    <th class="w-20 border px-4 py-2">Phone no</th>
                    <th class="w-[300px] border px-4 py-2">Feedback</th>
                    <th class="w-20 border px-4 py-2">Sent On</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $Message = mysqli_query($conn,"select * from `contact_messages`");
                    if(mysqli_num_rows($Message) > 0){
                        $no = 0;
                        while ($row = mysqli_fetch_assoc($Message)) {
                            $name = $row['name']; 
                            $email = $row['email']; 
                            $pno = $row['pno'];
                            $comment = $row['user_messege'];
                            $date = date('d M Y', strtotime($row['created_at']));
                            $no++;
                            ?>
                                <tr>
                                    <td><?php echo $no?></td>
                                    <td><?php echo $name?></td>
                                    <td class="break-all whitespace-normal px-4 py-2 border"><?php echo $email?></td>
                                    <td><?php echo $pno?></td>
                                    <td><?php echo $comment?></td>
                                    <td><?php echo $date?></td>
                                </tr>
                            <?php
                        }
                    } else {
                        echo "<tr><td colspan='8' class='text-center py-4 text-gray-500'>No Feedback Found</td></tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>
<?php include 'admin_footer.php'?>

</body>
</html>