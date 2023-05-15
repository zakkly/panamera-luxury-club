{include file="header.tpl"}
	<div id="Content" class="pageWrap">
		<section class="castWrap wrapBlock">
			<header class="caption-header">
				<div class="header-inner">
					<img class="pc_img" src="{$smarty.const.BASE_IMAGE}cast_paget_view.jpg" alt="{$smarty.const.BASE_ALT}キャスト一覧" title="" width="1920" height="660" />
					<img class="sp_img" src="{$smarty.const.BASE_IMAGE}sp_cast_paget_view.jpg" alt="{$smarty.const.BASE_ALT}キャスト一覧" title="" width="640" height="480" />
					<h2 class="header_ttl quicksan">
						Cast List<span class="ja">キャスト一覧</span>
					</h2>
				</div>
			</header>
			<div class="pageView bgDamask">
				<div class="inner">
					<div class="textWrap">
						<p class="catch-comment" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="200">
							ごく一部の女性達の紹介です。<br>
							お店には他にもたくさんの素敵な女性達が<br>
							在籍しておりますので是非ご来店ください。
						</p>
					</div>
				</div>
			</div>
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
{include file="footer.tpl"}
