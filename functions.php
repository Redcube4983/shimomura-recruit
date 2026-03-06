<?php
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/* テーマ側でタイトルまわりを修正 */
add_action( 'after_setup_theme', function() {
	add_theme_support( 'title-tag' );
} );


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/* 投稿内の画像を相対パスに */
function delete_domain_from_attachment_url($url)
{
  if (preg_match('/^http(s)?:\/\/[^\/\s]+(.*)$/', $url, $match)) {
    $url = $match[2];
  }
  return $url;
}
add_filter('wp_get_attachment_url', 'delete_domain_from_attachment_url');


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/* 投稿内の画像を相対パスに */
function imagepassshort($arg)
{
  $content = str_replace('"images/', '"' . get_bloginfo('template_directory') . '/images/', $arg);
  return $content;
}
add_action('the_content', 'imagepassshort');


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/* 投稿内のPDFを相対パスに */
function pdfpassshort($arg)
{
  $content = str_replace('"pdf/', '"' . get_bloginfo('template_directory') . '/pdf/', $arg);
  return $content;
}
add_action('the_content', 'pdfpassshort');


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/* 固定ページでショートコードを利用 */
function Include_my_php($params = array()) {
    extract(shortcode_atts(array(
        'file' => 'default'
    ), $params));
    ob_start();
 
    include(get_stylesheet_directory() . "/parts/$file.php");
    return ob_get_clean();
}
add_shortcode('php', 'Include_my_php');


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/* テンプレ呼び出し関数*/
function get_footerNavi() {
	get_template_part('parts/footerNavi');
}
function get_Requirements() {
	get_template_part('parts/Requirements');
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/* MW_WP_Form Pタグ消去*/
function mvwpform_autop_filter() {
  if (class_exists('MW_WP_Form_Admin')) {
    $mw_wp_form_admin = new MW_WP_Form_Admin();
    $forms = $mw_wp_form_admin->get_forms();
    foreach ($forms as $form) {
      add_filter('mwform_content_wpautop_mw-wp-form-' . $form->ID, '__return_false');
    }
  }
}
mvwpform_autop_filter();



//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/* MW_WP_Form バリデーション*/

/**
 * MW WP Form カスタムバリデーション統合版
 * $labels / $required / $requiredSelect を使用
 */
function my_custom_validation( $Validation, $data ) {
    // 1. 全項目の名称定義
    $labels = [
        'name_sei'     			=> '姓',
		'name_mei'     			=> '名',
		'kana_sei'      		=> 'セイ',
		'kana_mei'      		=> 'メイ',	
    	'select_year'			=> '年',
		'select_month'			=> '月',
		'select_day'			=> '日',
    	'address_zip'     		=> '郵便番号',
		'address_prefecture'	=> '都道府県',
		'address_city'    		=> '市区町村',
		'address_street'   		=> '番地',
		'mail'               	=> 'メールアドレス',
		'mail_local' 			=> 'メールアドレス(確認用) ローカル部',
		'mail_domain' 			=> 'メールアドレス(確認用) ドメイン部',
		'mail2'               	=> '携帯アドレス',
		'mail2_local' 			=> '携帯アドレス(確認用) ローカル部',
		'mail2_domain' 			=> '携帯アドレス(確認用) ドメイン部',
		'tel'                	=> '電話番号',
		'academic'              => '学歴',
		'license'               => '資格',
		'etc'                	=> '通知方法と希望時間など',
		'motivation'            => '応募の動機',
		'ability'               => '趣味・特技など',
    	'request'               => '本人希望記入欄',
    ];
    // 2. 「入力」を必須とする項目 (noempty)
    $required = [
		'name_sei',
		'name_mei',
		'kana_sei',
		'kana_mei',
    	'select_year',
    	'select_month',
    	'select_day',
    	'address_zip',
		'address_prefecture',
		'address_city',
    	'address_street',
		'mail',
		'mail_local',
		'mail_domain',
		'tel',
    	'academic',
    	'license',
    	'etc',
   		'motivation',
    	'ability',
    	'request',
    ];
    // 3. 「選択」を必須とする項目 (noempty / チェックボックス等)
    $requiredSelect = [

    ];

    // --- 必須バリデーションの一括適用 ---

    // 入力必須の処理
    foreach ( $required as $key ) {
		$label = $labels[$key];
		if ( $key === 'select_year' ) {
			$message = "「{$label}」は必須項目です。選択してください。";
		}else if ( $key === 'select_month' ) {
			$message = "「{$label}」は必須項目です。選択してください。";
		}else if ( $key === 'select_day' ) {
			$message = "「{$label}」は必須項目です。選択してください。";
		}else if ( $key === 'address_prefecture' ) {
			$message = "「{$label}」は必須項目です。選択してください。";
		}else {
            $message = "「{$label}」は必須項目です。入力してください。";
        }
		$Validation->set_rule( $key, 'noempty', [
			'message' => $message
		] );
    }
    // 選択必須の処理
    foreach ( $requiredSelect as $key ) {
        if ( isset($labels[$key]) ) {
            $Validation->set_rule( $key, 'required', [
                'message' => '「'.$labels[$key] . '」は必須項目です。選択してください。'
            ] );
        }
    }

    // --- 形式・一致チェックの個別適用 ---

    // 4. 電話番号判定（tel）
    $Validation->set_rule( 'tel', 'tel', [
        'message' => '「'.$labels['tel'] . '」の書式に誤りがあります。正しく入力してください。'
    ] );

    // 5. メールアドレス形式判定（標準ルールに戻す）
    $Validation->set_rule( 'mail', 'mail', [
        'message' => '「'.$labels['mail'] . '」の書式に誤りがあります。正しく入力してください。'
    ] );

    // 6. 全角カタカナ判定（kana_sei / kana_mei）
    $kana_fields = ['kana_sei', 'kana_mei'];
    foreach ( $kana_fields as $field ) {
        $Validation->set_rule( $field, 'callback', [
            'callback' => function( $value ) {
                $value = str_replace(array(" ", "　"), "", $value); // 空白を無視する場合
                if ( $value === '' ) return true; // 空の場合は noempty に任せる
                // 全角カタカナのみ（中黒「・」や長音「ー」を含む）
                return preg_match( "/^[ァ-ヶー]+$/u", $value );
            },
            'message' => '「' . $labels[$field] . '」は全角カタカナで入力してください。'
        ] );
    }

    // 7. 分割メールの一致チェック（修正済み）
    // 第2引数は 'callback' を使い、判定ロジックを直接記述します
    $input_mail  = isset($data['mail'])        ? trim($data['mail'])        : '';
    $mail_local  = isset($data['mail_local'])  ? trim($data['mail_local'])  : '';
    $mail_domain = isset($data['mail_domain']) ? trim($data['mail_domain']) : '';

    // すべて入力されている場合のみ、一致するか確認
    if ( $input_mail !== '' && $mail_local !== '' && $mail_domain !== '' ) {
        if ( $input_mail !== ($mail_local . '@' . $mail_domain) ) {
            // 一致しない場合、エラーをセットする
            // ルール名は 'eq' ではなく、独自の識別名（例: 'mail_mismatch'）にします
            $Validation->set_rule( 'mail', 'mail_mismatch', [
                'message' => '「メールアドレス」が一致しません。正しく入力してください。'
            ] );
        }
    }

	$input_mail2  = isset($data['mail2'])        ? trim($data['mail2'])        : '';
    $mail_local2  = isset($data['mail2_local'])  ? trim($data['mail2_local'])  : '';
    $mail_domain2 = isset($data['mail2_domain']) ? trim($data['mail2_domain']) : '';
	if ( $input_mail2 !== '' && $mail_local2 !== '' && $mail_domain2 !== '' ) {
        if ( $input_mail2 !== ($mail_local2 . '@' . $mail_domain2) ) {
            // 一致しない場合、エラーをセットする
            // ルール名は 'eq' ではなく、独自の識別名（例: 'mail_mismatch'）にします
            $Validation->set_rule( 'mail', 'mail_mismatch', [
                'message' => '「メールアドレス」が一致しません。正しく入力してください。'
            ] );
        }
    }

    // 【最重要】
    return $Validation;
}

    
// xxx はフォームの投稿IDに書き換えてください
add_filter( 'mwform_validation_mw-wp-form-32', 'my_custom_validation', 10, 2 );
