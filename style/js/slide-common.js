/**
 * 滑动公用 js
 * @authors Your Name (you@example.org)
 * @date    2014-08-20 15:14:28
 * @version $Id$
 */
var Slide = Object();

Slide.SlideMovie = function(obj)
{
    var l = parseInt($(this.SlideParams.l_map).css(this.SlideParams.l_path));
    // alert(this.SlideParams.l_path);
    //防止客户连续快速点击
    if(l%this.SlideParams.l_width != 0) return;
    //判断当前是否是哪一个按钮
    if(this.SlideParams.reg.test(obj.attr("class")))
    {
        if(Math.abs((this.SlideParams.l_totals - this.SlideParams.l_nums)*this.SlideParams.l_width) == Math.abs(l) || this.SlideParams.l_totals <= this.SlideParams.l_nums){
            return ;
        } 
        this.SlideParams.l_now = l - this.SlideParams.l_width;
    }else{
        if(l == 0) return;
        this.SlideParams.l_now = l + this.SlideParams.l_width;
    }
    // var path = this.SlideParams.l_path;
    if(this.SlideParams.l_path == 'top'){
        $(this.SlideParams.l_map).animate({top:this.SlideParams.l_now+'px'},'normal');
    }else if(this.SlideParams.l_path == 'left'){
        $(this.SlideParams.l_map).animate({left:this.SlideParams.l_now+'px'},'normal');
    }
}


