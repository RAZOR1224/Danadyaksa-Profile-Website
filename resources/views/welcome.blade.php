@extends('layouts.app')

@section('title', 'My Awesome Profile')

@section('content')
    <section id="home" class="h-screen bg-gradient-to-r from-purple-600 to-indigo-600 text-white flex items-center justify-center text-center px-4 pt-16">
        <div class="max-w-3xl">
            <img src="{{ asset('images/profile.jpg') }}" alt="Your Profile Picture" class="w-40 h-40 rounded-full mx-auto mb-6 object-cover border-4 border-white shadow-lg animate-fade-in-up">
            <h1 class="text-5xl md:text-6xl font-bold mb-4 animate-fade-in-up delay-100">Hi, I'm Your Name</h1>
            <p class="text-xl md:text-2xl mb-8 animate-fade-in-up delay-200">A passionate Web Developer focused on creating beautiful and functional web applications.</p>
            <a href="#contact" class="bg-white text-indigo-600 hover:bg-gray-100 px-8 py-3 rounded-full text-lg font-semibold transition duration-300 ease-in-out transform hover:scale-105 animate-fade-in-up delay-300">Get in Touch</a>
        </div>
    </section>

    <section id="about" class="py-20 bg-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-4xl font-bold mb-8 text-gray-900">About Me</h2>
            <div class="max-w-2xl mx-auto leading-relaxed text-gray-700 text-lg">
                <p class="mb-4">
                    Hello! I'm [Your Name], a web developer with X years of experience in building dynamic and responsive web applications. My journey into web development started with a curiosity for how websites work, which quickly turned into a passion for crafting digital experiences.
                </p>
                <p class="mb-4">
                    I specialize in [list your main skills, e.g., Laravel, Vue.js, React, modern CSS frameworks]. I love bringing ideas to life and solving complex problems with clean, efficient code.
                </p>
                <p>
                    When I'm not coding, you can find me [mention hobbies, e.g., exploring nature, reading sci-fi, or brewing coffee]. I'm always eager to learn new technologies and contribute to exciting projects.
                </p>
            </div>
        </div>
    </section>

    <section id="skills" class="py-20 bg-gray-50">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-4xl font-bold mb-8 text-gray-900">My Skills</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 max-w-4xl mx-auto">
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 transform hover:-translate-y-2">
                    <i class="fab fa-html5 text-5xl text-orange-500 mb-4"></i>
                    <h3 class="text-xl font-semibold mb-2">HTML5</h3>
                    <p class="text-gray-600">Semantic markup & accessible structures.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 transform hover:-translate-y-2">
                    <i class="fab fa-css3-alt text-5xl text-blue-500 mb-4"></i>
                    <h3 class="text-xl font-semibold mb-2">CSS3</h3>
                    <p class="text-gray-600">Responsive layouts & modern design.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 transform hover:-translate-y-2">
                    <i class="fab fa-js-square text-5xl text-yellow-500 mb-4"></i>
                    <h3 class="text-xl font-semibold mb-2">JavaScript</h3>
                    <p class="text-gray-600">Dynamic interactivity & logic.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 transform hover:-translate-y-2">
                    <i class="fab fa-laravel text-5xl text-red-500 mb-4"></i>
                    <h3 class="text-xl font-semibold mb-2">Laravel</h3>
                    <p class="text-gray-600">Robust backend development.</p>
                </div>
                </div>
        </div>
    </section>

    <section id="portfolio" class="py-20 bg-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-4xl font-bold mb-8 text-gray-900">My Portfolio</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition duration-300">
                    <img src="{{ asset('images/project1.jpg') }}" alt="Project 1" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2">Project Title 1</h3>
                        <p class="text-gray-600 mb-4">A brief description of this project and the technologies used (e.g., Laravel, Vue.js, Tailwind CSS).</p>
                        <a href="#" class="text-indigo-600 hover:underline font-semibold">View Project &rarr;</a>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition duration-300">
                    <img src="{{ asset('images/project2.jpg') }}" alt="Project 2" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2">Project Title 2</h3>
                        <p class="text-gray-600 mb-4">Another description of a project, highlighting your skills and contribution.</p>
                        <a href="#" class="text-indigo-600 hover:underline font-semibold">View Project &rarr;</a>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition duration-300">
                    <img src="{{ asset('images/project3.jpg') }}" alt="Project 3" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2">Project Title 3</h3>
                        <p class="text-gray-600 mb-4">A third project showcasing a different facet of your abilities.</p>
                        <a href="#" class="text-indigo-600 hover:underline font-semibold">View Project &rarr;</a>
                    </div>
                </div>
                </div>
        </div>
    </section>

    <section id="contact" class="py-20 bg-gray-50">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-4xl font-bold mb-8 text-gray-900">Get in Touch</h2>
            <p class="text-lg text-gray-700 mb-8 max-w-xl mx-auto">
                Have a question or want to work together? Feel free to reach out!
            </p>
            <form action="#" method="POST" class="max-w-xl mx-auto bg-white p-8 rounded-lg shadow-md">
                @csrf {{-- Laravel CSRF token for forms --}}
                <div class="mb-4 text-left">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                    <input type="text" id="name" name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div class="mb-4 text-left">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                    <input type="email" id="email" name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div class="mb-6 text-left">
                    <label for="message" class="block text-gray-700 text-sm font-bold mb-2">Message:</label>
                    <textarea id="message" name="message" rows="5" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required></textarea>
                </div>
                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-6 rounded-full transition duration-300 ease-in-out transform hover:scale-105">Send Message</button>
            </form>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        // Optional: Add a class to the header on scroll for a sticky effect
        window.addEventListener('scroll', function() {
            const header = document.querySelector('header');
            if (window.scrollY > 50) {
                header.classList.add('header-scrolled'); // Add this class for styling
            } else {
                header.classList.remove('header-scrolled');
            }
        });
    </script>
@endpush