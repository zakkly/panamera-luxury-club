{include file="header.tpl"}
	<div id="Content" class="pageWrap">
		<section class="accessWrap wrapBlock">
			<header class="caption-header">
				<div class="header-inner">
					<img class="pc_img" src="{$smarty.const.BASE_IMAGE}access_paget_view.jpg" alt="{$smarty.const.BASE_ALT}LaLaPaloozaへのアクセス" title="" width="1920" height="660" />
					<img class="sp_img" src="{$smarty.const.BASE_IMAGE}sp_access_paget_view.jpg" alt="{$smarty.const.BASE_ALT}LaLaPaloozaへのアクセス" title="" width="640" height="480" />
					<h2 class="header_ttl quicksan">
						Access<span class="ja">{$smarty.const.SHOP_NAME}へのアクセス</span>
					</h2>
				</div>
			</header>
			<section class="access-guide ">
				<div class="inner">
					<h3 class="h3_ttl">アクセス</h3>
					<div class="access-box Com">
						<div class="address">
							<dl class="dl_table">
								<dt>住所</dt>
								<dd>
									〒271-0091<br>
									千葉県松戸市本町20-1 新角ビル4F-A
								</dd>
							</dl>
							<dl class="dl_table">
								<dt>電話番号</dt>
								<dd><a href="tel:0477105110">047-710-5110</a></dd>
							</dl>
							<dl class="dl_table">
								<dt>電車でお越しの方</dt>
								<dd>
									JR線「松戸駅」より徒歩1分
								</dd>
							</dl>
						</div>
						<div class="map">
							<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12946.443991312211!2d139.9001368!3d35.7849308!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x2d209025ca0d4384!2z5p2-5oi477yP44Op44Op44OR44Or44O844K2!5e0!3m2!1sja!2sjp!4v1547093864583" frameborder="0" style="border:0" allowfullscreen></iframe>
						</div>
					</div>
				</div>
			</section>
			<section class="hours-guide bgDamask">
				<h3 class="h3_ttl">営業時間</h3>
				<div class="hoursInner">
					<table>
						<tr>
							<th>営業時間</th>
							<th>定休日</th>
						</tr>
						<tr>
							<td>19:00～LAST</td>
							<td>【年中無休】</td>
						</tr>
					</table>
				</div>
			</section>
			<div class="pageLinkWrap">
				<div class="inner">
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
							<a href="{$smarty.const.BASE_CAST}">
								<dl>
									<dt>
										<img class="pc_btn" src="{$smarty.const.BASE_IMAGE}btn_cast.png" alt="{$smarty.const.BASE_ALT}キャスト一覧" width="310" height="205" />
										<img class="sp_btn" src="{$smarty.const.BASE_IMAGE}sp_btn_cast.png" alt="{$smarty.const.BASE_ALT}キャスト一覧" width="620" height="200" />
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
			</div>
		</section>
	</div>
{include file="footer.tpl"}
