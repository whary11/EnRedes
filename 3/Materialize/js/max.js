/*
By http://jquery-manual.blogspot.com Copyright © 2013
*/
$.fn.limitChar = function(count, dat)
{

if (dat == undefined)
{
dat = true;
}

dat == true ? _dat = " ......" : _dat = "";

element = this;
element.each(function(){
text = $(this).text();
getText = text.substr(0, count) + _dat;
$(this).text(getText);
});
};