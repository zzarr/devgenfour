 <!-- dark version -->

 <!-- Jquery Slim JS -->
 <script src="{{ asset('fria/fria/assets/js/jquery.min.js') }}"></script>
 <!-- Bootstrap JS -->
 <script src="{{ asset('fria/fria/assets/js/bootstrap.bundle.min.js') }} "></script>
 <!-- Meanmenu JS -->
 <script src="{{ asset('fria/fria/assets/js/jquery.meanmenu.js') }} "></script>
 <!-- Owl Carousel JS -->
 <script src="{{ asset('fria/fria/assets/js/owl.carousel.min.js') }} "></script>
 <!-- Magnific JS -->
 <script src="{{ asset('fria/fria/assets/js/jquery.magnific-popup.min.js') }} "></script>
 <!-- Appear JS -->
 <script src="{{ asset('fria/fria/assets/js/jquery.appear.min.js') }} "></script>
 <!-- Odometer JS -->
 <script src="{{ asset('fria/fria/assets/js/odometer.min.js') }} "></script>
 <!-- Form Ajaxchimp JS -->
 <script src="{{ asset('fria/fria/assets/js/jquery.ajaxchimp.min.js') }} "></script>
 <!-- Form Validator JS -->
 <script src="{{ asset('fria/fria/assets//js/form-validator.min.js') }} "></script>
 <!-- Contact JS -->
 <script src="{{ asset('fria/fria/assets/js/contact-form-script.js') }} "></script>
 <!-- Wow JS -->
 <script src="{{ asset('fria/fria/assets//js/wow.min.js') }} "></script>
 <!-- Custom JS -->
 <script src="{{ asset('fria/fria/assets//js/main.js') }} "></script>

<!-- script-landingpage.blade.php -->

<!-- project in navbar counter -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('projects-link').addEventListener('click', function() {
        fetch('{{ route('increment.project.counter') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                ip_address: '{{ request()->ip() }}'
            })
        })
        .then(response => response.json())
        .then(data => console.log('Project count incremented: ', data))
        .catch(error => console.error('Error incrementing project count:', error));
    });
});
</script>


<!-- detail project counter -->



