<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Admissions</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex bg-gray-100">

    {{-- Sidebar --}}
    @include('student.layouts.sidebar')

    <div class="space-y-6">

        <!-- Header -->
        <div class="animate-fade-in">
            <h1 class="text-3xl font-bold text-gray-800">Admissions</h1>
            <p class="text-gray-500 mt-1">Your admission status and enrollment information</p>
        </div>
    
        <!-- Grid: Current Enrollment + Status -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    
            <!-- Current Enrollment Info -->
            <div class="lg:col-span-2 bg-white rounded-xl shadow p-6 animate-fade-in">
                <div class="flex items-center gap-2 mb-4">
                    <!-- GraduationCap icon -->
                    <svg class="h-5 w-5 text-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 14l9-5-9-5-9 5 9 5z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 14l6.16-3.422a12.083 12.083 0 01.84 4.421 12.083 12.083 0 01-.84 4.422L12 14z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 14L5.84 19.422A12.083 12.083 0 016.68 15a12.083 12.083 0 01-.84-4.422L12 14z" />
                    </svg>
                    <h2 class="text-lg font-semibold">Current Enrollment</h2>
                </div>
    
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-4">
                        <div>
                            <p class="text-sm text-gray-500">Program</p>
                            <p class="font-medium">{{ $currentInfo['program'] }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Year Level & Section</p>
                            <p class="font-medium">{{ $currentInfo['yearLevel'] }} - {{ $currentInfo['section'] }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Academic Year</p>
                            <p class="font-medium">{{ $currentInfo['academicYear'] }}</p>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <div>
                            <p class="text-sm text-gray-500">Academic Adviser</p>
                            <p class="font-medium">{{ $currentInfo['adviser'] }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Student Status</p>
                            <span class="inline-block mt-1 px-3 py-1 rounded-full text-green-700 bg-green-100">
                                {{ $currentInfo['status'] }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
    
            <!-- Status Card -->
            <div class="bg-green-700 text-white rounded-xl shadow p-6 flex flex-col justify-center animate-fade-in">
                <div class="text-center space-y-4">
                    <div class="h-16 w-16 mx-auto rounded-full bg-white/20 flex items-center justify-center">
                        <!-- CheckCircle2 icon -->
                        <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-2xl font-bold">Fully Enrolled</p>
                        <p class="text-sm opacity-80">Spring Semester 2026</p>
                    </div>
                    <div class="w-full bg-white/20 h-2 rounded-full overflow-hidden">
                        <div class="bg-white h-2 rounded-full" style="width: {{ $progress }}%;"></div>
                    </div>
                    <p class="text-xs opacity-70">All admission requirements completed</p>
                </div>
            </div>
        </div>
    
        <!-- Admission Timeline -->
        <div class="bg-white rounded-xl shadow p-6 animate-fade-in">
            <h3 class="font-semibold text-lg mb-4">Admission Timeline</h3>
            <div class="relative">
                @foreach ($admissionSteps as $index => $step)
                    <div class="flex gap-4 pb-8 last:pb-0">
                        <div class="flex flex-col items-center">
                            <div class="h-10 w-10 rounded-full flex items-center justify-center 
                                {{ $step['status'] === 'completed' ? 'bg-green-700 text-white' : 'bg-gray-200 text-gray-500' }}">
                                <!-- Step icon placeholder -->
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="{{ $step['iconPath'] }}" />
                                </svg>
                            </div>
                            @if ($index < count($admissionSteps)-1)
                                <div class="w-0.5 flex-1 mt-2 {{ $step['status']==='completed' ? 'bg-green-700' : 'bg-gray-200' }}"></div>
                            @endif
                        </div>
                        <div class="flex-1 pt-1.5">
                            <div class="flex items-center justify-between">
                                <h4 class="font-medium">{{ $step['title'] }}</h4>
                                <span class="text-sm text-gray-500">{{ $step['date'] }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    
</body>
</html>

Undefined variable $currentInfo
