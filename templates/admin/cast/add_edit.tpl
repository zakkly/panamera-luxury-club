{include file="admin/header.tpl"}
	<div id="Content" class="adminWrap">
		<section class="wrapBlock bgDamask">
			<header class="page-header">
				<h2 class="header_ttl quicksan">
					{if empty($post_edit_id)}
					Cast新規登録
					{else}
					Castの編集
					{/if}
				</h2>
			</header>
			<div class="inner Com">
				<form action="" METHOD="POST" enctype="multipart/form-data">
					<div class="admin-main">
						<div class="add-box">
							<input type="hidden" name="change_cast_id" value="{$post_edit_id}" />
							<input type="hidden" name="shop_id" value="{$shopID}" />
							<dl>
								<dt>表示設定</dt>
								<dd><input type="checkbox" class="input-check" name="cast_hidden_flg" value="1" {if !empty($cast.cast_hidden_flg) && $cast.cast_hidden_flg == 1}checked{/if}><label>非表示</label></dd>
							</dl>
							<dl>
								<dt>ローマ字（URL）</dt>
								<dd><input type="text" class="input-text" name="cast_name_rome" value="{$cast.cast_name_rome|default:""}"></dd>
							</dl>
							<dl>
								<dt>名前</dt>
								<dd><input type="text" class="input-text" name="cast_name" value="{$cast.cast_name|default:""}"></dd>
							</dl>
							<dl>
								<dt>フリガナ</dt>
								<dd><input type="text" class="input-text" name="cast_name_kana" value="{$cast.cast_name_kana|default:""}"></dd>
							</dl>
							<dl>
								<dt>身長</dt>
								<dd><input type="text" class="input-text" name="cast_tall" value="{$cast.cast_tall|default:""}"></dd>
							</dl>
							<dl>
								<dt>星座</dt>
								<dd>
									<select name="cast_constellation_id" class="select_constellation">
										<option value="0" {if isset($cast.cast_constellation_id) && $cast.cast_constellation_id == 0}selected{/if}> -- </option>
										{foreach from=$constellation item=val}
										<option value="{$val.id}" {if !empty($cast.cast_constellation_id) && $cast.cast_constellation_id == $val.id}selected{/if}>{$val.name}</option>
										{/foreach}
									</select>
								</dd>
							</dl>
							<dl>
								<dt>出身</dt>
								<dd><input type="text" class="input-text" name="cast_birthplace" value="{$cast.cast_birthplace|default:""}"></dd>
							</dl>
							<dl>
								<dt>血液型</dt>
								<dd>
									{foreach from=$blood_type item=val}
										<li class="radio"><input type="radio" name="cast_blood_type_id" value="{$val.id}" {if !empty($cast.cast_blood_type_id) && $cast.cast_blood_type_id == $val.id}checked{/if}><label>{$val.name}&nbsp;型</label>
									{/foreach}
								</dd>
							</dl>
							<dl>
								<dt>趣味</dt>
								<dd><input type="text" class="input-text" name="cast_hobby" value="{$cast.cast_hobby|default:""}"></dd>
							</dl>
							<dl>
								<dt>好きな食べ物</dt>
								<dd><input type="text" class="input-text" name="cast_favorite" value="{$cast.cast_favorite|default:""}"></dd>
							</dl>
							<dl>
								<dt>キャスト写真（）</dt>
								<dd>
									<ul class="img_list Com">
										<li>
											{if !empty($cast.cast_img1)}
											<img src="{$smarty.const.BASE_ADMIN_CAST_IMAGE}{$cast.cast_img1|default:""}" alt="キャスト写真1" title="" width="200px" height="300px" />
											{/if}
											<input type="file" name="cast_img1" class="add-file">
											<input type='hidden' name='upd_cast_img1' value="{$cast.cast_img1|default:""}" />
										</li>
										<li>
											{if !empty($cast.cast_img2)}
											<img src="{$smarty.const.BASE_ADMIN_CAST_IMAGE}{$cast.cast_img2|default:""}" alt="キャスト写真2" title="" width="200px" height="300px" />
											{/if}
											<input type="file" name="cast_img2" class="add-file">
											<input type='hidden' name='upd_cast_img2' value="{$cast.cast_img2|default:""}" />
										</li>
										<li>
											{if !empty($cast.cast_img3)}
											<img src="{$smarty.const.BASE_ADMIN_CAST_IMAGE}{$cast.cast_img3|default:""}" alt="キャスト写真3" title="" width="200px" height="300px" />
											{/if}
											<input type="file" name="cast_img3" class="add-file">
											<input type='hidden' name='upd_cast_img3' value="{$cast.cast_img3|default:""}" />
										</li>
										<li>
											{if !empty($cast.cast_img4)}
											<img src="{$smarty.const.BASE_ADMIN_CAST_IMAGE}{$cast.cast_img4|default:""}" alt="キャスト写真4" title="" width="200px" height="300px" />
											{/if}
											<input type="file" name="cast_img4" class="add-file">
											<input type='hidden' name='upd_cast_img4' value="{$cast.cast_img4|default:""}" />
										</li>
										<li>
											{if !empty($cast.cast_img5)}
											<img src="{$smarty.const.BASE_ADMIN_CAST_IMAGE}{$cast.cast_img5|default:""}" alt="キャスト写真5" title="" width="200px" height="300px" />
											{/if}
											<input type="file" name="cast_img5" class="add-file">
											<input type='hidden' name='upd_cast_img5' value="{$cast.cast_img5|default:""}" />
										</li>
										<li>
											{if !empty($cast.cast_img6)}
											<img src="{$smarty.const.BASE_ADMIN_CAST_IMAGE}{$cast.cast_img6|default:""}" alt="キャスト写真6" title="" width="200px" height="300px" />
											{/if}
											<input type="file" name="cast_img6" class="add-file">
											<input type='hidden' name='upd_cast_img6' value="{$cast.cast_img6|default:""}" />
										</li>
										<li>
											{if !empty($cast.cast_img7)}
											<img src="{$smarty.const.BASE_ADMIN_CAST_IMAGE}{$cast.cast_img7|default:""}" alt="キャスト写真7" title="" width="200px" height="300px" />
											{/if}
											<input type="file" name="cast_img7" class="add-file">
											<input type='hidden' name='upd_cast_img7' value="{$cast.cast_img7|default:""}" />
										</li>
										<li>
											{if !empty($cast.cast_img8)}
											<img src="{$smarty.const.BASE_ADMIN_CAST_IMAGE}{$cast.cast_img8|default:""}" alt="キャスト写真8" title="" width="200px" height="300px" />
											{/if}
											<input type="file" name="cast_img8" class="add-file">
											<input type='hidden' name='upd_cast_img8' value="{$cast.cast_img8|default:""}" />
										</li>
										<li>
											{if !empty($cast.cast_img9)}
											<img src="{$smarty.const.BASE_ADMIN_CAST_IMAGE}{$cast.cast_img9|default:""}" alt="キャスト写真9" title="" width="200px" height="300px" />
											{/if}
											<input type="file" name="cast_img9" class="add-file">
											<input type='hidden' name='upd_cast_img9' value="{$cast.cast_img9|default:""}" />
										</li>
									</ul>
								</dd>
							</dl>
						</div>
					</div>
					<aside class="admin-sidebar Com">
						<div class="side-box">
							<dl>
								<dt>一覧画像（320px×480px）</dt>
								<dd>
									<ul>
										<li><img src="{$smarty.const.BASE_ADMIN_CAST_IMAGE}{$cast.cast_thumbnail}" alt="一覧画像" width="180px" height="270px"></li>
										<li><input type="file" name="cast_thumbnail" class="add-file" size="80"></li>
										<li>
											<input type='hidden' name='upd_cast_thumbnail' value="{$cast.cast_thumbnail}" />
											<input type="checkbox" name="del_thum_flg" value="1" /><label>削除</label>
										</li>
									</ul>
								</dd>
							</dl>
						</div>
						<div class="side-box">
							<dl>
								<dt>登録・更新</dt>
								<dd>
									<ul>
										<li><input type="submit" name="return" value="戻る" /></li>
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
