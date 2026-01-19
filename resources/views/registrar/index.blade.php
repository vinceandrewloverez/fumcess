<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard - School Year 2024-2025</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/feather-icons"></script>
</head>

<body class="bg-gray-100 min-h-screen flex">

  <!-- Sidebar -->
  @include('layouts.sidebar.registrar')

  <!-- Main Content -->
  <div class="flex-1 flex flex-col">
    <header class="bg-white shadow p-6 lg:p-8 flex justify-between items-center">
      <div>
        <h2 class="text-3xl font-bold text-green-700">Dashboard</h2>
        <p class="text-gray-500">School Year 2024-2025</p>
      </div>
      <div class="flex items-center space-x-4">
        <button class="bg-green-700 text-white px-4 py-2 rounded-lg shadow hover:bg-green-800 transition">Add
          Student</button>
        <button class="bg-gray-100 text-green-700 px-4 py-2 rounded-lg hover:bg-gray-200 transition">Settings</button>
      </div>
    </header>

    <main class="p-6 lg:p-8 space-y-8">

      <!-- Stats Grid -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white rounded-2xl shadow-lg p-6 flex items-center space-x-4 hover:shadow-xl transition">
          <div class="p-3 rounded-full bg-green-100/30">
            <i data-feather="users" class="text-green-700 w-6 h-6"></i>
          </div>
          <div>
            <p class="text-gray-500 text-sm">Total Enrolled Students</p>
            <p class="text-2xl font-bold text-green-700">1,243</p>
            <p class="text-green-700 text-sm">+12% from last year</p>
          </div>
        </div>
        <div class="bg-white rounded-2xl shadow-lg p-6 flex items-center space-x-4 hover:shadow-xl transition">
          <div class="p-3 rounded-full bg-green-100/30">
            <i data-feather="user-check" class="text-green-700 w-6 h-6"></i>
          </div>
          <div>
            <p class="text-gray-500 text-sm">Active Students</p>
            <p class="text-2xl font-bold text-green-700">1,198</p>
            <p class="text-green-700 text-sm">96.4% attendance rate</p>
          </div>
        </div>
        <div class="bg-white rounded-2xl shadow-lg p-6 flex items-center space-x-4 hover:shadow-xl transition">
          <div class="p-3 rounded-full bg-green-100/30">
            <i data-feather="file" class="text-green-700 w-6 h-6"></i>
          </div>
          <div>
            <p class="text-gray-500 text-sm">Pending Requirements</p>
            <p class="text-2xl font-bold text-green-700">156</p>
            <p class="text-green-700 text-sm">32 urgent</p>
          </div>
        </div>
        <div class="bg-white rounded-2xl shadow-lg p-6 flex items-center space-x-4 hover:shadow-xl transition">
          <div class="p-3 rounded-full bg-green-100/30">
            <i data-feather="book-open" class="text-green-700 w-6 h-6"></i>
          </div>
          <div>
            <p class="text-gray-500 text-sm">Subjects Offered</p>
            <p class="text-2xl font-bold text-green-700">48</p>
            <p class="text-gray-500 text-sm">Across 6 grade levels</p>
          </div>
        </div>
      </div>

      <!-- Charts & Activity -->
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition">
          <h3 class="text-lg font-semibold text-green-700 mb-4">Grade Level Chart</h3>
          <div class="h-64 bg-gray-50 rounded flex items-center justify-center text-gray-400">
            Chart Placeholder
          </div>
        </div>
        <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition">
          <h3 class="text-lg font-semibold text-green-700 mb-4">Recent Transactions</h3>
          <div class="h-64 bg-gray-50 rounded flex items-center justify-center text-gray-400">
            Activity Placeholder
          </div>
        </div>
      </div>

      <!-- Requirements Status -->
      <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition">
        <h3 class="text-lg font-semibold text-green-700 mb-4">Requirements Status</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
          <div class="p-4 rounded-lg text-center border border-green-200">
            <p class="text-green-700 font-semibold">Completed</p>
            <p class="text-green-700 text-lg font-bold">1,087</p>
          </div>
          <div class="p-4 rounded-lg text-center border border-green-200">
            <p class="text-green-700 font-semibold">Pending</p>
            <p class="text-green-700 text-lg font-bold">156</p>
          </div>
          <div class="p-4 rounded-lg text-center border border-green-200">
            <p class="text-green-700 font-semibold">Urgent</p>
            <p class="text-green-700 text-lg font-bold">32</p>
          </div>
        </div>
      </div>

    </main>
  </div>

  <script>
    feather.replace()
  </script>
</body>

</html>