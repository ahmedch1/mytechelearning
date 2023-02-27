<div v-show="!template" id="no-template-selected">
	<h4 class="no-template-text"><?php _e( 'No template selected.', 'ecademy-toolkit' ); ?></h4>
	<button class="button button-hero learn-press-select-template-button" @click.prevent="selectTemplate"><?php _e( 'Select Template', 'ecademy-toolkit' ); ?></button>
	<h4 class="no-template-text-2"><?php _e( 'to starts design your favorite certificate now', 'ecademy-toolkit' ); ?></h4>
</div>