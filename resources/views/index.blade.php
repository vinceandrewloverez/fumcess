<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FUMCES</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

</head>
<body class="bg-gray-50">
    @include('layouts.nav')


    <section class="relative min-h-screen flex items-center overflow-hidden pt- ">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('assets/hero-image.jpg') }}" alt="Students" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-linear-to-r from-green-900/90 via-green-800/70 to-transparent"></div>
        </div>
        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-2xl text-white">
                <div class="inline-flex items-center gap-2 bg-white/20 backdrop-blur-sm rounded-full px-4 py-2 mb-6">
                    <i data-lucide="sparkles" class="w-4 h-4 text-yellow-400"></i>
                    <span class="text-sm font-medium">Now Enrolling for {{ now()->year }}-{{ now()->addYear()->year }}</span>
                </div>
                <h1 class="text-4xl md:text-6xl font-bold mb-6 leading-tight">Where Every Child's <span class="text-yellow-400">Potential</span> Shines Bright</h1>
                <p class="text-lg md:text-xl text-gray-100 mb-8">At Sunshine Elementary, we nurture curious minds through engaging, hands-on learning experiences.</p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('admissions') }}" class="bg-yellow-400 text-green-900 px-8 py-4 rounded-xl font-bold flex items-center justify-center gap-2 hover:bg-yellow-300 transition-colors">
                        Enroll Now <i data-lucide="arrow-right" class="w-5 h-5"></i>
                    </a>
                    <a href="{{ route('about') }}" class="border-2 border-white px-8 py-4 rounded-xl font-bold flex items-center justify-center hover:bg-white/10 transition-colors">Learn More</a>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 bg-white pattern-dots">
        <div class="container mx-auto px-4">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Why Families Choose <span class="text-green-600">Sunshine Elementary</span></h2>
                <p class="text-lg text-gray-600">We believe every child deserves an education that inspires, challenges, and prepares them for the future.</p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                @php
                    $features = [
                        ['icon' => 'heart', 'title' => 'Nurturing Environment', 'desc' => 'We create a warm, supportive atmosphere.', 'bg' => 'bg-red-100', 'text' => 'text-red-500'],
                        ['icon' => 'lightbulb', 'title' => 'Creative Learning', 'desc' => 'Our curriculum sparks curiosity through projects.', 'bg' => 'bg-yellow-100', 'text' => 'text-yellow-500'],
                        ['icon' => 'users', 'title' => 'Strong Community', 'desc' => 'Parents and teachers work together.', 'bg' => 'bg-blue-100', 'text' => 'text-blue-500'],
                        ['icon' => 'trophy', 'title' => 'Academic Excellence', 'desc' => 'Developing a lifelong love of learning.', 'bg' => 'bg-green-100', 'text' => 'text-green-500'],
                    ];
                @endphp
                @foreach($features as $f)
                    <div class="group bg-white rounded-3xl p-8 shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-2 border border-gray-100">
                        <div class="w-16 h-16 {{ $f['bg'] }} rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                            <i data-lucide="{{ $f['icon'] }}" class="w-8 h-8 {{ $f['text'] }}"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $f['title'] }}</h3>
                        <p class="text-gray-600 leading-relaxed">{{ $f['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-6 mb-12">
                <div class="max-w-2xl">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Our Educational Programs</h2>
                    <p class="text-lg text-gray-600">A well-rounded curriculum designed to develop the whole child.</p>
                </div>
                <a href="{{ route('education') }}" class="inline-flex items-center gap-2 ...">
                    View All Programs <i data-lucide="arrow-right" class="w-4 h-4"></i>
                </a>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @php
                    $programs = [
                        ['icon' => 'book-open', 'title' => 'Language Arts', 'desc' => 'Reading and writing through stories.', 'grades' => 'K-5', 'color' => 'bg-red-500'],
                        ['icon' => 'calculator', 'title' => 'Mathematics', 'desc' => 'Problem-solving and logical thinking.', 'grades' => 'K-5', 'color' => 'bg-teal-500'],
                        ['icon' => 'globe', 'title' => 'Social Studies', 'desc' => 'Exploring history and geography.', 'grades' => 'K-5', 'color' => 'bg-blue-400'],
                        ['icon' => 'leaf', 'title' => 'Science', 'desc' => 'Hands-on experiments and discovery.', 'grades' => 'K-5', 'color' => 'bg-green-500'],
                        ['icon' => 'palette', 'title' => 'Visual Arts', 'desc' => 'Nurturing creativity through arts.', 'grades' => 'K-5', 'color' => 'bg-yellow-400'],
                        ['icon' => 'music', 'title' => 'Music', 'desc' => 'Self-expression through performance.', 'grades' => 'K-5', 'color' => 'bg-orange-500'],
                    ];
                @endphp
                @foreach($programs as $program)
                    <div class="group bg-white rounded-3xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                        <div class="h-2 {{ $program['color'] }}"></div>
                        <div class="p-8">
                            <div class="flex items-start justify-between mb-4">
                                <div class="w-14 h-14 {{ $program['color'] }} rounded-2xl flex items-center justify-center">
                                    <i data-lucide="{{ $program['icon'] }}" class="w-7 h-7 text-white"></i>
                                </div>
                                <span class="text-xs font-semibold bg-gray-100 text-gray-500 px-3 py-1 rounded-full">Grades {{ $program['grades'] }}</span>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $program['title'] }}</h3>
                            <p class="text-gray-600 leading-relaxed">{{ $program['desc'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    @include('layouts.footer')

    <script src="https://unpkg.com/lucide@latest"></script>
    <script>lucide.createIcons();</script>
</body>
</html>