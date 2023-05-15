{include file="header.tpl"}
	<div id="Content" class="pageWrap">
		<section class="profileWrap wrapBlock">
			<header class="caption-header">
				<div class="header-inner">
					<img class="pc_img" src="{$smarty.const.BASE_IMAGE}cast_paget_view.jpg" alt="{$smarty.const.BASE_ALT}キャスト一覧" title="" width="1920" height="660" />
					<img class="sp_img" src="{$smarty.const.BASE_IMAGE}sp_cast_paget_view.jpg" alt="{$smarty.const.BASE_ALT}キャスト一覧" title="" width="640" height="480" />
					<h2 class="header_ttl quicksan">
						Cast Profile<span class="ja">キャスト紹介 {$cast[0].cast_name_kana} - {$cast[0].cast_name} -</span>
					</h2>
				</div>
			</header>
			<div class="castGallery">
				<div class="inner Com">
					<div class="big swipeTarget" data-swipe="0">
						<img src="{$smarty.const.BASE_ADMIN_CAST_IMAGE}{$cast[0].cast_img1}" alt="キャストメイン画像" width="800" height="1200" />
					</div>
					<div class="listWrap Com">
						<ul>
							<li oncontextmenu="return false;" class="swipeTarget" data-swipe="0" data-aos="fade-up" data-aos-delay="400">
								<img src="{$smarty.const.BASE_ADMIN_CAST_IMAGE}{$cast[0].cast_img1}" alt="キャスト画像1" width="800" height="1200" />
							</li>
							<li oncontextmenu="return false;" class="swipeTarget" data-swipe="1" data-aos="fade-up" data-aos-delay="600">
								<img src="{$smarty.const.BASE_ADMIN_CAST_IMAGE}{$cast[0].cast_img2}" alt="キャスト画像2" width="800" height="1200" />
							</li>
							<li oncontextmenu="return false;" class="swipeTarget" data-swipe="2" data-aos="fade-up" data-aos-delay="800">
								<img src="{$smarty.const.BASE_ADMIN_CAST_IMAGE}{$cast[0].cast_img3}" alt="キャスト画像3" width="800" height="1200" />
							</li>
							<li oncontextmenu="return false;" class="swipeTarget" data-swipe="3" data-aos="fade-up" data-aos-delay="1000">
								<img src="{$smarty.const.BASE_ADMIN_CAST_IMAGE}{$cast[0].cast_img4}" alt="キャスト画像4" width="800" height="1200" />
							</li>
							<li oncontextmenu="return false;" class="swipeTarget" data-swipe="4" data-aos="fade-up" data-aos-delay="1200">
								<img src="{$smarty.const.BASE_ADMIN_CAST_IMAGE}{$cast[0].cast_img5}" alt="キャスト画像5" width="800" height="1200" />
							</li>
							<li oncontextmenu="return false;" class="swipeTarget" data-swipe="5" data-aos="fade-up" data-aos-delay="1400">
								<img src="{$smarty.const.BASE_ADMIN_CAST_IMAGE}{$cast[0].cast_img6}" alt="キャスト画像6" width="800" height="1200" />
							</li>
							<li oncontextmenu="return false;" class="swipeTarget" data-swipe="6" data-aos="fade-up" data-aos-delay="1600">
								<img src="{$smarty.const.BASE_ADMIN_CAST_IMAGE}{$cast[0].cast_img7}" alt="キャスト画像7" width="800" height="1200" />
							</li>
							<li oncontextmenu="return false;" class="swipeTarget" data-swipe="7" data-aos="fade-up" data-aos-delay="1800">
								<img src="{$smarty.const.BASE_ADMIN_CAST_IMAGE}{$cast[0].cast_img8}" alt="キャスト画像8" width="800" height="1200" />
							</li>
							<li oncontextmenu="return false;" class="swipeTarget" data-swipe="8" data-aos="fade-up" data-aos-delay="2000">
								<img src="{$smarty.const.BASE_ADMIN_CAST_IMAGE}{$cast[0].cast_img9}" alt="キャスト画像9" v>
							</li>
						</ul>
					</div>
					<div class="swipeGallery" style="display: none;">
						{if $cast[0].cast_img1 !== 'default.jpg'}
						<figure>
							<a class="swipe0" href="{$smarty.const.BASE_ADMIN_CAST_IMAGE}{$cast[0].cast_img1}" data-size="600x898">
								<img src="{$smarty.const.BASE_ADMIN_CAST_IMAGE}{$cast[0].cast_img1}" alt="キャスト画像1" width="800" height="1200" />
							</a>
						</figure>
						{/if}
						{if $cast[0].cast_img2 !== 'default.jpg'}
						<figure>
							<a class="swipe1" href="{$smarty.const.BASE_ADMIN_CAST_IMAGE}{$cast[0].cast_img2}" data-size="600x898">
								<img src="{$smarty.const.BASE_ADMIN_CAST_IMAGE}{$cast[0].cast_img2}" alt="キャスト画像2" width="800" height="1200" />
							</a>
						</figure>
						{/if}
						{if $cast[0].cast_img3 !== 'default.jpg'}
						<figure>
							<a class="swipe2" href="{$smarty.const.BASE_ADMIN_CAST_IMAGE}{$cast[0].cast_img3}" data-size="600x898">
								<img src="{$smarty.const.BASE_ADMIN_CAST_IMAGE}{$cast[0].cast_img3}" alt="キャスト画像3" width="800" height="1200" />
							</a>
						</figure>
						{/if}
						{if $cast[0].cast_img4 !== 'default.jpg'}
						<figure>
							<a class="swipe3" href="{$smarty.const.BASE_ADMIN_CAST_IMAGE}{$cast[0].cast_img4}" data-size="600x898">
								<img src="{$smarty.const.BASE_ADMIN_CAST_IMAGE}{$cast[0].cast_img4}" alt="キャスト画像4" width="800" height="1200" />
							</a>
						</figure>
						{/if}
						{if $cast[0].cast_img5 !== 'default.jpg'}
						<figure>
							<a class="swipe4" href="{$smarty.const.BASE_ADMIN_CAST_IMAGE}{$cast[0].cast_img5}" data-size="600x898">
								<img src="{$smarty.const.BASE_ADMIN_CAST_IMAGE}{$cast[0].cast_img5}" alt="キャスト画像5" width="800" height="1200" />
							</a>
						</figure>
						{/if}
						{if $cast[0].cast_img6 !== 'default.jpg'}
						<figure>
							<a class="swipe5" href="{$smarty.const.BASE_ADMIN_CAST_IMAGE}{$cast[0].cast_img6}" data-size="600x898">
								<img src="{$smarty.const.BASE_ADMIN_CAST_IMAGE}{$cast[0].cast_img6}" alt="キャスト画像6" width="800" height="1200" />
							</a>
						</figure>
						{/if}
						{if $cast[0].cast_img7 !== 'default.jpg'}
						<figure>
							<a class="swipe6" href="{$smarty.const.BASE_ADMIN_CAST_IMAGE}{$cast[0].cast_img7}" data-size="600x898">
								<img src="{$smarty.const.BASE_ADMIN_CAST_IMAGE}{$cast[0].cast_img7}" alt="キャスト画像7" width="800" height="1200" />
							</a>
						</figure>
						{/if}
						{if $cast[0].cast_img8 !== 'default.jpg'}
						<figure>
							<a class="swipe7" href="{$smarty.const.BASE_ADMIN_CAST_IMAGE}{$cast[0].cast_img8}" data-size="600x898">
								<img src="{$smarty.const.BASE_ADMIN_CAST_IMAGE}{$cast[0].cast_img8}" alt="キャスト画像8" width="800" height="1200" />
							</a>
						</figure>
						{/if}
						{if $cast[0].cast_img9 !== 'default.jpg'}
						<figure>
							<a class="swipe8" href="{$smarty.const.BASE_ADMIN_CAST_IMAGE}{$cast[0].cast_img9}" data-size="600x898">
								<img src="{$smarty.const.BASE_ADMIN_CAST_IMAGE}{$cast[0].cast_img9}" alt="キャスト画像9" width="800" height="1200" />
							</a>
						</figure>
						{/if}
					</div>
				</div>
			</div>
			<div class="profileDetail bgDamask">
				<h3 class="h3_ttl">{$cast[0].cast_name_kana} PROFILE<span class="rubiName">{$cast[0].cast_name} プロフィール</span></h3>
				<div class="inner Com">
					<div class="detail left">
						<dl class="dl_table">
							<dt>身長</dt>
							<dd>{$cast[0].cast_tall}cm</dd>
						</dl>
						<dl class="dl_table">
							<dt>星座</dt>
							<dd>{$cast[0].cName}</dd>
						</dl>
						<dl class="dl_table">
							<dt>出身</dt>
							<dd>{$cast[0].cast_birthplace}</dd>
						</dl>
					</div>
					<div class="detail right">
						<dl class="dl_table">
							<dt>血液型</dt>
							<dd>{$cast[0].bName}型</dd>
						</dl>
						<dl class="dl_table">
							<dt>趣味</dt>
							<dd>{$cast[0].cast_hobby}</dd>
						</dl>
						<dl class="dl_table">
							<dt>好きな食べ物</dt>
							<dd>{$cast[0].cast_favorite}</dd>
						</dl>
					</div>
				</div>
			</div>
		</section>
		<section class="castWrap wrapBlock">
			<header class="page-header">
				<h2 class="header_ttl quicksan">
					Cast List<span class="ja">キャスト一覧</span>
				</h2>
			</header>
			<div class="inner">
				<div class="castListWrap">
					<div class="castList Com">
						{assign var=x value=0}
						{foreach from=$castlist item=val}
						{assign var=x value=$x+200}
						<article data-aos="fade-up" data-aos-delay="{$x}">
							<dl>
								<a class="link" href="{$smarty.const.BASE_REWRITE_PROFILE}{$val.cast_name_rome}/">
									<dt><img src="{$smarty.const.BASE_ADMIN_CAST_IMAGE}{$val.cast_thumbnail}" alt="{$smarty.const.BASE_ALT}【{$val.cast_name}】の写真" width="320" height="480" /></dt>
									<dd>
										<h3>{$val.cast_name_kana}<span>{$val.cast_name}</span></h3>
									</dd>
								</a>
							</dl>
						</article>
						{/foreach}
					</div>
				</div>
			</div>
		</section>
	</div>
<!-- ★ PhotoSwipe ★ -->
<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="pswp__bg"></div>
	<div class="pswp__scroll-wrap">
		<div class="pswp__container">
			<div class="pswp__item"></div>
			<div class="pswp__item"></div>
			<div class="pswp__item"></div>
		</div>
		<div class="pswp__ui pswp__ui--hidden">
			<div class="pswp__top-bar">
				<div class="pswp__counter"></div>
				<button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
				<button class="pswp__button pswp__button--share" title="Share"></button>
				<button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
				<button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
				<div class="pswp__preloader">
					<div class="pswp__preloader__icn">
						<div class="pswp__preloader__cut">
							<div class="pswp__preloader__donut"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
				<div class="pswp__share-tooltip"></div> 
			</div>
			<button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
			<button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
			<div class="pswp__caption">
				<div class="pswp__caption__center"></div>
			</div>
		</div>
	</div>
</div>
{include file="footer.tpl"}
