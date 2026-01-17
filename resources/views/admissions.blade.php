<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>First United Methodist Church Ecumenical School Inc. - Admissions</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-green-50 font-sans">

  @include('layouts.header')

  <main>

    <!-- Hero Section -->
    <section class="py-24 bg-green-700 relative text-white text-center">
      <div class="max-w-3xl mx-auto px-4">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Enroll Your Child Today</h1>
        <p class="text-xl">We're excited to welcome new families! Complete the enrollment form below to start your child's journey at First United Methodist Church Ecumenical School Inc Elementary.</p>
      </div>
    </section>

    <!-- Enrollment Process Section -->
    <section class="py-16 bg-[#f5f6f1]">
      <div class="container mx-auto px-4">
        <div class="text-center max-w-2xl mx-auto mb-12">
          <h2 class="text-3xl font-display font-bold text-foreground mb-4">Enrollment Process</h2>
          <p class="text-lg text-muted-foreground">Our streamlined process makes it easy for families to join our community.</p>
        </div>
    
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
          @php
            $steps = [
              ['title' => 'Complete Application', 'icon' => 'M3 7h18M3 12h18M3 17h18'], // example: menu
              ['title' => 'Submit Documents', 'icon' => 'M12 4v16m8-8H4'], // example: plus
              ['title' => 'Family Interview', 'icon' => 'M5 13l4 4L19 7'], // check
              ['title' => 'Welcome to FUMCES!', 'icon' => 'M12 2a10 10 0 100 20 10 10 0 000-20z'] // circle
            ];
          @endphp
    
          @foreach($steps as $index => $step)
          <div class="relative bg-white rounded-3xl p-6 shadow-md hover:shadow-lg transition-transform transform hover:-translate-y-1">
            <div class="absolute -top-3 left-6 bg-green-700 text-white font-bold text-sm px-3 py-1 rounded-full">
              {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
            </div>
            <div class="mt-6 flex flex-col items-center text-center">
              <div class="w-14 h-14 bg-green-100 rounded-2xl flex items-center justify-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-green-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $step['icon'] }}" />
                </svg>
              </div>
              <h3 class="text-lg font-bold text-foreground mb-2">{{ $step['title'] }}</h3>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section>

    
    <section class="py-16 bg-white">
      <div class="container mx-auto px-4">
        <div class="text-center max-w-2xl mx-auto mb-12">
          <h2 class="text-3xl font-display font-bold text-foreground mb-4">Why Choose FUMCES?</h2>
          <p class="text-lg text-muted-foreground">We provide a nurturing and innovative environment for your child’s growth.</p>
        </div>
    
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
          @php
            $benefits = [
              ['title' => 'Experienced Faculty', 'description' => 'Learn from teachers with years of experience and a passion for education.', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" />'], // example: academic cap
              ['title' => 'Modern Facilities', 'description' => 'State-of-the-art classrooms, labs, and sports areas for full development.', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18v10H3V10z" />'], // example: building
              ['title' => 'Inclusive Community', 'description' => 'A welcoming environment where every student feels valued.', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4z" />'], // example: user group
              ['title' => 'Holistic Growth', 'description' => 'Balanced focus on academics, arts, and physical development.', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2l3 7h7l-5.5 4.5L18 21l-6-4-6 4 2.5-7.5L2 9h7l3-7z" />'] // example: star/growth
            ];
          @endphp
    
          @foreach($benefits as $benefit)
          <div class="bg-[#f5f6f1] rounded-3xl p-6 shadow-md hover:shadow-lg transition-transform transform hover:-translate-y-1 text-center">
            <div class="w-14 h-14 bg-green-100 rounded-2xl flex items-center justify-center mb-4 mx-auto">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-green-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                {!! $benefit['icon'] !!}
              </svg>
            </div>
            <h3 class="text-lg font-bold text-foreground mb-2">{{ $benefit['title'] }}</h3>
            <p class="text-sm text-muted-foreground">{{ $benefit['description'] }}</p>
          </div>
          @endforeach
        </div>
      </div>
    </section>
    


  </main>

  @include('layouts.footer')
</body>

</html>


