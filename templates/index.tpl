{include file="header.tpl"}
	<!-- 起動画面 -->
	<section class="loading">
		<div class="loading__img">
			<img style="display:none;" class="logo logo_white" src="{$smarty.const.BASE_IMAGE}logo.png" alt="{$smarty.const.BASE_ALT}" width="360" height="360" />
		</div>
	</section>
	<div id="Content" class="indexWrap">
		<section class="firstView">
			<img class="pc_img" src="{$smarty.const.BASE_IMAGE}hone_first_view.jpg" alt="{$smarty.const.BASE_ALT}" title="" width="1920" height="660" />
			<img class="sp_img" src="{$smarty.const.BASE_IMAGE}sp_hone_first_view.jpg" alt="{$smarty.const.BASE_ALT}" title="" width="640" height="480" />
			<div class="textWrap">
				<h2 class="ttl">
					<span class="ja quicksan">{$smarty.const.SHOP_NAME}</span>
					<span class="en quicksan">{$smarty.const.SHOP_NAME_JP}</span>
					松戸エリア最高級のハイクラスで上質な空間
				</h2>
			</div>
		</section>
		<section class="conceptWrap wrapBlock bgDamask">
			<div class="inner">
				<header class="page-header">
					<h2 class="header_ttl quicksan">
						Concept<span class="ja">LaLaPaloozaとは</span>
					</h2>
				</header>
				<div class="textWrap">
					<p class="comment">
						六本木・銀座・西麻布…都内の一等地に負けない、ハイクラスな店舗を再現<br>
						最高級のキャストやサービス、3フロア完備のVIPルームはここでしか味わえない上質な一時を演出。<br><br>
						日常のストレスを忘れ、価値のある上質なお時間をお過ごしになれますよ。
					</p>
				</div>
			</div>
		</section>
		<section class="wrapBlock">
			<div class="pageLinkWrap">
				<ul class="linkBtn">
					<li data-aos="fade-up" data-aos-delay="200">
						<a href="{$smarty.const.BASE_SYSTEM}">
							<dl>
								<dt>
									<img class="pc_btn" src="{$smarty.const.BASE_IMAGE}btn_system.png" alt="{$smarty.const.BASE_ALT}料金システム" width="310" height="205" />
									<img class="sp_btn" src="{$smarty.const.BASE_IMAGE}sp_btn_system.png" alt="{$smarty.const.BASE_ALT}料金システム" width="620" height="200" />
								</dt>
								<dd>
									<p class="en quicksan">Floor/Price</p>
									<p class="ja">料金システム</p>
								</dd>
							</dl>
						</a>
					</li>
					<li data-aos="fade-up" data-aos-delay="400">
						<a href="{$smarty.const.BASE_ACCESS}">
							<dl>
								<dt>
									<img class="pc_btn" src="{$smarty.const.BASE_IMAGE}btn_access.png" alt="{$smarty.const.BASE_ALT}アクセス" width="310" height="205" />
									<img class="sp_btn" src="{$smarty.const.BASE_IMAGE}sp_btn_access.png" alt="{$smarty.const.BASE_ALT}アクセス" width="620" height="200" />
								</dt>
								<dd>
									<p class="en quicksan">Access</p>
									<p class="ja">アクセス</p>
								</dd>
							</dl>
						</a>
					</li>
					<li data-aos="fade-up" data-aos-delay="600">
						<a href="{$smarty.const.BASE_RECRUIT}">
							<dl>
								<dt>
									<img class="pc_btn" src="{$smarty.const.BASE_IMAGE}btn_recruit.png" alt="{$smarty.const.BASE_ALT}求人情報" width="310" height="205" />
									<img class="sp_btn" src="{$smarty.const.BASE_IMAGE}sp_btn_recruit.png" alt="{$smarty.const.BASE_ALT}求人情報" width="620" height="200" />
								</dt>
								<dd>
									<p class="en quicksan">Recruit</p>
									<p class="ja">求人情報</p>
								</dd>
							</dl>
						</a>
					</li>
				</ul>
			</div>
		</section>
		<section class="newsWrap wrapBlock bgDamask">
			<div class="inner">
				<header class="page-header">
					<h2 class="header_ttl quicksan">
						News<span class="ja">お知らせ</span>
					</h2>
				</header>
				<div class="newsList">
					{assign var=x value=0}
					{foreach from=$news item=val}
					{assign var=x value=$x+200}
					<article data-aos="fade-up" data-aos-delay="{$x}">
						<a href="{$smarty.const.BASE_NEWS_DISP}{$val.id}/">
							<dl>
								<dt class="postInfo">
									<span class="postCat" style="color: {$val.news_category_color|default:""};border: 1px solid {$val.news_category_color|default:""};">{$val.news_category_name|default:""}</span>
									<span class="postDate">{$val.news_create_date|date_format:"%Y.%m.%d"}</span>
								</dt>
								<dd><p class="postTit">{$val.news_title|truncate:60|default:""}</p></dd>
							</dl>
						</a>
					</article>
					{/foreach}
				</div>
				<div class="btnWrap">
					<a class="lookBtn" href="{$smarty.const.BASE_NEWS}">
						<span class="text quicksan">
							News List
							<span class="ja">
								ニュース一覧を見る
							</span>
						</span>
					</a>
				</div>
			</div>
		</section>
		<section class="castWrap wrapBlock">
			<div class="inner">
				<header class="page-header">
					<h2 class="header_ttl quicksan">
						Cast List<span class="ja">キャスト一覧</span>
					</h2>
				</header>
				<div class="textWrap">
					<p class="comment" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="200">
						ごく一部の女性達の紹介です。<br>
						お店には他にもたくさんの素敵な女性達が<br>
						在籍しておりますので是非ご来店ください。
					</p>
				</div>
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
