{include file="header.tpl"}
	<div id="Content" class="pageWrap">
		<section class="newsWrap wrapBlock">
			<header class="caption-header">
				<div class="header-inner">
					<img class="pc_img" src="{$smarty.const.BASE_IMAGE}news_paget_view.jpg" alt="{$smarty.const.BASE_ALT}LaLaPaloozaからのお知らせ" title="" width="1920" height="660" />
					<img class="sp_img" src="{$smarty.const.BASE_IMAGE}sp_news_paget_view.jpg" alt="{$smarty.const.BASE_ALT}LaLaPaloozaからのお知らせ" title="" width="640" height="480" />
					<h2 class="header_ttl quicksan">
						News<span class="ja">{$smarty.const.SHOP_NAME}からのお知らせ</span>
					</h2>
				</div>
			</header>
			<div class="news-guide ">
				<div class="inner">
					<div class="newsList">
						{assign var=x value=0}
						{foreach from=$news item=val}
						{assign var=x value=$x+200}
						<article data-aos="fade-up" data-aos-delay="{$x}">
							<a href="{$smarty.const.BASE_NEWS_DISP}{$val.id}/">
								<div class="postInfo">
									<span class="postCat" style="color: {$val.news_category_color|default:""};">{$val.news_category_name|default:""}</span>
									<span class="postDate">({$val.news_create_date|date_format:"%Y&#24180;%m&#26376;%d&#26085;"}配信)</span>
								</div>
								<h3 class="postTit">{$val.news_title|truncate:30|default:""}</h3>
								<div class="post-detail">
									<dl class="dl_table">
										<dt><img src="{$smarty.const.BASE_ADMIN_NEWS_IMAGE}{$val.news_thumbnail|default:""}" alt="{$smarty.const.BASE_ALT}{$val.news_title|default:""}"></dt>
										<dd>{$val.editor|truncate:200|default:""}</dd>
									</dl>
								</div>
							</a>
						</article>
						{/foreach}
					</div>
					{if $newsAll > $smarty.const.BASE_LIMIT_SP_PAGEING_LIST}
					<div class="ListPager">
						<ul>
							{$pager->getSpPreviousNavi()}{$pager->getSpNextNavi()}
						</ul>
					</div>
					{/if}
				</div>
			</div>
		</section>
	</div>
{include file="footer.tpl"}
