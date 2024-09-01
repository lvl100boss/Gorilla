<x-layout>
    <section class="contact-sect1-bg-img">
        <div class="outline outline-white outline-0 max-w-screen-xl mx-auto pt-32">
            <div class="grid gap-10 items-center" style="grid-template-columns: 28rem 1fr;">

                <div class="outline outline-green-500 outline-0">
                    <h1 class="font-PSDisplayItalic text-7xl italic font-bold mb-14 -ml-3 tracking-widest">WEL<span class="text-accent">COME!</span></h1>
                    <p class="text-left drop-shadow-2xl text-lg text-pretty mb-14 max-w-80">
                        Welcome to GORILLA, Visit our store, easily accessible from WMSU, making fashion more accessible than ever.
                    </p>
                    <h3 class="mb-14 text-xl font-bold max-w-80">
                        W376+CGQ, Normal Rd, Zamboanga, 7000 Zamboanga del Sur
                    </h3>
                    <h3 class="text-xl font-bold">
                        example12343@email.com
                    </h3>
                </div>

                <div class="outline outline-green-500 outline-0">
                    <iframe class="map rounded-lg w-full" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2800.7159565285465!2d122.05942932300556!3d6.913248550019933!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x325041dd7a24816f%3A0x51af215fb64cc81a!2sWestern%20Mindanao%20State%20University!5e0!3m2!1sen!2sph!4v1711617553210!5m2!1sen!2sph" width="auto" height="auto" style="border: 2dvh solid white; filter: invert(90%) grayscale(1); height: 55dvh;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

            </div>
        </div>
    </section>
    <section>
        <div class="outline outline-white outline-0 max-w-screen-xl mx-auto py-32">
            <div class="grid gap-10 items-center" style="grid-template-columns: 1fr 25.8rem;">

                <div class="outline outline-green-500 outline-0">
                    <form class="grid gap-5" action="/contact" method="POST">
                        @csrf
                        <div class="grid">
                            <label for="name" class="text-pretty">Name</label>
                            <input type="text" id="name" name="name" class="input" placeholder="Name">
                        </div>
                        <div class="grid">
                            <label for="email" class="text-pretty">Email</label>
                            <input type="email" id="email" name="email" class="input" placeholder="Email">
                        </div>
                        <div class="grid">
                            <label for="subject" class="text-pretty">Subject</label>
                            <input type="email" id="email" name="email" class="input" placeholder="Subject">
                        </div>
                        <div class="grid">
                            <label for="message" class="text-pretty">Message</label>
                            <textarea id="message" name="message" class="input h-32" placeholder="Message"></textarea>
                        </div>
                        <button type="submit" class="btn py-4 outline outline-accent outline-offset-4 outline-1">Send</button>
                    </form>
                </div>

                <div class="outline outline-green-500 outline-0 tracking-wide">
                    <h1 class="font-PSDisplayItalic text-7xl italic font-bold mb-14 -ml-3 tracking-widest">CON<span class="text-accent">TACT</span></h1>
                    <p class="text-left drop-shadow-2xl text-lg text-pretty mb-14 max-w-80">
                        We are always open to hear from you. If you have any questions, suggestions, or feedback, feel free to reach out to us.
                    </p>
                    <h3 class="text-left drop-shadow-2xl text-lg text-pretty mb-14 max-w-80">We are open from 9:00 AM to 6:00 PM, Monday to Saturday.</h3>
                </div>
            </div>
        </div>   
    </section>
    <section>
        <div class="outline outline-white outline-0 max-w-screen-xl mx-auto pt-10 pb-32">
            <div class="grid gap-10 items-center" style="grid-template-columns: 1fr 25.8rem;">

                <div class="outline outline-green-500 outline-0">
                    <h1 class="font-PSDisplayItalic text-7xl italic font-bold mb-14 -ml-3 tracking-widest">FOL<span class="text-accent">LOW</span></h1>
                    <p class="text-left drop-shadow-2xl text-lg text-pretty mb-14 max-w-80">
                        Follow us on our social media accounts to stay updated on our latest products, promotions, and events.
                    </p>
                    <div class="grid gap-5">
                        <a href="#" class="btn py-4 outline outline-accent outline-offset-4 outline-1">Facebook</a>
                        <a href="#" class="btn py-4 outline outline-accent outline-offset-4 outline-1">Instagram</a>
                        <a href="#" class="btn py-4 outline outline-accent outline-offset-4 outline-1">Twitter</a>
                    </div>
                </div>

                <div class="outline outline-green-500 outline-0 h-full">
                    <img src="{{ asset('storage/web-images/guy1.jpg') }}" alt="Contact" class="
                        rounded-sm
                        h-full 
                        object-cover
                        {{-- border-4 --}}
                        {{-- border-medium-dark --}}
                        outline outline-[#0d2d22] outline-offset-4 outline-2
                    ">
                </div>

            </div>
        </div>
    </section>
</x-layout>
{{-- NICE GRADIENT KEEP --}}
{{-- bg-gradient-to-r from-purple-400 via-pink-500 to-red-500 bg-blend-overlay bg-cover bg-center h-64 --}}