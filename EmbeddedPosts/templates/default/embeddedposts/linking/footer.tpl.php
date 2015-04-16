<script>
    $(document).ready(function() {
	$('div.known-embed').each(function(index) {
	    var url = $(this).attr('data-url');
	    var div = $(this);
	    var base = url.match(/(https?:\/\/[^\/]+)+/);
	    
	    
	     $.ajax({
		url: base[0] + "/oembed/?url="+url,
		dataType: "jsonp",
		success: function(data){
		    div.html(data['html']);
		}
	    });
	});
    });
</script>