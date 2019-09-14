			<div id="fh5co-footer">
				<div class="row">
					<div class="col-md-6">
						<?php
						if(is_active_sidebar("footer-left")){
							dynamic_sidebar("footer-left");
						}
						?>
					</div>
					<div class="col-md-6 fh5co-copyright">
						<?php
						if(is_active_sidebar("footer-right")){
							dynamic_sidebar("footer-right");
						}
						?>
					</div>
				</div>
			</div>		
		</div>
		<?php wp_footer(); ?>
	</body>
</html>
