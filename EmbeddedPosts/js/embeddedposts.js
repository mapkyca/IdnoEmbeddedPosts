
function idnoGetPostIframe(posturl, x, y) {
    var post = "";
    post += '<iframe src="'+posturl+'?_t=embed&width='+x+'&height='+y+'" seamless style="border: 0px; overflow: hidden; width: '+x+'px; height: '+y+'px;"></iframe>';
    return post;
}
