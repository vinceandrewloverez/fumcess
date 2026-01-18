<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admission Documents</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex bg-gray-100">

    {{-- Sidebar --}}
    @include('student.layouts.sidebar')

    <main class="flex-1 p-8">
        <div class="max-w-4xl mx-auto">

            <!-- Enrollment Progress -->
            <section class="mb-14">
                <h2 class="text-2xl font-bold text-green-700 text-center mb-10">
                    Enrollment Journey
                </h2>

                <div class="relative max-w-5xl mx-auto">
                    <div class="hidden md:block absolute left-0 right-0 top-[32px] h-1 bg-green-700"></div>
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-10 relative z-10">
                        <!-- Step 1 -->
                        <div class="flex flex-col items-center text-center">
                            <div
                                class="w-16 h-16 rounded-full bg-green-700 text-white flex items-center justify-center text-xl font-bold shadow-lg">
                                1
                            </div>
                            <p class="mt-4 font-semibold text-green-700">Application</p>
                            <p class="text-sm text-gray-500">Fill out student details</p>
                        </div>
                        <!-- Step 2 Active -->
                        <div class="flex flex-col items-center text-center">
                            <div
                                class="w-16 h-16 rounded-full bg-green-700 text-white flex items-center justify-center text-xl font-bold shadow-lg">
                                2
                            </div>
                            <p class="mt-4 font-semibold text-green-700">Documents</p>
                            <p class="text-sm text-gray-500">Upload requirements</p>
                        </div>
                        <!-- Step 3 -->
                        <div class="flex flex-col items-center text-center">
                            <div
                                class="w-16 h-16 rounded-full bg-white border-4 border-green-700 text-green-700 flex items-center justify-center text-xl font-bold">
                                3
                            </div>
                            <p class="mt-4 font-semibold text-green-700">Review</p>
                            <p class="text-sm text-gray-500">Interview and assessment</p>
                        </div>
                        <!-- Step 4 -->
                        <div class="flex flex-col items-center text-center">
                            <div
                                class="w-16 h-16 rounded-full bg-white border-4 border-green-700 text-green-700 flex items-center justify-center text-xl font-bold">
                                4
                            </div>
                            <p class="mt-4 font-semibold text-green-700">Confirmed</p>
                            <p class="text-sm text-gray-500">Official enrollment</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Application ID -->
            @if($admission)
                <div class="mb-6 text-center">
                    <span class="text-gray-700 font-medium">Application ID:</span>
                    <span class="text-green-700 font-bold text-lg">{{ $admission->application_id }}</span>
                </div>
            @endif

            <h1 class="text-3xl font-bold text-green-700 mb-8 text-center">Upload Your Documents</h1>

            <!-- Success / Error Messages -->
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Document Upload Form -->
            <form action="{{ route('student.documents.upload') }}" method="POST" enctype="multipart/form-data"
                class="bg-white rounded-3xl p-8 md:p-12 shadow-lg space-y-6 w-full max-w-none">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach(['birth_certificate', 'baptismal_certificate', 'report_card', 'good_moral_certificate', 'medical_records', 'id_photos', 'parent_id', 'proof_of_residence'] as $doc)
                        <div
                            class="flex flex-col border-l-4 border-green-700 bg-green-50/20 rounded p-4 space-y-2 shadow-sm">
                            <label
                                class="block text-gray-700 font-semibold">{{ ucwords(str_replace('_', ' ', $doc)) }}</label>

                            <!-- Custom file input -->
                            <label
                                class="flex items-center justify-between border border-gray-300 rounded px-3 py-2 cursor-pointer bg-white hover:bg-gray-50 transition">
                                <span class="text-gray-700 text-sm">Choose file</span>
                                <input type="file" name="{{ $doc }}"
                                    class="absolute opacity-0 w-full h-full cursor-pointer">
                            </label>
                        </div>
                    @endforeach
                </div>

                <button type="submit"
                    class="mt-6 bg-green-500 text-white font-semibold px-6 py-2 rounded hover:bg-green-600 transition">
                    Upload Documents
                </button>
            </form>

            <!-- Navigation Buttons -->
            <div class="flex justify-end mt-8">
                <a href="#"
                    class="inline-flex items-center text-white bg-green-700 hover:bg-green-800 px-4 py-2 rounded transition">
                    Next
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>

        </div>
    </main>

</body>

</html>

