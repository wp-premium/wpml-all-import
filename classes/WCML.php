<?php


namespace WPML\AI;

/**
 * Class WCML
 * @package WPML\AI
 *
 * WCML related actions.
 */
class WCML {

	/**
	 * Things to do before single post is going to be imported.
	 */
	public function beforePostImport() {
		$this->pauseSyncHooks();
	}

	/**
	 * Things to do after single post has been imported.
	 */
	public function afterPostImport() {
		$this->resumeSyncHooks();
	}

	/**
	 * Do not delete post metas from transnalted products.
	 */
	private function pauseSyncHooks() {
		$WCMLSynchronizeProductData = $this->getWCMLSynchronizeProductData();

		if ( false !== $WCMLSynchronizeProductData ) {
			remove_action( 'deleted_post_meta', [ $WCMLSynchronizeProductData, 'delete_empty_post_meta_for_translations' ], 10, 3 );
		}
	}

	/**
	 * Resume deleting post metas from translated products.
	 */
	private function resumeSyncHooks() {
		$WCMLSynchronizeProductData = $this->getWCMLSynchronizeProductData();

		if ( false !== $WCMLSynchronizeProductData ) {
			add_action( 'deleted_post_meta', [ $this->getWCMLSynchronizeProductData(), 'delete_empty_post_meta_for_translations' ], 10, 3 );
		}

	}

	/**
	 * Return WCML_Synchronize_Product_Data object or false if WCML is not active.
	 *
	 * @return false|\WCML_Synchronize_Product_Data
	 */
	private function getWCMLSynchronizeProductData() {
		global $woocommerce_wpml;

		if ( is_object( $woocommerce_wpml )
		     && class_exists( 'WCML_Synchronize_Product_Data' )
		     && is_a( $woocommerce_wpml->sync_product_data, 'WCML_Synchronize_Product_Data' )
		) {
			return $woocommerce_wpml->sync_product_data;
		}

		return false;
	}

}