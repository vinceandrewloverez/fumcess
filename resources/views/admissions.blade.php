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
          @foreach(['Complete Application', 'Submit Documents', 'Family Interview', 'Welcome to FUMCES!'] as $index => $step)
          <div class="relative bg-white rounded-3xl p-6 shadow-md hover:shadow-lg transition-transform transform hover:-translate-y-1">
            <div class="absolute -top-3 left-6 bg-green-700 text-white font-bold text-sm px-3 py-1 rounded-full">
              {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
            </div>
            <div class="mt-6 flex flex-col items-center text-center">
              <div class="w-14 h-14 bg-green-100 rounded-2xl flex items-center justify-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-green-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
              </div>
              <h3 class="text-lg font-bold text-foreground mb-2">{{ $step }}</h3>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section>

    <!-- Enrollment Form Section -->
    <section class="py-24 bg-[#faf9f5]">
      <div class="max-w-4xl mx-auto px-4">
        <div class="text-center mb-12">
          <h2 class="text-3xl font-bold text-green-700 mb-4">Student Enrollment Application</h2>
          <p class="text-green-700/70">Please fill out all required fields to submit your child's enrollment application.</p>
        </div>

        {{-- Success message --}}
        @if(session('success'))
          <div class="bg-green-100 text-green-700 px-6 py-4 rounded-xl mb-6 text-center font-semibold">
            {{ session('success') }}
          </div>
        @endif


      </div>
    </section>

  </main>

  @include('layouts.footer')
</body>

</html>


Route [student.admissions.store] not defined.