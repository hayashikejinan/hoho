(function ($) {

	/**
	 * レスポンシブメニュー
	 */

		// a タグのボタン ID を指定
	$('#responsive-menu-button').sidr({
		// a の href Default: 'sidr'
		name    : 'sidr-main',
		// 開閉速度 Default: 200
		speed   : 200,
		// 位置 Default: 'left'
		side    : 'left',
		// メニューのソース
		source  : '#navigation',
		// クラスのリネーム
		renaming: false
	});

})(jQuery);
