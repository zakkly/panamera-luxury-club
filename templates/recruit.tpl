{include file="header.tpl"}
	<div id="Content" class="pageWrap">
		<section class="recruitWrap wrapBlock">
			<header class="caption-header">
				<div class="header-inner">
					<img class="pc_img" src="{$smarty.const.BASE_IMAGE}recruit_paget_view.jpg" alt="{$smarty.const.BASE_ALT}求人情報" title="" width="1920" height="660" />
					<img class="sp_img" src="{$smarty.const.BASE_IMAGE}sp_recruit_paget_view.jpg" alt="{$smarty.const.BASE_ALT}求人情報" title="" width="640" height="480" />
					<h2 class="header_ttl quicksan">
						Recruit<span class="ja">求人情報</span>
					</h2>
				</div>
			</header>
			<div class="pageView bgDamask">
				<div class="inner">
					<div class="textWrap">
						<p class="catch-comment" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="200">{$recruit[0].recruit_comment|default:""}</p>
					</div>
				</div>
			</div>
			<div class="pageLink">
				<div class="inner">
					<div class="LinkWrap">
						<ul>
							<li data-aos="fade-up" data-aos-delay="200">
								<dl>
									<dt><span class="ja">キャスト</span>Cast</dt>
									<dd><a href="#CastInfo">詳細情報</a></dd>
								</dl>
							</li>
							<li data-aos="fade-up" data-aos-delay="400">
								<dl>
									<dt><span class="ja">社員</span>Staff</dt>
									<dd><a href="#StaffInfo">詳細情報</a></dd>
								</dl>
							</li>
							<li data-aos="fade-up" data-aos-delay="600">
								<dl>
									<dt><span class="ja">ドライバー</span>Driver</dt>
									<dd><a href="#DriverInfo">詳細情報</a></dd>
								</dl>
							</li>
							<li data-aos="fade-up" data-aos-delay="800">
								<dl>
									<dt><span class="ja">ヘアメイク</span>HairMake</dt>
									<dd><a href="#MakeupInfo">詳細情報</a></dd>
								</dl>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="inner">
				<div id="CastInfo" class="recruitInfoWrap">
					<h3>Cast<span class="ja">【キャスト】</span></h3>
					<table class="tbl-r01">
						<tr>
							<th>仕事内容</th>
							<td>{$recruit[0].cast_description|nl2br|default:""}</td>
						</tr>
						<tr>
							<th>資格</th>
							<td>{$recruit[0].cast_capacity|nl2br|default:""}</td>
						</tr>
						<tr>
							<th>時間</th>
							<td>{$recruit[0].cast_time|nl2br|default:""}</td>
						</tr>
						<tr>
							<th>定休日</th>
							<td>{$recruit[0].cast_holiday|nl2br|default:""}</td>
						</tr>
						<tr>
							<th>時給</th>
							<td>{$recruit[0].cast_salary|nl2br|default:""}</td>
						</tr>
						<tr>
							<th>待遇</th>
							<td>{$recruit[0].cast_treatment|nl2br|default:""}</td>
						</tr>
						<tr>
							<th>応募方法</th>
							<td>{$recruit[0].cast_method|nl2br|default:""}</td>
						</tr>
					</table>
				</div>
				<div class="btnWrap">
					<a class="lookBtn" href="{$smarty.const.BASE_APPLY}">
						<span class="text quicksan">
							Apply
							<span class="ja">
								応募する
							</span>
						</span>
					</a>
				</div>
				<div id="StaffInfo" class="recruitInfoWrap">
					<h3>Staff<span class="ja">【社員】</span></h3>
					<table class="tbl-r01">
						<tr>
							<th>仕事内容</th>
							<td>{$recruit[0].staff_description|nl2br|default:""}</td>
						</tr>
						<tr>
							<th>資格</th>
							<td>{$recruit[0].staff_capacity|nl2br|default:""}</td>
						</tr>
						<tr>
							<th>時間</th>
							<td>{$recruit[0].staff_time|nl2br|default:""}</td>
						</tr>
						<tr>
							<th>定休日</th>
							<td>{$recruit[0].staff_holiday|nl2br|default:""}</td>
						</tr>
						<tr>
							<th>時給</th>
							<td>{$recruit[0].staff_salary|nl2br|default:""}</td>
						</tr>
						<tr>
							<th>待遇</th>
							<td>{$recruit[0].staff_treatment|nl2br|default:""}</td>
						</tr>
						<tr>
							<th>応募方法</th>
							<td>{$recruit[0].staff_method|nl2br|default:""}</td>
						</tr>
					</table>
				</div>
				<div class="btnWrap">
					<a class="lookBtn" href="{$smarty.const.BASE_APPLY}">
						<span class="text quicksan">
							Apply
							<span class="ja">
								応募する
							</span>
						</span>
					</a>
				</div>
				<div id="DriverInfo" class="recruitInfoWrap">
					<h3>Driver<span class="ja">【ドライバー】</span></h3>
					<table class="tbl-r01">
						<tr>
							<th>仕事内容</th>
							<td>{$recruit[0].driver_description|nl2br|default:""}</td>
						</tr>
						<tr>
							<th>資格</th>
							<td>{$recruit[0].driver_capacity|nl2br|default:""}</td>
						</tr>
						<tr>
							<th>時間</th>
							<td>{$recruit[0].driver_time|nl2br|default:""}</td>
						</tr>
						<tr>
							<th>定休日</th>
							<td>{$recruit[0].driver_holiday|nl2br|default:""}</td>
						</tr>
						<tr>
							<th>時給</th>
							<td>{$recruit[0].driver_salary|nl2br|default:""}</td>
						</tr>
						<tr>
							<th>待遇</th>
							<td>{$recruit[0].driver_treatment|nl2br|default:""}</td>
						</tr>
						<tr>
							<th>応募方法</th>
							<td>{$recruit[0].driver_method|nl2br|default:""}</td>
						</tr>
					</table>
				</div>
				<div class="btnWrap">
					<a class="lookBtn" href="{$smarty.const.BASE_APPLY}">
						<span class="text quicksan">
							Apply
							<span class="ja">
								応募する
							</span>
						</span>
					</a>
				</div>
				<div id="MakeupInfo" class="recruitInfoWrap">
					<h3>HairMake<span class="ja">【ヘアメイク】</span></h3>
					<table class="tbl-r01">
						<tr>
							<th>仕事内容</th>
							<td>{$recruit[0].makeup_description|nl2br|default:""}</td>
						</tr>
						<tr>
							<th>資格</th>
							<td>{$recruit[0].makeup_capacity|nl2br|default:""}</td>
						</tr>
						<tr>
							<th>時間</th>
							<td>{$recruit[0].makeup_time|nl2br|default:""}</td>
						</tr>
						<tr>
							<th>定休日</th>
							<td>{$recruit[0].makeup_holiday|nl2br|default:""}</td>
						</tr>
						<tr>
							<th>時給</th>
							<td>{$recruit[0].makeup_salary|nl2br|default:""}</td>
						</tr>
						<tr>
							<th>待遇</th>
							<td>{$recruit[0].makeup_treatment|nl2br|default:""}</td>
						</tr>
						<tr>
							<th>応募方法</th>
							<td>{$recruit[0].makeup_method|nl2br|default:""}</td>
						</tr>
					</table>
				</div>
				<div class="btnWrap">
					<a class="lookBtn" href="{$smarty.const.BASE_APPLY}">
						<span class="text quicksan">
							Apply
							<span class="ja">
								応募する
							</span>
						</span>
					</a>
				</div>
			</div>
		</section>
	</div>
{include file="footer.tpl"}
