<div class="faq" id="faq">
    <div class="container mx-auto">
        <div class="head text-center">
            <span class="block">Ürün Kullanımı</span>
            <h4>Ürün Kullanımı Hakkında</h4>
        </div>
        <div class="theme-faq-info-in">
            <ul class="flex flex-wrap">
                @foreach($FAQs as $FAQ)
                <li class="w-full lg:w-1/2">
                    <div class="theme-faq-qa-head flex items-center justify-between">
                        <span class="block truncate">{{ $FAQ->translations[0]->question }}</span>
                        <svg class="flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 300.003 300.003">
                            <path d="M150 0C67.159 0 .001 67.159.001 150c0 82.838 67.157 150.003 149.997 150.003S300.002 232.838 300.002 150c0-82.841-67.16-150-150.002-150zm67.685 189.794c-5.47 5.467-14.338 5.47-19.81 0l-48.26-48.27-48.522 48.516c-5.467 5.467-14.338 5.47-19.81 0-2.731-2.739-4.098-6.321-4.098-9.905s1.367-7.166 4.103-9.897l56.292-56.297c.539-.838 1.157-1.637 1.888-2.368 2.796-2.796 6.476-4.142 10.146-4.077 3.662-.062 7.348 1.281 10.141 4.08.734.729 1.349 1.528 1.886 2.365l56.043 56.043c5.468 5.47 5.472 14.338.001 19.81z"></path>
                        </svg>
                    </div>
                    <div class="theme-faq-qa-content">
                        <p>{{ $FAQ->translations[0]->answer }}</p>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
