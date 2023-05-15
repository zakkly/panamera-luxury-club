{include file="header.tpl"}
	<div id="Content" class="pageWrap">
		<section class="errorWrap wrapBlock">
			<header class="caption-header">
				<div class="header-inner">
					<img class="pc_img" src="{$smarty.const.BASE_IMAGE}hone_paget_view.jpg" alt="{$smarty.const.BASE_ALT}500 Server Error" title="" width="1920" height="660" />
					<img class="sp_img" src="{$smarty.const.BASE_IMAGE}sp_hone_paget_view.jpg" alt="{$smarty.const.BASE_ALT}500 Server Error" title="" width="640" height="480" />
					<h2 class="header_ttl quicksan">500 Server Error</h2>
				</div>
			</header>
			<div class="pageView bgDamask">
				<div class="inner">
					<div class="textWrap">
						<p class="catch-comment" data-aos="fade-up" data-aos-delay="200">
							システムエラーが発生しています。<br />
							お手数ですが、しばらく時間を置いてから、再度お試しください。<br />
							または、メニューよりアクセスしなおしてください。
						</p>
					</div>
				</div>
			</div>
			<div class="pageLinkWrap">
				<div class="inner">
					<ul class="linkBtn">
						<li data-aos="fade-up" data-aos-delay="200">
							<a href="{$smarty.const.BASE_SYSTEM}">
								<dl>
									<dt>
										<img class="pc_btn" src="{$smarty.const.BASE_IMAGE}btn_system.png" alt="{$smarty.const.BASE_ALT}料金システム">
										<img class="sp_btn" src="{$smarty.const.BASE_IMAGE}sp_btn_system.png" alt="{$smarty.const.BASE_ALT}料金システム">
									</dt>
									<dd>
										<p class="en quicksan">Floor/Price</p>
										<p class="ja">料金システム</p>
									</dd>
								</dl>
							</a>
						</li>
						<li data-aos="fade-up" data-aos-delay="400">
							<a href="{$smarty.const.BASE_CAST}">
								<dl>
									<dt>
										<img class="pc_btn" src="{$smarty.const.BASE_IMAGE}btn_cast.png" alt="{$smarty.const.BASE_ALT}キャスト一覧">
										<img class="sp_btn" src="{$smarty.const.BASE_IMAGE}sp_btn_cast.png" alt="{$smarty.const.BASE_ALT}キャスト一覧">
									</dt>
									<dd>
										<p class="en quicksan">Cast List</p>
										<p class="ja">キャスト一覧</p>
									</dd>
								</dl>
							</a>
						</li>
						<li data-aos="fade-up" data-aos-delay="600">
							<a href="{$smarty.const.BASE_RECRUIT}">
								<dl>
									<dt>
										<img class="pc_btn" src="{$smarty.const.BASE_IMAGE}btn_recruit.png" alt="{$smarty.const.BASE_ALT}求人情報">
										<img class="sp_btn" src="{$smarty.const.BASE_IMAGE}sp_btn_recruit.png" alt="{$smarty.const.BASE_ALT}求人情報">
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
			</div>
		</section>
	</div>
{include file="footer.tpl"}
