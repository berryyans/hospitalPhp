<?php
require_once("contact_form/config.php");
?>
<div class="page relative">
	<div class="page_layout page_margin_top clearfix">
		<div class="page_header clearfix">
			<div class="page_header_left">
				<h1 class="page_title">Contact</h1>
				<ul class="bread_crumb">
					<li>
						<a href="?page=home" title="Home">
							Home
						</a>
					</li>
					<li class="separator icon_small_arrow right_gray">
						&nbsp;
					</li>
					<li>
						Contact
					</li>
				</ul>
			</div>
			<div class="page_header_right">
				<form class="search">
					<input class="search_input" type="text" value="To search type and hit enter..." placeholder="To search type and hit enter..." />
				</form>
			</div>
		</div>
		<div class="clearfix">
			<div class="contact_map page_margin_top" id="map">
			</div>
			<div class="page_margin_top clearfix">
				<div class="page_left">
					<h3 class="box_header">
						Online Appointment Form
					</h3>
					<form class="contact_form" id="contact_form" method="post" action="contact_form/contact_form.php">
						<ul class="clearfix tabs_box_navigation sf-menu">
							<li class="tabs_box_navigation_selected submenu wide">
								<input type="hidden" name="department" value="" />
								<span>Select department</span>
								<ul>
									<li>
										<a href="#laryngological-clinic" title="Laryngological Clinic">
											Laryngological Clinic
										</a>
									</li>
									<li>
										<a href="#primary-health-care" title="Primary Health Care">
											Primary Health Care
										</a>
									</li>
									<li>
										<a href="#ophthalmology-clinic" title="Ophthalmology Clinic">
											Ophthalmology Clinic
										</a>
									</li>
									<li>
										<a href="#pediatric-clinic" title="Pediatric Clinic">
											Pediatric Clinic
										</a>
									</li>
									<li>
										<a href="#dental-clinic" title="Dental Clinic">
											Dental Clinic
										</a>
									</li>
									<li>
										<a href="#outpatient-surgery" title="Outpatient Surgery">
											Outpatient Surgery
										</a>
									</li>
									<li>
										<a href="#outpatient-rehabilitation" title="Outpatient Rehabilitation">
											Outpatient Rehabilitation
										</a>
									</li>
									<li>
										<a href="#gynaecological-clinic" title="Gynaecological Clinic">
											Gynaecological Clinic
										</a>
									</li>
									<li>
										<a href="#cardiac-clinic" title="Cardiac Clinic">
											Cardiac Clinic
										</a>
									</li>
								</ul>
							</li>
						</ul>
						<fieldset class="left">
							<label>First Name</label>
							<div class="block">
								<input class="text_input" name="first_name" type="text" value="" />
							</div>
							<label>Date of Birth (mm/dd/yyyy)</label>
							<div class="block">
								<input class="text_input" type="text" name="date_of_birth" value="" />
							</div>
							<label>Phone Number</label>
							<div class="block">
								<input class="text_input" name="phone_number" type="text" value="" />
							</div>
						</fieldset>
						<fieldset class="right">
							<label>Last Name</label>
							<div class="block">
								<input class="text_input" type="text" name="last_name" value="" />
							</div>
							<label>Social Security Number</label>
							<div class="block">
								<input class="text_input" type="text" name="social_security_number" value="" />
							</div>
							<label>E-mail</label>
							<div class="block">
								<input class="text_input" type="text" name="email" value="" />
							</div>
						</fieldset>
						<fieldset style="clear:both;">
							<label>Reason of Appointment</label>
							<div class="block">
								<textarea name="message"></textarea>
							</div>
							<input type="hidden" name="action" value="contact_form" />
							<input type="submit" name="submit" value="Send" class="more blue" />
						</fieldset>
					</form>
				</div>
				<div class="page_right">
					<h3 class="box_header">
						Medicenter Clinic
					</h3>
					<h3 class="sentence">
						One of the most sublime experiences we can ever have is to wake up feeling healthy after we have been sick.
					</h3>
					<ul class="columns no_padding page_margin_top clearfix">
						<li class="column_left">
							Medicenter Clinic<br />
							33 Farlane Street<br />
							Keilor East<br />
							VIC 3033, Australia
						</li>
						<li class="column_right">
							Phone: +123 655 655<br />
							Fax: +123 755 755<br />
							ABN: 32040030725
						</li>
					</ul>
					<ul class="contact_data page_margin_top">
						<li class="clearfix">
							<span class="social_icon phone"></span>
							<p class="value">
								Phone: <strong>1-800-643-4300</strong>
							</p>
						</li>
						<li class="clearfix">
							<span class="social_icon mail"></span>
							<p class="value">
								E-mail: <a href="mailto:medicenter@mail.com">medicenter@mail.com</a>
							</p>
						</li>
						<li class="clearfix">
							<span class="social_icon facebook"></span>
							<p class="value">
								<a href="http://facebook.com/QuanticaLabs" title="Facebook" target="_blank">facebook.com/medicenter</a>
							</p>
						</li>
						<li class="clearfix">
							<span class="social_icon twitter"></span>
							<p class="value">
								<a href="http://twitter.com/QuanticaLabs" title="Twitter" target="_blank">twitter.com/medicenter</a>
							</p>
						</li>
						<li class="clearfix">
							<span class="social_icon googleplus"></span>
							<p class="value">
								<a href="http://quanticalabs.com" title="Twitter" target="_blank">google.com/medicenter</a>
							</p>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>