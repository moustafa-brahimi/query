 jQuery(document).ready(function ($) {

 	var mediaUploader;
 
	$("#uploader").on("click", function(e) {

		e.preventDefault();
		if (mediaUploader) {

			mediaUploader.open();
			return;
		}

		mediaUploader = wp.media.frames.file_frame = wp.media({
			title : "اختر شعار",
			button : { text: "choose logo"},
			multiple : false

		});

		mediaUploader.on("select", function() {
			
			var attch = mediaUploader.state().get("selection").first().toJSON();
			$("#profile-picture").val(attch.url);
			$(".previewLogo").attr('src', attch.url);


		});

		mediaUploader.open();


	});

	var headerImage;

	$("#sd").on("click", function(e) {
		e.preventDefault();
		
		if(headerImage) {

			headerImage.open();
			return;
		}

		headerImage = wp.media.frames.file_frame = wp.media({
			title: "اختر خلفية",
			button: {text : "تحديد"},
			multiple: false

		});

		headerImage.on("select", function() {
			var attachement = headerImage.state().get("selection").first().toJSON();
			$("#fr").val(attachement.url);
			$(".headerPreview").attr('src', attachement.url);



		});

		headerImage.open();


	});



	var problemeImage;

	$("#problemSecond").on("click", function(e) {
		e.preventDefault();
		
		if(problemeImage) {

			problemeImage.open();
			return;
		}

		problemeImage = wp.media.frames.file_frame = wp.media({
			title: "اختر خلفية",
			button: {text : "تحديد"},
			multiple: false

		});

		problemeImage.on("select", function() {
			var attachement = problemeImage.state().get("selection").first().toJSON();
			$("#problemFirst").val(attachement.url);
			$(".problemPreview").attr('src', attachement.url);



		});

		problemeImage.open();


	});

	$(".removeProblemeImage").on("click", function() {

		$("#problemFirst").val("");

	});

	$(".removeHeaderImage").on("click", function() {

		$("#fr").val("");

	});

	$(".removeLogoImage").on("click", function() {

		$("#profile-picture").val("");

	});

 

 });
