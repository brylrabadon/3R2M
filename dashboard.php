<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
// Logic for dynamic content could go here (e.g., fetching next session)
$userName = htmlspecialchars($_SESSION['name']); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | TutorSchedule</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-50 font-sans antialiased">

<div class="flex min-h-screen">
    <aside class="w-64 bg-indigo-700 text-white flex-shrink-0 hidden md:flex flex-col">
        <div class="p-6 text-2xl font-bold border-b border-indigo-600">
            TutorFlow
        </div>
        <nav class="flex-1 p-4 space-y-2">
            <a href="#" class="block py-2.5 px-4 rounded bg-indigo-800 transition">
                <i class="fas fa-home mr-2"></i> Dashboard
            </a>
            <a href="#" class="block py-2.5 px-4 rounded hover:bg-indigo-600 transition">
                <i class="fas fa-calendar-alt mr-2"></i> My Schedule
            </a>
            <a href="#" class="block py-2.5 px-4 rounded hover:bg-indigo-600 transition">
                <i class="fas fa-user-grad mr-2"></i> Students
            </a>
            <a href="#" class="block py-2.5 px-4 rounded hover:bg-indigo-600 transition">
                <i class="fas fa-cog mr-2"></i> Settings
            </a>
        </nav>
        <div class="p-4 border-t border-indigo-600">
            <a href="logout.php" class="flex items-center text-indigo-100 hover:text-white">
                <i class="fas fa-sign-out-alt mr-2"></i> Logout
            </a>
        </div>
    </aside>

    <main class="flex-1">
        <header class="bg-white shadow-sm px-8 py-4 flex justify-between items-center">
            <h1 class="text-xl font-semibold text-gray-800">Dashboard Overview</h1>
            <div class="flex items-center space-x-4">
                <span class="text-gray-600">Welcome, <strong><?php echo $userName; ?></strong></span>
                <img class="h-8 w-8 rounded-full bg-gray-200" src="https://ui-avatars.com/api/?name=<?php echo $userName; ?>&background=random" alt="Avatar">
            </div>
        </header>

        <div class="p-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                    <p class="text-sm font-medium text-gray-500 uppercase">Upcoming Sessions</p>
                    <p class="text-3xl font-bold text-gray-900">4</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                    <p class="text-sm font-medium text-gray-500 uppercase">Hours Taught</p>
                    <p class="text-3xl font-bold text-gray-900">28.5</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                    <p class="text-sm font-medium text-gray-500 uppercase">Total Revenue</p>
                    <p class="text-3xl font-bold text-gray-900">$1,420</p>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-6 border-b border-gray-100 flex justify-between items-center">
                    <h3 class="font-bold text-gray-700">Recent Schedule</h3>
                    <button class="text-sm text-indigo-600 font-semibold hover:underline">View All</button>
                </div>
                <table class="w-full text-left border-collapse">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-xs font-semibold text-gray-500 uppercase">Student</th>
                            <th class="px-6 py-3 text-xs font-semibold text-gray-500 uppercase">Subject</th>
                            <th class="px-6 py-3 text-xs font-semibold text-gray-500 uppercase">Time</th>
                            <th class="px-6 py-3 text-xs font-semibold text-gray-500 uppercase">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <tr>
                            <td class="px-6 py-4">Alex Johnson</td>
                            <td class="px-6 py-4">Calculus II</td>
                            <td class="px-6 py-4">Tomorrow, 10:00 AM</td>
                            <td class="px-6 py-4"><span class="px-2 py-1 text-xs font-bold bg-green-100 text-green-700 rounded-full">Confirmed</span></td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4">Sarah Miller</td>
                            <td class="px-6 py-4">English Literature</td>
                            <td class="px-6 py-4">Feb 2, 2:00 PM</td>
                            <td class="px-6 py-4"><span class="px-2 py-1 text-xs font-bold bg-yellow-100 text-yellow-700 rounded-full">Pending</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>

</body>
</html>