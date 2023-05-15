{include file="header.tpl"}
	<div id="Content" class="pageWrap">
		<section class="systemWrap wrapBlock">
			<header class="caption-header">
				<div class="header-inner">
					<img class="pc_img" src="{$smarty.const.BASE_IMAGE}system_paget_view.jpg" alt="{$smarty.const.BASE_ALT}LaLaPaloozaの料金案内" title="" width="1920" height="660" />
					<img class="sp_img" src="{$smarty.const.BASE_IMAGE}sp_system_paget_view.jpg" alt="{$smarty.const.BASE_ALT}LaLaPaloozaの料金案内" title="" width="640" height="480" />
					<h2 class="header_ttl quicksan">
						Price<span class="ja">{$smarty.const.SHOP_NAME}の料金案内</span>
					</h2>
				</div>
			</header>
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
							<td>年中無休</td>
						</tr>
					</table>
				</div>
			</section>
			<section class="price-guide">
				<h3 class="h3_ttl quicksan">Price</h3>
				<div class="inner">
					<div class="priceList Com">
						<table class="guide_3">
							<tr>
								<th colspan="2">通常料金</th>
							</tr>
							<tr>
								<td>19:00～20:29</td>
								<td>（60分）¥3,000</td>
							</tr>
							<tr>
								<td>20:30～21:59</td>
								<td>（60分）¥4,000</td>
							</tr>
							<tr>
								<td>22:00～LAST</td>
								<td>（60分）¥6,000</td>
							</tr>
							<tr>
								<td>延長料金（30分）</td>
								<td>¥3,500</td>
							</tr>
							<tr>
								<td>延長料金（60分）</td>
								<td>¥6,000</td>
							</tr>
						</table>
						<table class="guide_3">
							<tr>
								<th colspan="2">Semi Vip</th>
							</tr>
							<tr>
								<td>19:00～20:59</td>
								<td>（60分）¥5,000</td>
							</tr>
							<tr>
								<td>21:00～LAST</td>
								<td>（60分）¥6,000</td>
							</tr>
							<tr>
								<td colspan="2">※ハウスボトルなし</td>
							</tr>
							<tr>
								<td>延長料金（30分）</td>
								<td>¥4,000</td>
							</tr>
							<tr>
								<td>延長料金（60分）</td>
								<td>¥7,000</td>
							</tr>
						</table>
						<table class="guide_3">
							<tr>
								<th colspan="2">Royal Vip</th>
							</tr>
							<tr>
								<td>ALL TIME</td>
								<td>（60分）¥6,000</td>
							</tr>
							<tr>
								<td colspan="2">※ハウスボトルなし</td>
							</tr>
							<tr>
								<td>延長料金（30分）</td>
								<td>¥4,000</td>
							</tr>
							<tr>
								<td>延長料金（60分）</td>
								<td>¥7,000</td>
							</tr>
						</table>
						<table>
							<tr>
								<th colspan="2">その他</th>
							</tr>
							<tr>
								<td>指名料</td>
								<td>¥2,000</td>
							</tr>
							<tr>
								<td>場内指名料</td>
								<td>¥2,000</td>
							</tr>
							<tr>
								<td>同伴料金</td>
								<td>120分 ¥1,8000</td>
							</tr>
							<tr>
								<td>ROOM CHARGE<br>（お一人様毎set）</td>
								<td>
									-Semi Vip- ¥2,000+TAX20％<br>
									-Royal Vip- ¥3,000+TAX20％
								</td>
							</tr>
							<tr>
								<td>税金・サービス料</td>
								<td>20％（現金のお支払いの場合10%) </td>
							</tr>
						</table>
					</div>
					<div class="priceInner">
						<div class="infoWrap">
							<p class="creditCard">
								各種カードがご利用いただけます<br>
								VISA / MasterCard / JCB / American Express / Diners Club
							</p>
							<p class="attention">
								※料金システム・ご利用可能なクレジットカードは変更となる場合がありますので、ご了承ください。
							</p>
						</div>
					</div>
				</div>
			</section>
			<div class="pageLinkWrap">
				<div class="inner">
					<ul class="linkBtn">
						<li data-aos="fade-up" data-aos-delay="200">
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
