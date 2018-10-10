
	$( function() {
		$( "#price" ).slider({
			range: true,
			min: 0,
			max: 1000000,
			step : 10000,
			values: [ 50000, 300000 ],
			slide: function( event, ui ) {
				$( "#amount" ).html("Từ "+ui.values[ 0 ] + "đ cho đến " + ui.values[ 1 ]+"đ" );				
				$( "#price_from" ).val(ui.values[ 0 ]);
				$( "#price_to" ).val(ui.values[ 1 ]);				
			}
		});
		//$( "#amount" ).html($( "#price" ).slider( "values", 0 )+ "đ - " + $( "#price" ).slider( "values", 1 )+"đ" );

	} );

	function ChangeToSlug(){
		var title, slug;
		title = document.getElementById("name").value;
		slug = title.toLowerCase();
		slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
		slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
		slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
		slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
		slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
		slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
		slug = slug.replace(/đ/gi, 'd');
		slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
		slug = slug.replace(/ /gi, "-");
		slug = slug.replace(/\-\-\-\-\-/gi, '-');
		slug = slug.replace(/\-\-\-\-/gi, '-');
		slug = slug.replace(/\-\-\-/gi, '-');
		slug = slug.replace(/\-\-/gi, '-');
		slug = '@' + slug + '@';
		slug = slug.replace(/\@\-|\-\@|\@/gi, '');
		document.getElementById('slug').value = slug;
	}





	 
