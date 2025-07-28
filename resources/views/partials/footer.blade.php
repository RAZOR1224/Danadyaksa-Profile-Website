{{-- /resources/views/partials/footer.blade.php --}}
<footer class="bg-[#283593] text-gray-300">
    <div class="container mx-auto py-12 px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            
            <div class="lg:col-span-2">
                <h3 class="text-2xl font-bold text-white mb-4">Danadyaksa 08 Law Firm</h3>
                <p class="text-gray-400 mb-4 pr-4">
                    A leading law firm in Pontianak, West Borneo, providing comprehensive and client-focused legal solutions with integrity and professionalism.
                </p>
                <p class="text-gray-400">
                    <strong class="text-white">Address:</strong><br>
                    Jl. Parit Haji Muksin II, Komplek Telagah Indah No. 8, Sungai Raya, Kabupaten Kubu Raya, Kalimantan Barat 78121
                </p>
            </div>

            <div>
                <h4 class="text-xl font-semibold text-accent mb-4">Quick Links</h4>
                <ul class="space-y-2">
                    <li><a href="{{ route('home', app()->getLocale()) }}" class="hover:text-accent transition-colors">Home</a></li>
                    <li><a href="{{ route('about', app()->getLocale()) }}" class="hover:text-accent transition-colors">About Us</a></li>
                    <li><a href="{{ route('services', app()->getLocale()) }}" class="hover:text-accent transition-colors">Practice Areas</a></li>
                    <li><a href="{{ route('team', app()->getLocale()) }}" class="hover:text-accent transition-colors">Our Team</a></li>
                    <li><a href="{{ route('articles', app()->getLocale()) }}" class="hover:text-accent transition-colors">Articles</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-xl font-semibold text-accent mb-4">Connect With Us</h4>
                <div class="flex space-x-4">
                    <a href="https://www.facebook.com/danadyaksa08lawfirm" target="_blank" aria-label="Facebook" class="text-2xl hover:text-accent transition-colors"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.instagram.com/danadyaksa08lawfirm/?hl=en" target="_blank" aria-label="Instagram" class="text-2xl hover:text-accent transition-colors"><i class="fab fa-instagram"></i></a>
                    <a href="https://www.linkedin.com/company/danadyaksa-law-firm/?originalSubdomain=id" target="_blank" aria-label="LinkedIn" class="text-2xl hover:text-accent transition-colors"><i class="fab fa-linkedin-in"></i></a>
                    <a href="https://www.youtube.com/@danadyaksa08lawfirm" target="_blank" aria-label="Youtube" class="text-2xl hover:text-accent transition-colors"><i class="fab fa-youtube"></i></a>
                </div>
                 <div class="mt-4">
                    <p class="text-gray-400"><strong class="text-white">Email:</strong><br>danadyakasalawfirm@gmail.com</p>
                    <p class="text-gray-400 mt-2"><strong class="text-white">Hotline:</strong><br>085821384559 / 082150308772</p>
                 </div>
            </div>

        </div>
    </div>
    
    <div class="border-t border-gray-700">
        <div class="container mx-auto py-4 px-4 text-center text-sm text-gray-500">
            © {{ date('Y') }} Danadyaksa 08 Law Firm. All Rights Reserved.
        </div>
    </div>
</footer>