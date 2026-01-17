<!-- resources/views/portal/tuition.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tuition - FUMCES</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex">

    <!-- Sidebar -->
    @include('layouts.sidebar')

    <!-- Main Content -->
    <main class="flex-1 bg-yellow-50 p-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Tuition Payments / Documents</h1>

        <div class="max-w-4xl mx-auto space-y-6">

            <!-- Tuition Breakdown -->
            <div class="bg-white p-6 rounded shadow">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Tuition Breakdown</h2>
                <ul class="divide-y divide-gray-200">
                    <li class="py-3 flex justify-between items-center">
                        <span>Tuition Fee</span>
                        <span class="text-gray-700 font-semibold">₱20,000</span>
                    </li>
                    <li class="py-3 flex justify-between items-center">
                        <span>Miscellaneous Fee</span>
                        <span class="text-gray-700 font-semibold">₱5,000</span>
                    </li>
                    <li class="py-3 flex justify-between items-center">
                        <span>Other Charges</span>
                        <span class="text-gray-700 font-semibold">₱2,500</span>
                    </li>
                </ul>
            </div>

            <!-- Upload Proof of Payment -->
            <div class="bg-white p-6 rounded shadow">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Upload Proof of Payment</h2>
                <form class="flex flex-col gap-4">
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Tuition Payment Receipt</label>
                        <input type="file" class="w-full border border-gray-300 rounded px-3 py-2">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Miscellaneous / Other Payment Receipts</label>
                        <input type="file" class="w-full border border-gray-300 rounded px-3 py-2">
                    </div>
                    <button type="button" class="bg-green-700 hover:bg-green-800 text-white font-semibold py-2 px-4 rounded w-32">
                        Upload
                    </button>
                </form>
            </div>

            <!-- Payment Notes / Instructions -->
            <div class="bg-white p-6 rounded shadow">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Payment Notes / Instructions</h2>
                <p class="text-gray-700">Please upload scanned copies or photos of your official receipts. Ensure they are clear and include the transaction date. Each semester must have its own receipt uploaded separately. Contact the finance office for any payment issues.</p>
            </div>

            <!-- Payment History -->
            <div class="bg-white p-6 rounded shadow">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Payment History</h2>
                <table class="w-full table-auto border-collapse border border-gray-200">
                    <thead class="bg-green-700 text-white">
                        <tr>
                            <th class="py-2 px-4 text-left">Date</th>
                            <th class="py-2 px-4 text-left">Type</th>
                            <th class="py-2 px-4 text-left">Amount</th>
                            <th class="py-2 px-4 text-left">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <tr>
                            <td class="py-2 px-4">2026-01-05</td>
                            <td class="py-2 px-4">Tuition Fee</td>
                            <td class="py-2 px-4">₱20,000</td>
                            <td class="py-2 px-4 text-green-700 font-semibold">Verified</td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4">2026-01-07</td>
                            <td class="py-2 px-4">Miscellaneous Fee</td>
                            <td class="py-2 px-4">₱5,000</td>
                            <td class="py-2 px-4 text-yellow-600 font-semibold">Pending</td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4">2026-01-08</td>
                            <td class="py-2 px-4">Other Charges</td>
                            <td class="py-2 px-4">₱2,500</td>
                            <td class="py-2 px-4 text-red-600 font-semibold">Rejected</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </main>

</body>
</html>
