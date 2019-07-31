<?php
/**
 * Creates the submenu page for the plugin.
 *
 * @package Custom_Admin_Settings
 */

/**
 * Creates the submenu page for the plugin.
 *
 * Provides the functionality necessary for rendering the page corresponding
 * to the submenu with which this page is associated.
 *
 * @package Custom_Admin_Settings
 */
class Submenu_Page {

	/**
	 * This function renders the contents of the page associated with the Submenu
	 * that invokes the render method. In the context of this plugin, this is the
	 * Submenu class.
	 */
	public function render() {

		$content = '<h1 class="cpu-header">Category Pricing Utility</h1>';
		$content .= '<p><strong>NOTES:</strong></p>';
		$content .= '<p>Category IDs are comma separated string of category IDs. You can get category IDs <a href="/wholesale-categories/" target="_blank">Wholesale Categories</a>.</p>';
		$content .= '<p>Entered discounts must me numeric (62, 57.5) and are percent off the MSRP.</p>';
		$content .= '<p>Once this form is submitted, just let it run and update the categories. This can take minutes depending on the number of categories.</p>';
		$content .= '<div class="plvr width-50"><form id="update-categories" method="post" action="#"><div class="form-group"><label for="category_ids">Category IDs</label><textarea class="form-control" id="category_ids"></textarea></div><div class="form-group"><label for="platinum_plus_member_ws_wholesale_discount">Platinum Plus Member Discount</label> <input type="text" class="form-control" id="platinum_plus_member_ws_wholesale_discount" value="62"></div><div class="form-group"><label for="platinum_member_ws_wholesale_discount">Platinum Member Discount</label> <input type="text" class="form-control" id="platinum_member_ws_wholesale_discount" value="60"></div><div class="form-group"><label for="gold_member_ws_wholesale_discount">Gold Member Discount</label> <input type="text" class="form-control" id="gold_member_ws_wholesale_discount" value="55"></div><div class="form-group"><label for="silver_member_ws_wholesale_discount">Silver Member Discount</label> <input type="text" class="form-control" id="silver_member_ws_wholesale_discount" value="50"></div><div class="form-group"><label for="promotion_name">Category Name (e.g., Color, Pens & Markers, Canvas)</label> <input type="text" class="form-control" id="promotion_name" value=""></div> <button type="submit" class="button button-primary">UPDATE CATEGORIES</button></form></div>';


		echo $content;

		//echo 'This is the basic submenu page.';
	}
}