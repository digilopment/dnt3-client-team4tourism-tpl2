<!--Contact Info Section-->
<section id="contct-info" class="section-padding parallex-bg contact-section overlay-dark" data-background-img="<?php echo $data['media_path']; ?>img/full/contact_bg.jpg" data-bg-position="right bottom">
	<div class="container text-center">
		<h1 class="main-title pb-60">Contact Me</h1>
	</div>
	<div class="container text-center">
		<div class="row">
		 <!-- contact information-->
			<div class="col-md-4">
				<div class="address-info mb-20">
					<div class="icon-left">
						<i class="fa fa-phone" aria-hidden="true"></i>
					</div>
					<div class="icon-text">
						<span>Call Me</span>
						<p>+123 456 789 0</p>
					</div>
				</div>
				<div class="address-info mb-20">
					<div class="icon-left">
						<i class="fa fa-envelope" aria-hidden="true"></i>
					</div>
					<div class="icon-text">
						<span>Email Me</span>
						<p>info@yourwebsite.com</p>
					</div>
				</div>
				<div class="address-info mb-20">
					<div class="icon-left">
						<i class="fa fa-paper-plane" aria-hidden="true"></i>
					</div>
					<div class="icon-text">
						<span>Office Address</span>
						<p> C/2, Washington Parts, CA, 3500 </p>
					</div>
				</div>
			</div>
			<!-- end of contact information-->
			<!-- contact Form-->
			<div class="col-md-8">
				<form id="contact" class="contact-form" novalidate="novalidate">
					<div class="col-md-12 text-center">
						<h5 class="successContent">
								<i class="fa fa-check left" style="color: #5cb45d;"></i>Thank you,Your message successfully Sent.
							</h5>
						<h5 class="errorContent" style="color: #e1534f;">
								<i class="fa fa-exclamation-circle left"></i>There was a Error in the form please check!
							</h5>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="cntform-field">
								<input class="input-md form-full" id="cnt-name" type="text" name="cnt-name" placeholder="Your Name" required="">
							</div>
						</div>
						<div class="col-md-6">
							<div class="cntform-field">
								<input class="input-md form-full" id="cnt-email" type="email" name="cnt-email" placeholder="Email" required="" aria-required="true">
							</div>
						</div>
						<div class="col-md-6">
							<div class="cntform-field">
								<input class="input-md form-full" id="cnt-subject" type="text" name="cnt-subject" placeholder="Subject">
							</div>
						</div>
						<div class="col-md-6">
							<div class="cntform-field">
								<input class="input-md form-full" id="cnt-company" type="text" name="cnt-company" placeholder="Company">
							</div>
						</div>
						<div class="col-md-12 mb-0">
							<div class="cntform-field">
								<textarea class="input-md form-full" id="cnt-message" rows="7" name="cnt-message" placeholder="Your Message" required=""></textarea>
							</div>
						</div>
						<div class="col-md-12 text-center">
							<button class="btn-contact-submit btn btn-md btn-color" type="submit" id="form-submit" name="submit">Submit</button>
						</div>
					</div>
				</form>
			</div>
			<!-- end of contact form-->
		</div>
	</div>
</section>