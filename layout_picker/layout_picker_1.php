<link rel="stylesheet" type="text/css" href="layout_picker/layout_picker.css" />
<script type="text/javascript" src="layout_picker/layout_picker.js"></script>
<div class="layout_picker">
	<div class="layout_picker_icon">
		&nbsp;
	</div>
	<div class="layout_picker_content">
		<ul>
			<li class="layout_picker_header">
				LAYOUT
			</li>
			<li>
				<a href="#" id="layout_picker_fw"<?php echo (!isset($_COOKIE['mc_layout']) || $_COOKIE['mc_layout']=="" ? ' class="selected"' : ''); ?>>
					Wide
				</a>
			</li>
			<li>
				<a href="#" id="layout_picker_bx"<?php echo ($_COOKIE['mc_layout']=="boxed" ? ' class="selected"' : ''); ?>>
					Boxed
				</a>
			</li>
		</ul>
	</div>
</div>
