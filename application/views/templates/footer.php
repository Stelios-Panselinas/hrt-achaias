<div class="container-fluid">
	<div class="row">
		<div class="col-12 footer">
			<span class="d-flex align-items-center">Επικοινωνία</span>
			<a href="tel:1234567890" class="d-flex align-items-center">Τηλέφωνο: 1234567890</a>
			<div class="social-media-icons">
				<a href="https://www.facebook.com/hrtachaias/"><img src="<?php echo base_url('assets/img/icons8-facebook-50.png'); ?>"></a>
				<a href="https://www.instagram.com/hrt_achaias/"><img src="<?php echo base_url('assets/img/icons8-instagram-48.png'); ?>"></a>
			</div>
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
