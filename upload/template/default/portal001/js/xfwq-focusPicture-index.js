// JavaScript Document
//焦点图特效
 (function () {
            //焦点图
            var $fIndex = 0, picInterval = picTimer = null;
            $(".items ul li").hover(function () {
                $fIndex = $(this).index();
                clearInterval(picInterval);
                playFocus($fIndex);
            }, function () {
                clearInterval(picInterval);
                picInterval = setInterval(play, 2500);
            }).eq(0).trigger("mouseover");
            $(".details").hover(function () {
                clearInterval(picInterval);
            }, function () {
                clearInterval(picInterval);
                picInterval = setInterval(play, 2500);
            }).trigger("mouseleave");
            function playFocus(index) {
                var $thisBigPic = $(".details li img.detailImg").eq(index);
                $thisBigPic.attr("src", $thisBigPic.attr("bigPic"));
                $(".details li").eq(index).show().siblings().hide();
                $(".items li").eq(index).addClass("cur").siblings().removeClass("cur");
            }
            function play() {
                if ($fIndex <= 4)
                    $fIndex++;
                if ($fIndex > 4)
                    firstLoad = true;
                $fIndex = ($fIndex > 4) ? 0 : $fIndex;
                playFocus($fIndex);
            }
        })();