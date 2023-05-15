{include file="admin/header.tpl"}
	<div id="Content" class="adminWrap">
		<section class="wrapBlock bgDamask">
			<header class="page-header">
				<h2 class="header_ttl quicksan">
					求人情報
				</h2>
			</header>
			<div class="inner Com">
				<form action="recruit_info.php" METHOD="POST" enctype="multipart/form-data">
					<span style="color:red;">
						{foreach from=$error item=err}
						※{$err}<br />
						{/foreach}
						{$msg|default:""}
					</span>
					<div class="admin-main">
						<div class="add-box">
							<input type="hidden" name="post_recruit_id" value="{$post_edit_id|default:""}" />
							<input type="hidden" name="shop_id" value="{$shopID}" />
							<div class="box-inner">
								<dl>
									<dt>コメント</dt>
									<dd><input type="text" class="input-text" name="recruit_comment" value="{$recruit.recruit_comment|default:""}"></dd>
								</dl>
							</div>
							<div class="box-inner">
								<h3>Cast【キャスト】</h3>
								<dl>
									<dt>仕事内容</dt>
									<dd><textarea class="recruit-text" name="cast_description">{$recruit.cast_description|default:""}</textarea></dd>
								</dl>
								<dl>
									<dt>資格</dt>
									<dd><textarea class="recruit-text" name="cast_capacity">{$recruit.cast_capacity|default:""}</textarea></dd>
								</dl>
								<dl>
									<dt>時間</dt>
									<dd><textarea class="recruit-text" name="cast_time">{$recruit.cast_time|default:""}</textarea></dd>
								</dl>
								<dl>
									<dt>定休日</dt>
									<dd><textarea class="recruit-text" name="cast_holiday">{$recruit.cast_holiday|default:""}</textarea></dd>
								</dl>
								<dl>
									<dt>時給</dt>
									<dd><textarea class="recruit-text" name="cast_salary">{$recruit.cast_salary|default:""}</textarea></dd>
								</dl>
								<dl>
									<dt>待遇</dt>
									<dd><textarea class="recruit-text" name="cast_treatment">{$recruit.cast_treatment|default:""}</textarea></dd>
								</dl>
								<dl>
									<dt>応募方法</dt>
									<dd><textarea class="recruit-text" name="cast_method">{$recruit.cast_method|default:""}</textarea></dd>
								</dl>
							</div>
							<div class="box-inner">
								<h3>Staff【社員】</h3>
								<dl>
									<dt>仕事内容</dt>
									<dd><textarea class="recruit-text" name="staff_description">{$recruit.staff_description|default:""}</textarea></dd>
								</dl>
								<dl>
									<dt>資格</dt>
									<dd><textarea class="recruit-text" name="staff_capacity">{$recruit.staff_capacity|default:""}</textarea></dd>
								</dl>
								<dl>
									<dt>時間</dt>
									<dd><textarea class="recruit-text" name="staff_time">{$recruit.staff_time|default:""}</textarea></dd>
								</dl>
								<dl>
									<dt>定休日</dt>
									<dd><textarea class="recruit-text" name="staff_holiday">{$recruit.staff_holiday|default:""}</textarea></dd>
								</dl>
								<dl>
									<dt>時給</dt>
									<dd><textarea class="recruit-text" name="staff_salary">{$recruit.staff_salary|default:""}</textarea></dd>
								</dl>
								<dl>
									<dt>待遇</dt>
									<dd><textarea class="recruit-text" name="staff_treatment">{$recruit.staff_treatment|default:""}</textarea></dd>
								</dl>
								<dl>
									<dt>応募方法</dt>
									<dd><textarea class="recruit-text" name="staff_method">{$recruit.staff_method|default:""}</textarea></dd>
								</dl>
							</div>
							<div class="box-inner">
								<h3>Driver【ドライバー】</h3>
								<dl>
									<dt>仕事内容</dt>
									<dd><textarea class="recruit-text" name="driver_description">{$recruit.driver_description|default:""}</textarea></dd>
								</dl>
								<dl>
									<dt>資格</dt>
									<dd><textarea class="recruit-text" name="driver_capacity">{$recruit.driver_capacity|default:""}</textarea></dd>
								</dl>
								<dl>
									<dt>時間</dt>
									<dd><textarea class="recruit-text" name="driver_time">{$recruit.driver_time|default:""}</textarea></dd>
								</dl>
								<dl>
									<dt>定休日</dt>
									<dd><textarea class="recruit-text" name="driver_holiday">{$recruit.driver_holiday|default:""}</textarea></dd>
								</dl>
								<dl>
									<dt>時給</dt>
									<dd><textarea class="recruit-text" name="driver_salary">{$recruit.driver_salary|default:""}</textarea></dd>
								</dl>
								<dl>
									<dt>待遇</dt>
									<dd><textarea class="recruit-text" name="driver_treatment">{$recruit.driver_treatment|default:""}</textarea></dd>
								</dl>
								<dl>
									<dt>応募方法</dt>
									<dd><textarea class="recruit-text" name="driver_method">{$recruit.driver_method|default:""}</textarea></dd>
								</dl>
							</div>
							<div class="box-inner">
								<h3>HairMake【ヘアメイク】</h3>
								<dl>
									<dt>仕事内容</dt>
									<dd><textarea class="recruit-text" name="makeup_description">{$recruit.makeup_description|default:""}</textarea></dd>
								</dl>
								<dl>
									<dt>資格</dt>
									<dd><textarea class="recruit-text" name="makeup_capacity">{$recruit.makeup_capacity|default:""}</textarea></dd>
								</dl>
								<dl>
									<dt>時間</dt>
									<dd><textarea class="recruit-text" name="makeup_time">{$recruit.makeup_time|default:""}</textarea></dd>
								</dl>
								<dl>
									<dt>定休日</dt>
									<dd><textarea class="recruit-text" name="makeup_holiday">{$recruit.makeup_holiday|default:""}</textarea></dd>
								</dl>
								<dl>
									<dt>時給</dt>
									<dd><textarea class="recruit-text" name="makeup_salary">{$recruit.makeup_salary|default:""}</textarea></dd>
								</dl>
								<dl>
									<dt>待遇</dt>
									<dd><textarea class="recruit-text" name="makeup_treatment">{$recruit.makeup_treatment|default:""}</textarea></dd>
								</dl>
								<dl>
									<dt>応募方法</dt>
									<dd><textarea class="recruit-text" name="makeup_method">{$recruit.makeup_method|default:""}</textarea></dd>
								</dl>
							</div>
						</div>
					</div>
					<aside class="admin-sidebar Com">
						<div class="side-box">
							<dl>
								<dt>登録・更新</dt>
								<dd>
									<ul>
										<li>
											{if empty($post_edit_id) }
												<input type="submit" name="submit_add" value="登録する" />
											{else}
												<input type="submit" name="submit_change" value="更新する" />
											{/if}
										</li>
									</ul>
								</dd>
							</dl>
						</div>
					</aside>
				</form>
			</div>
		</section>
	</div>
{include file="admin/footer.tpl"}
