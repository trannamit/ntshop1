<section class="block gray no-padding">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content-box no-margin go-simple">
					<div class="mini-service-sec">
						<div class="row">
							<div class="col-md-3">
								<div class="mini-service">
									<i class="fa fa-paper-plane"></i>
									<div class="mini-service-info">
										<h3>Giao hàng miễn phí</h3>
										<p>unc tincidunt, on cursusau gmetus, lorem Hore</p>
									</div>
								</div><!-- Mini Service -->
							</div>
							<div class="col-md-3">
								<div class="mini-service">
									<i class="fa  fa-newspaper-o"></i>
									<div class="mini-service-info">
										<h3>Thông tin chính xác</h3>
										<p>unc tincidunt, on cursusa ugmetus, lorem Hore</p>
									</div>
								</div><!-- Mini Service -->
							</div>
							<div class="col-md-3">
								<div class="mini-service">
									<i class="fa fa-medkit"></i>
									<div class="mini-service-info">
										<h3>Phục vụ chuyên nghiệp</h3>
										<p>unc tincidunt, on cursusau gmetus, lorem Hore</p>
									</div>
								</div><!-- Mini Service -->
							</div>
							<div class="col-md-3">
								<div class="mini-service">
									<i class="fa  fa-newspaper-o"></i>
									<div class="mini-service-info">
										<h3>Tư vấn tận tình</h3>
										<p>unc tincidunt, on cursusa ugmetus, lorem Hore</p>
									</div>
								</div><!-- Mini Service -->
							</div>
						</div>
					</div><!-- Mini Service Sec -->
				</div>
			</div>
		</div>
	</div>
</section>
<div class="clearfix"></div>

</main>
<!-- end main content -->






<!-- start footer area -->
<footer class="footer-area-content">


<div class="footer-bottom footer-wrapper style-3">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="footer-bottom-navigation">
					<div class="cell-view">
						<div class="footer-links">
							<a href="#">Site Map</a>
							<a href="#">Search</a>
							<a href="#">Terms</a>
							<a href="#">Advanced Search</a>
							<a href="#">Orders and Returns</a>
							<a href="#">Contact Us</a>
						</div>
						<div class="copyright">Created with by <a target="_blank"
								href="http://iglyphic.com/">iGlyphic</a> . All right reserved</div>
					</div>
					<div class="cell-view">
						<div class="payment-methods">
							<a href="#"><img alt="" src="/template/img/payment-method-1.png"></a>
							<a href="#"><img alt="" src="/template/img/payment-method-2.png"></a>
							<a href="#"><img alt="" src="/template/img/payment-method-3.png"></a>
							<a href="#"><img alt="" src="/template/img/payment-method-4.png"></a>
							<a href="#"><img alt="" src="/template/img/payment-method-5.png"></a>
							<a href="#"><img alt="" src="/template/img/payment-method-6.png"></a>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>



</footer>
<!-- footer area end -->
	<!-- All script -->
	<script src="/template/js/vendor/jquery-1.10.2.min.js"></script>
	<script src="/template/js/bootstrap.min.js"></script>
	<script src="/template/js/smoothscroll.js"></script>
	<!-- Scroll up js
	============================================ -->
	<script src="/template/js/jquery.scrollUp.js"></script>
	<script src="/template/js/menu.js"></script>
	
	
	<script src="/template/js/pluginse209.js?v=1.0.0"></script>
	
	<!-- Magnific Popup -->
	<script src="/template/js/jquery.magnific-popup.min.js"></script>
	
	<script src="/template/js/jquery.countdown.min.js"></script>
	
	
	<script src="/template/s/jquery.scrolly.js"></script>
	
	
	<!-- External libraries: jQuery & GreenSock -->
	<script src="/template/layerslider/js/greensock.js" type="text/javascript"></script>
	<!-- LayerSlider script files -->
	<script src="/template/layerslider/js/layerslider.transitions.js" type="text/javascript"></script>
	<script src="/template/layerslider/js/layerslider.kreaturamedia.jquery.js" type="text/javascript"></script>
	
	
	<!-- Owl carousel -->
	<script src="/template/js/owl.carousel.min.js"></script>
	<script src="/template/js/main.js"></script>
	
	
	
	
	<script type="text/javascript">
		$(document).ready(function() {
	
			"use strict";
	
			//** Slider  **//
			jQuery("#layerslider").layerSlider({
				responsive: true,
				responsiveUnder: 1170,
				layersContainer: 1170,
				skin: 'v5',
				hoverPrevNext: true,
				navPrevNext: true,
				navStartStop: false,
				navButtons: false,
				skinsPath: '/template/layerslider/skins/'
			});
	
	
			/*=================== Parallax ===================*/
			$('.parallax').scrolly({bgParallax: true});
	
	
			/* Owl carousel */
			$(".owl-carousel").owlCarousel({
				slideSpeed : 500,
				rewindSpeed : 1000,
				mouseDrag : true,
				stopOnHover : true
			});
			/* Own navigation */
			$(".owl-nav-prev").click(function(){
				$(this).parent().next(".owl-carousel").trigger('owl.prev');
			});
			$(".owl-nav-next").click(function(){
				$(this).parent().next(".owl-carousel").trigger('owl.next');
			});
	
	
		});
	</script>