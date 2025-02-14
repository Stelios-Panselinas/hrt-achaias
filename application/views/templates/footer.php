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
		$('.departments-slider').slick({
			slidesToShow: 3,
			slidesToScroll: 1,
		});
    });
</script>
</body>

</html>
