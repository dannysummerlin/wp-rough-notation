<?php
# Plugin Name: Rough Notation
# Plugin URI:  https://github.com/rough-stuff/rough-notation
# Description: Adds a shortcode to easily apply Rough Notation styles to elements on a page.
# Version:     20231226
# Author:      Danny Summerlin + Rough Notation team
# Author URI:  https://github.com/rough-stuff/rough-notation
# License:     GPL2
# License URI: https://www.gnu.org/licenses/gpl-2.0.html

// https://github.com/rough-stuff/rough-notation
add_action('wp_head', function () {
?>
		<script src="https://unpkg.com/rough-notation@0.5.1/lib/rough-notation.iife.js"></script>
		<style>mark.rough-notation {background:none;display:inline-block;position:relative}</style>
		<script>
addEventListener("DOMContentLoaded", (event) => {
	document.querySelectorAll('.rough-notation').forEach(e=>RoughNotation.annotate(e, {
		"type": e.dataset.type || null,
		"animate": e.dataset.animate || true,
		"animationDuration": (e.dataset.animationDuration || 800) + "ms",
		"color": e.dataset.color || 'var(--ast-global-color-0)',
		"strokeWidth": e.dataset.strokeWidth || 1,
		"padding": e.dataset.padding || 0,
		"multiline": e.dataset.multiline || true,
		"iterations": e.dataset.iterations || 1,
		"brackets": e.dataset.brackets || 'top',
	}).show())
})
		</script>
<?php
});

add_shortcode("rough", function ( $atts, $content = null) {
/*
type -
	underline: This style creates a sketchy underline below an element.
	box: This style draws a box around the element.
	circle: This style draws a circle around the element.
	highlight: This style creates a highlight effect as if marked by a highlighter.
	strike-through: This style draws horizontal lines through the element.
	crossed-off: This style draws an 'X' across the element.
	bracket: This style draws a bracket around an element, usually a paragraph of text. By default on the right side, but can be configured to any or all of left, right, top, bottom.
animate - Boolean property to turn on/off animation when annotating. Default value is true.
animationDuration - Duration of the animation in milliseconds. Default is 800ms.
color - String value representing the color of the annotation sketch. Default value is currentColor. Can be a CSS variable
strokeWidth - Width of the annotation strokes. Default value is 1.
padding - Padding between the element and roughly where the annotation is drawn. Default value is 5 (in pixels). If you wish to specify different top, left, right, bottom paddings, you can set the value to an array akin to CSS style padding [top, right, bottom, left] or just [top & bottom, left & right].
multiline - This property only applies to inline text. To annotate multiline text (each line separately), set this property to true.
iterations -By default annotations are drawn in two iterations, e.g. when underlining, drawing from left to right and then back from right to left. Setting this property can let you configure the number of iterations.
brackets - Value could be a string or an array of strings, each string being one of these values: left, right, top, bottom. When drawing a bracket, this configures which side(s) of the element to bracket. Default value is right.

*/
	$attributes = [];
	$attributes[] = $atts['type'] ? 'data-type="'.$atts['type'].'"' : '';
	$attributes[] = $atts['animate'] ? 'data-animate="'.$atts['animate'].'"' : '';
	$attributes[] = $atts['animationduration'] ? 'data-animation-duration="'.$atts['animationduration'].'"' : '';
	$attributes[] = $atts['color'] ? 'data-color="'.$atts['color'].'"' : '';
	$attributes[] = $atts['padding'] ? 'data-padding="'.$atts['padding'].'"' : '';
	$attributes[] = $atts['multiline'] ? 'data-multiline="'.$atts['multiline'].'"' : '';
	$attributes[] = $atts['iterations'] ? 'data-iterations="'.$atts['iterations'].'"' : '';
	$attributes[] = $atts['brackets'] ? 'data-brackets="'.$atts['brackets'].'"' : '';
	$attributes[] = $atts['strokewidth'] ? 'data-stroke-width="'.$atts['strokewidth'].'"' : '';

	return '<mark class="rough-notation" '.implode(' ', $attributes).'>'.$content.'</mark>';
});

?>
