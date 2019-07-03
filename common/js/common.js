/* ============================================================
 * jQuery Easing v1.3 - http://gsgd.co.uk/sandbox/jquery/easing/
 *
 * Open source under the BSD License.
 *
 * Copyright © 2008 George McGinley Smith
 * All rights reserved.
 * https://raw.github.com/danro/jquery-easing/master/LICENSE
 * ======================================================== */
jQuery.easing.jswing=jQuery.easing.swing,jQuery.extend(jQuery.easing,{def:"easeOutQuad",swing:function(a,b,c,d,e){return jQuery.easing[jQuery.easing.def](a,b,c,d,e)},easeInQuad:function(a,b,c,d,e){return d*(b/=e)*b+c},easeOutQuad:function(a,b,c,d,e){return-d*(b/=e)*(b-2)+c},easeInOutQuad:function(a,b,c,d,e){return(b/=e/2)<1?d/2*b*b+c:-d/2*(--b*(b-2)-1)+c},easeInCubic:function(a,b,c,d,e){return d*(b/=e)*b*b+c},easeOutCubic:function(a,b,c,d,e){return d*((b=b/e-1)*b*b+1)+c},easeInOutCubic:function(a,b,c,d,e){return(b/=e/2)<1?d/2*b*b*b+c:d/2*((b-=2)*b*b+2)+c},easeInQuart:function(a,b,c,d,e){return d*(b/=e)*b*b*b+c},easeOutQuart:function(a,b,c,d,e){return-d*((b=b/e-1)*b*b*b-1)+c},easeInOutQuart:function(a,b,c,d,e){return(b/=e/2)<1?d/2*b*b*b*b+c:-d/2*((b-=2)*b*b*b-2)+c},easeInQuint:function(a,b,c,d,e){return d*(b/=e)*b*b*b*b+c},easeOutQuint:function(a,b,c,d,e){return d*((b=b/e-1)*b*b*b*b+1)+c},easeInOutQuint:function(a,b,c,d,e){return(b/=e/2)<1?d/2*b*b*b*b*b+c:d/2*((b-=2)*b*b*b*b+2)+c},easeInSine:function(a,b,c,d,e){return-d*Math.cos(b/e*(Math.PI/2))+d+c},easeOutSine:function(a,b,c,d,e){return d*Math.sin(b/e*(Math.PI/2))+c},easeInOutSine:function(a,b,c,d,e){return-d/2*(Math.cos(Math.PI*b/e)-1)+c},easeInExpo:function(a,b,c,d,e){return b==0?c:d*Math.pow(2,10*(b/e-1))+c},easeOutExpo:function(a,b,c,d,e){return b==e?c+d:d*(-Math.pow(2,-10*b/e)+1)+c},easeInOutExpo:function(a,b,c,d,e){return b==0?c:b==e?c+d:(b/=e/2)<1?d/2*Math.pow(2,10*(b-1))+c:d/2*(-Math.pow(2,-10*--b)+2)+c},easeInCirc:function(a,b,c,d,e){return-d*(Math.sqrt(1-(b/=e)*b)-1)+c},easeOutCirc:function(a,b,c,d,e){return d*Math.sqrt(1-(b=b/e-1)*b)+c},easeInOutCirc:function(a,b,c,d,e){return(b/=e/2)<1?-d/2*(Math.sqrt(1-b*b)-1)+c:d/2*(Math.sqrt(1-(b-=2)*b)+1)+c},easeInElastic:function(a,b,c,d,e){var f=1.70158,g=0,h=d;if(b==0)return c;if((b/=e)==1)return c+d;g||(g=e*.3);if(h<Math.abs(d)){h=d;var f=g/4}else var f=g/(2*Math.PI)*Math.asin(d/h);return-(h*Math.pow(2,10*(b-=1))*Math.sin((b*e-f)*2*Math.PI/g))+c},easeOutElastic:function(a,b,c,d,e){var f=1.70158,g=0,h=d;if(b==0)return c;if((b/=e)==1)return c+d;g||(g=e*.3);if(h<Math.abs(d)){h=d;var f=g/4}else var f=g/(2*Math.PI)*Math.asin(d/h);return h*Math.pow(2,-10*b)*Math.sin((b*e-f)*2*Math.PI/g)+d+c},easeInOutElastic:function(a,b,c,d,e){var f=1.70158,g=0,h=d;if(b==0)return c;if((b/=e/2)==2)return c+d;g||(g=e*.3*1.5);if(h<Math.abs(d)){h=d;var f=g/4}else var f=g/(2*Math.PI)*Math.asin(d/h);return b<1?-0.5*h*Math.pow(2,10*(b-=1))*Math.sin((b*e-f)*2*Math.PI/g)+c:h*Math.pow(2,-10*(b-=1))*Math.sin((b*e-f)*2*Math.PI/g)*.5+d+c},easeInBack:function(a,b,c,d,e,f){return f==undefined&&(f=1.70158),d*(b/=e)*b*((f+1)*b-f)+c},easeOutBack:function(a,b,c,d,e,f){return f==undefined&&(f=1.70158),d*((b=b/e-1)*b*((f+1)*b+f)+1)+c},easeInOutBack:function(a,b,c,d,e,f){return f==undefined&&(f=1.70158),(b/=e/2)<1?d/2*b*b*(((f*=1.525)+1)*b-f)+c:d/2*((b-=2)*b*(((f*=1.525)+1)*b+f)+2)+c},easeInBounce:function(a,b,c,d,e){return d-jQuery.easing.easeOutBounce(a,e-b,0,d,e)+c},easeOutBounce:function(a,b,c,d,e){return(b/=e)<1/2.75?d*7.5625*b*b+c:b<2/2.75?d*(7.5625*(b-=1.5/2.75)*b+.75)+c:b<2.5/2.75?d*(7.5625*(b-=2.25/2.75)*b+.9375)+c:d*(7.5625*(b-=2.625/2.75)*b+.984375)+c},easeInOutBounce:function(a,b,c,d,e){return b<e/2?jQuery.easing.easeInBounce(a,b*2,0,d,e)*.5+c:jQuery.easing.easeOutBounce(a,b*2-e,0,d,e)*.5+d*.5+c}});

/*
 * Flatten height same as the highest element for each row.
 *
 * Copyright (c) 2011 Hayato Takenaka
 * Dual licensed under the MIT and GPL licenses:
 * http://www.opensource.org/licenses/mit-license.php
 * http://www.gnu.org/licenses/gpl.html
 * @author: Hayato Takenaka (http://urin.take-uma.net)
 * @version: 0.0.2
**/
!function(t){t.fn.tile=function(e){var h,i,n,r,o,u=this.length-1;return e||(e=this.length),this.each(function(){o=this.style,o.removeProperty&&o.removeProperty("height"),o.removeAttribute&&o.removeAttribute("height")}),this.each(function(o){n=o%e,0==n&&(h=[]),h[n]=t(this),r=h[n].height(),(0==n||r>i)&&(i=r),(o==u||n==e-1)&&t.each(h,function(){this.height(i)})})}}(jQuery);

/********************************************

	Unionnet commons functions 
	@共通スクリプトは以下に記載。
	@グローバル変数は仕様せず、下部に関数を定義し、できるだけローカル変数を扱う。
	@実行箇所は最上部に記述のこと。

********************************************/

;(function($){
  $(function() {
	/*************	 trigger functions  ******************/
		/** インプットにフォーカスした際ボックスシャドウをかける **/
		scripts.input_focus();
		/** .hoverの要素に乗ったら.85に透過 **/
		scripts.hover_opacity();
		/** accordion 
		@第一引数の要素のdt をクリックしたら次のddを開閉する。
		@第二引数がtrueなら読み込み時一つ目が開いた状態。
		@第三引数がtrueの場合クリックしたら開いている要素が閉じる。 **/		
		scripts.accordion($("#faq"),true,true);

		/**   スクロールすると出てくる「ページトップへ」ボタン**/
		scripts.pagetop();

		/**   ロールオーバー**/
		scripts.rollover($('img.btn'));

		/**   スムーススクロール **/
		scripts.smoothscroll();

		scripts.worksHover();

		$(".fancybox").fancybox();

		$(".modal--inline").fancybox({
			type : 'iframe',
			padding   : 2,
			maxWidth	: 960,
			maxHeight	: 800,
			fitToView	: false,
			width		: '95%',
			height		: '95%',
			autoSize	: false,
			closeClick	: false,
			openEffect	: 'none',
			closeEffect	: 'none'
		});

		scripts.height($('.loading'));

	$(window).on('load resize',function(){
		/** window load resize trigger functions  **/

		scripts.loading();
		
		scripts.height($('.mainImg'));
		
		// scripts.headAnim();
		/*************************/

	});// end window load resize function
	
	
	$(window).scroll(function(){
		
		/** window scroll trigger functions  **/
		scripts.pallarax();
		});// end window scroll function

	
  }); // end ready function
 
		
  /****************** end trigger functions  ********************/ 
 
  /*************	functions declaration  ******************/ 
  
  var scripts ={
  	accordion: function(self,first,toggle){
  		if(first){
				self.find('dt:first').addClass('accord_activ');
			}
			self.find('dd').hide();self.find('dt.accord_activ').next().show();
			self.find('dt').not('.accord_activ').css("cursor","pointer");
			$('.accord_activ').css("cursor","default");
			self.find('dt').click(function(){
				
			if(!$(this).hasClass('accord_activ'))	{
				
				if(toggle){
									   
					$(this).parents().find('.accord_activ').removeClass('accord_activ').next('dd').slideUp(200,'easeOutQuad');				   
				}
				$(this).addClass('accord_activ');
				$(this).next('dd').slideDown(200,'easeInQuad');
				self.find('dt').not('.accord_activ').css("cursor","pointer");
				$('.accord_activ').css("cursor","default");
				
				}//end if
			});//end click function
  	},
  	hover_opacity: function(){
  		$('.hover').on({
				'mouseenter':function(){
				
				$(this).stop(true,true).fadeTo(200,.75);
				
			  },//end mouseenter func
			  'mouseleave':function(){
				
				$(this).stop(true,true).fadeTo(200,1);
					
				}//end mouseleave func
			});
  	},
  	tile_heights:function(){
			for( i =1; i<10 ; i++ ){
				$('.height'+i).tile(i);
			}
  	},
  	input_focus:function(){
  		var targetInput = ':text, :password, textarea ,select';
        
			$(targetInput).addClass('jInput')
			
			.focus(function(){									   
        $(this).addClass('jFocus');
 		  })	//end focus function		
			.blur(function(){
	               
				if ($(this).find('.jFocus')) {
	               
				  $(this).removeClass('jFocus');
	               
				}//end if
	    });	//end bulr function		
  	},
  	pagetop:function(){
		
			var topBtn = $('#pagetop');    
	    topBtn.hide();
	    //スクロールが100に達したらボタン表示
	    $(window).scroll(function () {
	        if ($(this).scrollTop() > 100) {
	            topBtn.fadeIn();
	        } else {
	            topBtn.fadeOut();
	        }
	    });
	    //スクロールしてトップ
	    topBtn.click(function () {
	        $('body,html').animate({
	            scrollTop: 0
	        }, 500);
	        return false;
	    });
  	},
  	rollover:function(elm){
  		var trg = elm;
			trg.on({
				mouseenter:function(){
					var ext = $(this).attr('src').slice(-4);
					var a = [".gif", ".jpg", ".png"];
					var src = $(this).attr('src');
					for(var i=0, len=a.length; i<len; i++){ 
						if(a[i] == ext){
							str = src.replace(a[i], "_on");
							onSrc = str+=ext;
							$(this).attr('src',onSrc);
							continue;
						}
					}					
				},
				mouseleave:function(){
					var src = $(this).attr('src');
					str = src.replace("_on", "");
					$(this).attr('src',str);
				}
			});
  	},
  	smoothscroll:function(){
  		$('a[href^=#]').on('click',function(){
				var speed = 400;
				var href= $(this).attr("href");
				var target = $(href == "#" || href == "" ? 'html' : href);
				var position = target.offset().top;
				$('body,html').animate({scrollTop:position}, speed, 'swing');
				return false;
			});
  	},
  	height:function(elm){
  		var h = $(window).height();
  		elm.css('height',h);
  	},
  	worksHover:function(){
  		$('.worksArea').find('li').on({
  			mouseenter:function(){
  				$(this).find('span').addClass('active');
  			},
  			mouseleave:function(){
  				$(this).find('span').removeClass('active');
  			}
  		});
  	},
  	pallarax:function(){
		
			var scrT = $(window).scrollTop(); 
			var winH = $(window).height();
			$('.animation').each(function(){
				var off = $(this).offset();
				var q = parseInt(winH * 0.8); 
				if(scrT + (q)  > off.top){
				for(i = 0; i < $(this).find('.animationElm').length; i++ ){
					var self = $(this).find('.animationElm').eq(i);	
						scripts.anim(self,i);
					}
				}
			});
		},
		//アニメーション
		anim:function(self,i){
			var delay = (self.data('delay')) ? parseInt(self.data('delay')): 1000;
			var easing = (self.data('ease')) ? self.data('ease') :'easing';
			
			self.delay(delay+i).queue(function(next) {
				self.addClass(easing).addClass('active');
				next();
			});
		},
		headAnim:function(){
			$('.logo').find('h1').delay(900).queue(function(){
				$(this).addClass('active');
			});
			$('.logo').find('h2').delay(1200).queue(function(){
				$(this).addClass('active');
			});
			$('.navi').delay(1500).queue(function(){
				$(this).addClass('active');
			});
		},
		loading:function(){
			$('.loading').delay(1300).fadeOut('slow', function() {
				$('#page').removeClass('hide');
		    scripts.headAnim();
		  });
		}
  }	

  /************* end functions declaration  ******************/		
			
})(jQuery);