$(function() {
	//placeholderがプラグイン側で挿入出来ない為ここで入れる
	const telPlaceholders = ['例）03', '1234', '5678'];
	const phonePlaceholders = ['例）090', '1234', '5678'];
	const zipPlaceholders = ['例）123', '4567'];
	//電話番号
	telPlaceholders.forEach((ph, i) => {
	const $el = $(`input[name="tel[data][${i}]"]`);
	if ($el.length) $el.attr('placeholder', ph);
	});
	//FAX番号
	phonePlaceholders.forEach((ph, i) => {
	const $el = $(`input[name="phone[data][${i}]"]`);
	if ($el.length) $el.attr('placeholder', ph);
	});
	//郵便番号
	zipPlaceholders.forEach((ph, i) => {
	const $el = $(`input[name="address_zip[data][${i}]"]`);
	if ($el.length) $el.attr('placeholder', ph);
	});
	
	
	$('button[name="clear"]').on('click', function(e) {
		e.preventDefault(); // 送信を防ぐ

		const $form = $(this).closest('form');
		$form[0].reset();

		//↑だけだと確認画面から戻った際に消せないので強制的に中身を消す
		$form.find('input, textarea, select').not(':button, :submit, :reset, :hidden').val('');
  		$form.find('input:checkbox, input:radio').prop('checked', false);
  		$form.find('select').prop('selectedIndex', 0);

		// フォーム内の .errorを削除
		$form.find('.error').remove();
	});

	const $year = $('#birth_year');
	const $month = $('#birth_month');
	const $day = $('#birth_day');
		// 必須セレクトが全て存在するか確認
	if ($year.length && $month.length && $day.length) {

		function updateDayOptions() {
		const year = parseInt($year.val(), 10);
		const month = parseInt($month.val(), 10);

		if (isNaN(year) || isNaN(month)) return;

			const lastDay = new Date(year, month, 0).getDate();
			const currentDay = $day.val();

			// 一旦クリアして「選択してください」をセット
			$day.empty().append('<option value="">ーー</option>');

			// 日を追加
			for (let i = 1; i <= lastDay; i++) {
				$day.append($('<option>').val(i).text(i));
			}

			// 元の選択肢がまだ有効なら復元
			if (currentDay && currentDay <= lastDay) {
				$day.val(currentDay);
			}
		}

		// 年・月が変更されたときのみ発火
		$year.on('change', updateDayOptions);
		$month.on('change', updateDayOptions);
	}
});
