<div class="container-fluid footer">
	<div class="row">
		<div class="col-6 ">
			<span class="d-flex align-items-center">Επικοινωνία</span>
			<a href="tel:2610520202" class="d-flex align-items-center">Τηλέφωνο: 2610520202</a>
			<div class="social-media-icons">
				<a href="https://www.facebook.com/hrtachaias/"><img src="<?php echo base_url('assets/img/icons8-facebook-50.png'); ?>"></a>
				<a href="https://www.instagram.com/hrt_achaias/"><img src="<?php echo base_url('assets/img/icons8-instagram-48.png'); ?>"></a>
			</div>
		</div>
		<div class="col-6">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d415.161873927879!2d21.722983994496904!3d38.2125648882405!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x135e370a37348b7b%3A0xff1115fabdea5020!2zzpXOu867zrfOvc65zrrOriDOn868zqzOtM6xIM6UzrnOsc-Dz4nPg863z4IgzqDOsc-BzqzPgc-EzrfOvM6xIM6Rz4fOsc6QzrHPgg!5e0!3m2!1sel!2sgr!4v1740583411833!5m2!1sel!2sgr" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
		</div>
	</div>
</div>

<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/slick/slick.min.js') ?>"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('.main-slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            arrows: false
        });
	});
		$(document).ready(function () {
		$('.departments-slider').slick({
			slidesToShow: 3,
			slidesToScroll: 1,
			responsive: [
				{
					breakpoint: 1024,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 1,
					}
				},
				{
					breakpoint: 768,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 1
					}
				},
				{
					breakpoint: 430,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1
					}
				}
			]
		});
    });


	$(document).ready(function() {
		myElements = document.getElementsByClassName("slick-arrow");
		myElements.textContent (">");
	});
</script>
</body>

</html>
